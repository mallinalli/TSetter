<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="contenido">
          <div class="single">
          <div class="clearfix">
          	<h2 class="section-header"><?php the_title(); ?></h2>
            <?php
              /* =====================
                  Inicia Compartir
              ======================== */
              $shurl = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );

              function make_bitly_url($url,$login,$appkey,$format = 'xml',$version = '2.0.1')
              {
                
                $bitly = 'http://api.bit.ly/shorten?version='.$version.'&longUrl='.urlencode($url).'&login='.$login.'&apiKey='.$appkey.'&format='.$format;
                
                
                $response = file_get_contents($bitly);
                
                if(strtolower($format) == 'json')
                {
                  $json = @json_decode($response,true);
                  return $json['results'][$url]['shortUrl'];
                } else {
                  $xml = simplexml_load_string($response);
                  return 'http://bit.ly/'.$xml->results->nodeKeyVal->hash;
                }
              }
              $shortenthis = get_the_permalink();
              $shlink = make_bitly_url($shortenthis,'sinnerei','R_97f00998074d81d71a99b73433f166ff','json');
              
              $agencia = get_post_meta( $post->ID , '_post_agencia_nombre' , true );
              $balazo = get_post_meta( $post->ID , '_post_balazo' , true ); 
            ?>
            <div class="share" data-shurl="<?php if( $shlink AND $shlink != '' ){ echo $shlink; } else { echo $shortenthis; } ?>" data-shimg="<?php echo $shurl ?>" data-shcap="<?php the_title(); ?>">
              <ul>
                <li class="stw"><i class="icon-twitter"></i></li><li class="sfb"><i class="icon-facebook"></i></li><!-- <li class="sgp"><i class="icon-google-plus"></i></li> -->
              </ul>
            </div>
            <?php /*===========
              Termina Compartir
              =================*/ ?>
          	<div class="nota-completa clearfix">
          		<?php 
          		if( has_post_thumbnail() ) : 
          		$thumbnail_id = get_post_thumbnail_id($post->ID);
          		$thumbnail_details = wp_get_attachment($thumbnail_id); 
          		$thumbnail_src_display = wp_get_attachment_image_src( $thumbnail_id, 'nota-large' );
          		?>
          		<img src="<?php echo $thumbnail_src_display[0]; ?>" alt="img">
          		<p class="pie-foto"><?php echo $thumbnail_details['caption']; ?></p>
          		<?php endif; ?>
              <aside class="related-nota clearfix">
                <img src="<?php echo get_template_directory_uri(); ?>/img/nota1.png" class="img-nota">
              </aside>
              <p class="source"><span><strong><?php echo $agencia; ?></strong></span><br><span><?php the_time('d/m/Y h:i') ?></span></p>
              <div class="zona-balazo">
                <span class="balazo"><?php echo $balazo; ?></span>
                <hr>
              </div>
              <div class="cuerponota">
                <?php                
                //$content = strip_shortcode_gallery( get_the_content() );                                        
                //$content = str_replace( ']]>', ']]&gt;', apply_filters( 'the_content', $content ) ); 
                //echo $content;
                the_content();
                ?>
              </div>
              <div class="comments">
                <?php comments_template(); ?>
              </div>
          	</div>
          </div>
          </div>
        </div>
        <aside class="lateral clearfix">

          <div class="widgets1 clearfix">
            <div class="complemento cine hlpr-mr">
              
            </div>
            <div class="aside-banner">
              
            </div>
          </div>

          <div class="widgets3 clearfix" style="background: #ccc;">
            <div class="complemento  hlpr-mr">
             
            </div>

            <div class="aside-banner">
              

            </div>
            
          </div>

          <div class="widgets2 clearfix">
            <div class="complemento  hlpr-mr">
              <!--h2>
                <a href="https://twitter.com/Fama">
                  <i class="icon-twitter"></i> @Fama
                </a>
              </h2>
              <div class="tweets-container">
                <?php /*Aquí entran los tuits*/ ?>
              </div>
              <a href="#" class="moretweets">Más...</a-->
            </div>
            
            <!-- div class="complemento foto">
              <h2 class="foto-head">La Chica del Día</h2>
              <div class="fotoshow">
                <?php
                $args = array( 'numberposts' => '10', 'post_type' => 'chicadeldia', 'post_status' => 'publish' );
                $resultados = wp_get_recent_posts( $args );

                $chicaCont = 0;
                foreach( $resultados as $resultado ){
                    $img_big = wp_get_attachment_image_src( get_post_thumbnail_id( $resultado['ID'] ), 'image-resized' );
                    $img_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $resultado['ID'] ), 'portrait-mode' );
                    if ( $chicaCont == 0 ) {
                ?>
                <a class="fancybox-thumbs" data-fancybox-group="chicadeldia" href="<?php echo $img_big[0]; ?>"><img src="<?php echo $img_thumb[0]; ?>" alt="Chica del Día"></a>
                <?php
                    } else { ?>
                <a style="display:none;" class="fancybox-thumbs" data-fancybox-group="chicadeldia" href="<?php echo $img_big[0]; ?>"><img src="<?php echo $img_thumb[0]; ?>" alt="Chica del Día"></a>
                <?php }
                $chicaCont++;
                  }
                ?>
              </div-->
            <!--/div>
          </div-->

        </aside>
<?php endwhile; endif; ?>        
<?php get_footer(); ?>