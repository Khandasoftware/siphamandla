<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package levitate
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<style>
    /* Primary Color */
    a,
    .button {
        color: <?php echo get_theme_mod('primary_color', '#ff0000'); ?>;
    }

    /* Secondary Color */
    .secondary-color {
        color: <?php echo get_theme_mod('secondary_color', '#00ff00'); ?>;
    }

    /* Text Color */
    body {
        color: <?php echo get_theme_mod('text_color', '#000000'); ?>;
    }

    /* Heading Color */
    h1, h2, h3, h4, h5, h6 {
        color: <?php echo get_theme_mod('heading_color', '#333333'); ?>;
    }
</style>


<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
$ga_id = get_option('ga_id');
$fb_pixel_id = get_option('fb_pixel_id');

if ($ga_id) {
    ?>
    <!-- Google Analytics Tracking Code -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr($ga_id); ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', '<?php echo esc_attr($ga_id); ?>');
    </script>
    <?php
}

if ($fb_pixel_id) {
    ?>
    <!-- Facebook Pixel Tracking Code -->
    <script>
        !function(f,b,e,v,n,t,s) {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
        n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
        document,'script','https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '<?php echo esc_attr($fb_pixel_id); ?>');
        fbq('track', 'PageView');
    </script>
    <?php
}
?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'levitate' ); ?></a>
	<header id="masthead" class="site-header khd-navigation" data-toggable="close">
        <div class="khd-navigation__content">
            <div class="khd-navigation__logo site-branding">
                <?php
                the_custom_logo();
                if ( is_front_page() && is_home() ) :
                    ?>
                    <h1 class="site-title khd-navigation__site-title"><a class="khd-navigation__logo-link"  href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php
                else :
                    ?>
                    <p class="site-title khd-navigation__site-title"><a class="khd-navigation__logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php
                endif;
                $levitate_description = get_bloginfo( 'description', 'display' );
                if ( $levitate_description || is_customize_preview() ) :
                    ?>
                    <p class="site-description"><?php echo $levitate_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                <?php endif; ?>
            </div><!-- .site-branding -->

            <nav id="site-navigation" class="khd-navigation__track">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     =>'khd-navigation__list'
                    )
                );
                ?>
            </nav><!-- #site-navigation -->
            <aside class="khd-navigation__controls" data-class="khd-navigation__controls" data-name="Toggle">
                <button class="khd-navigation__button" data-class="khd-navigation__button" data-name="Button" data-toggle>
            </button>
        </aside>
	</header><!-- #masthead -->
