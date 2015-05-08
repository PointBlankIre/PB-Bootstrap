      <footer>
       

       <div class="row">
  <div class="col-md-8">
       
         <?php
   // Footer text
			if (of_get_option('footer_text') <> "" ) {
				 echo '<p>'.of_get_option('footer_text').'</p>';
			}
?>

  </div>
  <div class="col-md-4">
  				<!-- Social Icons -->
				<ul class="icons unstyled nav-pills pull-right">
				<?php
				   // Facebook
							if (of_get_option('facebook_adr') <> "" ) {
								 echo ' 
								 <a href="'.of_get_option('facebook_adr').'" target="_blank"><i class="fa fa-facebook-official"></i></a>
								 ';
							}
				?>				
				<?php
				   // Twitter
							if (of_get_option('twitter_adr') <> "" ) {
								 echo '
								 <a href="'.of_get_option('twitter_adr').'" target="_blank"><i class="fa fa-twitter"></i></a>
								 ';
							}
				?>
				
			</ul>
     
    	   </div>
		</div><!-- end row -->
	</footer>

    </div> <!-- /container -->

    <?php wp_footer(); ?>

   

   

    <?php
   // Google Analytics
			if (of_get_option('footer_scripts') <> "" ) {
				echo '<script type="text/javascript">'.stripslashes(of_get_option('footer_scripts')).'</script>';
			}
	?>

<script> 

	jQuery(function() { 


			jQuery('.sidebar .dropdown-menu a').click(function(e) {
			    e.stopPropagation();
			});

      });

</script> 




  </body>
</html>