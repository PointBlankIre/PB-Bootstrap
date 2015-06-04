<?php get_header(); ?>
<?php
$cur_cat_id = get_cat_id( single_cat_title("",false) );
?>
  <!-- Start the Content here -->
    <div class="container">
      <div class="row">
          <div class="col-md-12">

          <?php if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<div class="breadcrumb">','</div>');
        } ?>



          <?php  
          $attachment_id = get_field("pb_category_image", "category_".$cur_cat_id);
          $image_attributes = wp_get_attachment_image_src( $attachment_id, '1110x230' ); // returns an array
          ?>
        

          <?php if ( !empty($attachment_id) ) { ?>

          <div class="image-box sub1">
            <img src="<?php echo $image_attributes[0]; ?>" >
          <div class="image-box-content">
            <h1 class="pull-left"><?php single_cat_title(); ?></h1>
          </div><!--image-box-content-->
          </div><!-- image-box -->

          <?php } else { ?>
          <div class="image-box-content">
            <h1><?php single_cat_title(); ?></h1>
          </div><!--image-box-content-->

          <?php } ?>  

          <?php
          if (category_description()) {
            echo '<p>';
            echo category_description(); 
            echo '</p>';
          }
          ?>
        
          </div>
        </div>

      <div class="row">
          
        <div class="col-md-3">
         

          <?php get_sidebar(); ?> 
          

        </div><!-- col 3 -->


        <div class="col-md-9">

          <div  class="content">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <div class="row">
                <?php
                if ( has_post_thumbnail() ) { ?>

                  <a href="<?php the_permalink(); ?>">
                    <div class="image-box sub1">
                     <?php the_post_thumbnail('1110x230', array( 'class'  => "img-responsive")); ?>
                     <div class="image-box-content">
                      <h1><?php the_title(); ?></h1>
                     </div><!--image-box-content-->
                    </div><!-- image-box -->
                  </a>

                  <?php } else { ?>
                  <div class="image-box-content">
                    <a href="<?php the_permalink(); ?>">
                    <h1><?php the_title(); ?></h1>
                    </a>
                  </div><!--image-box-content-->

               <?php } ?>  
               
              <?php the_content(); ?>
              <?php edit_post_link('edit', '<p>', '</p>'); ?>

           
            </div> 
             <?php endwhile; else: ?>
              <p><?php _e('Sorry, this page does not exist.'); ?></p>
            <?php endif; ?>  
                                
          </div>

          <div id="calendar"></div>

        </div><!-- col 9 -->

    </div><!-- row -->  
        
  

</div><!-- container -->



<?php get_footer(); ?>
