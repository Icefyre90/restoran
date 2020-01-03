<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<?php do_action( 'vw_hotel_before_slider' ); ?>

<section id="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
    <?php $pages = array();
      for ( $count = 1; $count <= 3; $count++ ) {
        $mod = intval( get_theme_mod( 'vw_hotel_slider_page' . $count ));
        if ( 'page-none-selected' != $mod ) {
          $pages[] = $mod;
        }
      }
      if( !empty($pages) ) :
        $args = array(
          'post_type' => 'page',
          'post__in' => $pages,
          'orderby' => 'post__in'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          $i = 1;
    ?>     
    <div class="carousel-inner" role="listbox">
      <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <img src="<?php the_post_thumbnail_url('full'); ?>"/>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <h2><?php the_title(); ?></h2>
              <p><?php the_excerpt(); ?></p>
              <div class="more-btn">              
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','vw-hotel'); ?></a>
              </div>
            </div>
          </div>
        </div>
      <?php $i++; endwhile; 
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
        <div class="no-postfound"></div>
    <?php endif;
    endif;?>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
    </a>
  </div>  
  <div class="clearfix"></div>
</section> 

<?php do_action( 'vw_hotel_after_slider' ); ?>

<section id="about-hotel">
  <div class="container">
    <div class="about-mainbox">
      <div class="row">
        <div class="col-md-8">
          <?php if( get_theme_mod('vw_hotel_section_title') != ''){ ?>
            <h3><?php echo esc_html(get_theme_mod('vw_hotel_section_title',__('Welcome to Star Hotel','vw-hotel'))); ?></h3>
          <?php }?>
          <?php $pages = array();
            for ( $count = 1; $count <= 1; $count++ ) {
              $mod = intval( get_theme_mod( 'vw_hotel_about_section' . $count ));
              if ( 'page-none-selected' != $mod ) {
                $pages[] = $mod;
              }
            }
            if( !empty($pages) ) :
              $args = array(
                'post_type' => 'page',
                'post__in' => $pages,
                'orderby' => 'post__in'
              );
              $query = new WP_Query( $args );
              if ( $query->have_posts() ) :
                $count = 1;
                while ( $query->have_posts() ) : $query->the_post(); ?>
                  <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                  <hr class="hrclass">
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_hotel_string_limit_words( $excerpt,28 ) ); ?></p>
                <?php $count++; endwhile; 
                wp_reset_postdata();?>
              <?php else : ?>
                <div class="no-postfound"></div>
            <?php endif;
          endif;?>
          <div class="about-category">       
            <div class="row">
              <?php 
                $page_query = new WP_Query(array( 'category_name' => esc_html(get_theme_mod('vw_hotel_service_category'),'theblog')));?>
                <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                    <div class="col-md-6 col-sm-6">
                      <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
                      <div class="overlay-box">
                        <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                      </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
              ?>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <?php
            $args = array( 'name' => get_theme_mod('vw_hotel_offer_image',''));
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="imagebox">
                  <?php the_post_thumbnail(); ?>
                  <div class="overlay-bttn">
                    <a href="<?php echo esc_url( get_permalink() );?>" title="<?php esc_attr_e( 'Read More', 'vw-hotel' ); ?>"><?php esc_html_e('LEARN MORE','vw-hotel'); ?></a>
                  </div>
                </div>
              <?php endwhile; 
              wp_reset_postdata();?>
              <?php else : ?>
                <div class="no-postfound"></div>
              <?php
          endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php do_action( 'vw_hotel_after_about' ); ?>

<div id="content-vw">
  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
</div>

<?php get_footer(); ?>