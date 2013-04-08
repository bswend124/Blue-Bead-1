<?php 
	$social_facebook = ot_get_option( 'social_facebook',array());
	$social_twitter = ot_get_option( 'social_twitter',array());
	$social_linkedin = ot_get_option( 'social_linkedin',array());
  ?>

	</div><!-- #main -->

	<footer id="colophon" class="site-footer" role="contentinfo">
    <ul class="social_icons">
          <li><a href="<?php echo $social_facebook;  ?>" id="fb" original-title="Like Us On Facebook"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/facebook.png" alt="Facebook" /></a></li>
          <li><a href="<?php echo $social_twitter;  ?>" id="tw" original-title="Follow Us on Twitter"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/twitter.png" alt="Twitter" /></a></li>
          <li><a href="<?php echo $social_linkedin;  ?>" id="ld" original-title="Find Us on LinkedIn"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/linkedin.png" alt="LinkedIn" /></a></li>
        </ul>
		
        
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

<div class="site-info">
    <p>
    <strong>&copy; 2013 <?php bloginfo('name'); ?> | All Rights Reserved.</strong> </a> 
    Designed by UWSP CNMT Development Team
    </p>
    <p><a href="<?php bloginfo('rss2_url'); ?>">Latest Stories RSS</a> | <a href="<?php comments_rss_link('comment feed'); ?>">Comments RSS</a></p>
</div>
    
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>