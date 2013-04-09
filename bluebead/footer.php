<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body style="margin-top: 0">
<?php 
	$social_facebook = ot_get_option( 'social_facebook',array());
	$social_twitter = ot_get_option( 'social_twitter',array());
	$social_linkedin = ot_get_option( 'social_linkedin',array());
  ?>

<!-- #main -->

	<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="main">
	
        
        <?php
        // Check if there's anything in the bottom menu nav
        if ( has_nav_menu( 'bottom-menu' ) ) {
            // if there is, add it
            wp_nav_menu( array(
                'menu' => 'Bottom Menu',
                'container' => 'div',
                'container_class' => 'bottom-menu',
                'falback_cb' => false,
                'theme_location' => 'bottom-menu',
                )
            );
        }
    ?>



<div class="site-info" style="width: 929px">
	<p class="address" style="width: 220px">
    <span style="text-decoration: underline;">-Address-</span><br>1043 Main Street<br>Stevens Point, WI 54481</p>
    <p class="email-style" style="width: 217px">
    <span style="text-decoration: underline;">-Email-</span><br>Bluebead@blue-bead.com</p>
    <p class="phone-style" style="width: 215px">
    <span style="text-decoration:underline;">-Phone-</span><br>715.344.1998</p>
    
    <div class="right-side">
	<p class="connected" style="width: 97px">
	<span style="text-decoration:underline;">-Connect With Us-</span></p>
    <ul class="social_icons" style="width: 113px;">
          <li style="width: 4px"><a href="<?php echo $social_facebook;  ?>" id="fb" original-title="Like Us On Facebook"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/facebook.png" alt="Facebook" /></a></li>
          <li><a href="<?php echo $social_twitter;  ?>" id="tw" original-title="Follow Us on Twitter"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/twitter.png" alt="Twitter" /></a></li>
          <li><a href="<?php echo $social_linkedin;  ?>" id="ld" original-title="Find Us on LinkedIn"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/linkedin.png" alt="LinkedIn" /></a></li>
        </ul>
	<p class="Find_Us" style="width: 92px">
	<span style="text-decoration:underline;">-Find Us-</span></p>
	</div>

</div>

<div class="bottom"><p class="copyright">
    <strong>&copy; 2013 <?php bloginfo('name'); ?> | All Rights Reserved.</strong>
    Designed by UWSP CNMT Development Team<br><a href="<?php bloginfo('rss2_url'); ?>">Latest Stories RSS</a> | <a href="<?php comments_rss_link('comment feed'); ?>">Comments RSS</a>
    </p>
    </div>
    </div>
    
	</footer><!-- #colophon -->
<!-- #page -->

<?php wp_footer(); ?>

</body>
</html>