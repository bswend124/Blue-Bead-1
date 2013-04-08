<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
<script>
 jQuery(document).ready(function($){ 
	var carousel = $("#carousel").waterwheelCarousel({
		autoPlay: 3600,
		sizeMultiplier: .6,
		opacity: 1,
		horizon: 110,
		horizonOffset: -50,
		horizonOffsetMultiplier: .7,
		separation: 250,
        });
        $('#prev').bind('click', function () {
          carousel.prev();
          return false
        });
        $('#next').bind('click', function () {
          carousel.next();
          return false;
        });
        $('#reload').bind('click', function () {
          newOptions = eval("(" + $('#newoptions').val() + ")");
          carousel.reload(newOptions);
          return false;
        });
      });
</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<hgroup>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>
        
		<a href="<?php echo $link1; ?>" id="logo"> <img src="<?php $logo=ot_get_option('logo_image'); echo $logo; ?>" alt=""  /> </a> 
		<nav id="site-navigation" class="navigation-main" role="navigation">
			<h1 class="menu-toggle"><?php _e( 'Menu', 'bluebead' ); ?></h1>
			<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'bluebead' ); ?>"><?php _e( 'Skip to content', 'bluebead' ); ?></a></div>
			
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
    
    
<?php $enableslider=ot_get_option('my_checkbox'); if ( $enableslider[0]=='yes' ) { ?>
<div id="carousel">
<?php $enableslider=ot_get_option('my_checkbox'); $slides = ot_get_option( 'my_slider',array());
  if ( ! empty( $slides ) && $enableslider[0]=='yes' ) {
    foreach( $slides as $slide ) {
	 
      echo '<a href="#"> <?php if(!empty($slider_image1)){?>
					<img src="'.$slide['slider_image'].'" alt=""  /> <?php } ?>
            </a>';
    }
  }
}  ?>
</div>
<a href="#" id="prev">Prev</a> | <a href="#" id="next">Next</a>
        

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
	<div id="main" class="site-main">