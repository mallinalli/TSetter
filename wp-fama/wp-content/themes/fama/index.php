<?php get_header(); ?>
        <div class="contenido">
          <div class="clearfix"> 
            <?php
            /*$pd_home_section_1  = get_option( 'pd_home_section_1' );*/
            $br_home_note_1  = get_option( 'pd_home_note_1' );
            $br_home_note_2  = get_option( 'pd_home_note_2' );
            $br_home_note_3  = get_option( 'pd_home_note_3' );
            $br_home_note_4  = get_option( 'pd_home_note_4' );


            $notas = array(
            
            $br_home_note_5  = get_option( 'pd_home_note_5' ),
            $br_home_note_6  = get_option( 'pd_home_note_6' ),
            $br_home_note_7  = get_option( 'pd_home_note_7' ),
            $br_home_note_8  = get_option( 'pd_home_note_8' ),
            $br_home_note_9  = get_option( 'pd_home_note_9' ),
            $br_home_note_10  = get_option( 'pd_home_note_10' )
                        
            );
            ?>

            <div class="sli-main">
              <div class="sli-control left"><i class="icon-circle-arrow-left"></i></div>
              <div class="sli-control right"><i class="icon-circle-arrow-right"></i></div>
              <div class="sli-container clearfix">
                <?php
                  for ($i=1; $i <= 4 ; $i++) { 
                ?>
                <div class="principal sli-featured">
                  <?php $variableMagica = get_option( 'pd_home_note_'.$i ); ?>
                  <a href="<?php echo get_permalink( $variableMagica ); ?>">
                    <?php
                        $img = wp_get_attachment_image_src( get_post_thumbnail_id( $variableMagica ), 'nota-huge' ); 
                    ?>
                    <img src="<?php echo $img[0]; ?>" alt="#">
                    <p class="sli-over"> <?php echo get_the_title( $variableMagica ); ?></p>
                  </a>
                </div>
                <?php } ?>
              </div>
            </div>
            <div class="grupo">
           

              <?php
              /* ===== El poderoso loop de notas ===== */
              $limite = count($notas)/3 ;

              $contador = 0;

              for ($i=0; $i < $limite; $i++) {

                for ($j=0; $j < 3; $j++) { 
                  switch ($j) {
                    case '0':
                      $helper = 'hlpr-mr';
                      break;
                    case '1':
                      $helper = 'hlpr-mr-t';
                      break;
                    case '2':
                      $helper = '';
                      break;
                  }
              ?>
              <div class="principales <?php echo $helper; ?>">
                <a href="<?php echo get_permalink( $notas[$j+$contador] ); ?>">
                  <?php
                      $img = wp_get_attachment_image_src( get_post_thumbnail_id($notas[$j+$contador]), 'nota-small' ); 
                  ?>
                  <img src="<?php echo $img[0]; ?>" alt="#">
                  
                  <p class="elipseme"> 
                    <?php 

                      $post_categories = wp_get_post_categories( $notas[$j+$contador] );
                      $cats = array();
                        
                      foreach($post_categories as $c){
                        $cat = get_category( $c );
                        $cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug );
                      }

                      if ($cats[0]['name'] == 'Portada' OR $cats[0]['name'] == 'Sin Categoría'){
                        
                        echo $cats[1]['name'].". <br>";
                      } else{
                        echo $cats[0]['name'].". <br>"; 
                      }
                    ?> 
                    <?php echo get_the_title($notas[$j+$contador]); ?>
                  </p>
                </a>
              </div>
              <?php } ?>
              <!--Fin de Renglón-->
              <?php 
                  $contador = $contador+3;
                } 
              ?>
            </div>
          </div>
          
        </div>
<?php get_footer(); ?>