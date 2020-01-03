<?php
/**
 * The template part for displaying slider
 *
 * @package VW Hotel 
 * @subpackage vw_hotel
 * @since VW Hotel 1.0
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-main-box">
    <div class="box-image">
      <?php 
        if(has_post_thumbnail()) { 
          the_post_thumbnail(); 
        }
      ?>  
    </div>
    <h3 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h3>
    <div class="post-info">
      <i class="fa fa-calendar" aria-hidden="true"></i><span class="entry-date"><?php the_date(); ?></span>
      <i class="fa fa-user" aria-hidden="true"></i><span class="entry-author"> <?php the_author(); ?></span>
      <i class="fa fa-comments" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment','vw-hotel'), __('0 Comments','vw-hotel'), __('% Comments','vw-hotel') ); ?> </span>
    </div>
    <div class="new-text">
      <?php the_excerpt();?>
    </div>
    <div class="content-bttn">
      <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right" title="<?php esc_attr_e( 'Read More','vw-hotel' ); ?>"><?php esc_html_e('Read More','vw-hotel'); ?></a>
    </div>
  </div>
</div>