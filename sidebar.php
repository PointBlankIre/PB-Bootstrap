<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
<?php endif; ?>
<div class="sidebar">
<?php

// Sidebar menu


$refancestors = get_ancestors( $refid, 'page' );
$ancestors = get_ancestors( $post->ID, 'page' );
//var_dump($ancestors);


if ( ( in_array('18', $refancestors) ) || ( in_array('18', $ancestors) ) || (is_page('18')) )   {
      $menuname =  "default"; 
        
}

  wp_nav_menu(array('menu'=>$menuname,'menu_class'=> 'nav nav-tabs nav-stacked', 'walker'  => new SidebarNavWalker() )); 

?>	

</div><!-- /sidebar -->
