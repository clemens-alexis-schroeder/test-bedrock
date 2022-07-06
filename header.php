<?php
/**
 * The header for our theme
 * @package localmedia
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="preconnect"
      href="https://fonts.gstatic.com"
      crossorigin />

	<link rel="preload"
	      as="style"
	      href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" />

	<link rel="stylesheet"
	      href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap"
	      media="print" onload="this.media='all'" />

	<?php wp_head(); ?>

	<?php if( get_field('google_analytics_ua', 'option') ): ?>
		<!-- analytics -->
		<script type="text/javascript">
			var gaProperty = '<?php the_field( 'google_analytics_ua', 'option' ); ?>';
			var disableStr = 'ga-disable-' + gaProperty;
			if (document.cookie.indexOf(disableStr + '=true') > -1) {
			 window[disableStr] = true;
			}
			function gaOptout() {
			 document.cookie = disableStr + '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/';
			 window[disableStr] = true;
			 alert('Das Google Analytics Opt-Out-Cookie wurde erfolgreich gesetzt');
			 window.location.reload();
			}
		</script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=<?php the_field( 'google_analytics_ua', 'option' ); ?>"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', '<?php the_field( 'google_analytics_ua', 'option' ); ?>', { 'anonymize_ip': true });
		</script>
	<?php endif; ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="root">


	<header id="master" class="site-header flex items-center">
		<div class="container w-full">
			<div class="header--grid header items-center">

				<div class="header-left flex items-center">
					<a href="/" class="brand" aria-label="<?php echo get_bloginfo( 'name' ); ?>">
						<?php get_template_part( 'symbols/brand', 'logo' ); ?>
					</a>
				</div>

				<div class="header-center  hidden lg:flex items-center justify-center">
					<?php wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'container'       => false,
						'menu_id'        => 'header-menu',
						'menu_class'	 => 'menu menu-top'
					)); ?>
				</div>


				<div class="header-right flex items-center justify-end">
					<div class="flex items-center ml-10 mr-16">
						<a class="searchboxlink brand" href="#search" aria-label="Search"><?php get_template_part( 'symbols/icon', 'search' ); ?></a>
					</div>
					<div id="search" class="hidden bg-white">
						<h3 class="text-28 font-bold">Suchen</h3>
						<form class="search search--form pt-4" method="get" action="<?php echo home_url(); ?>" role="search">
							<input class="search-input mb-4" type="search" name="s" aria-label="search" placeholder="Suchbegriff">
							<div class="modal-footer">
								<button type="button" class="button--close button--outline mr-4" data-dismiss="modal">Schliessen</button>
								<button class="search-submit button--primary" type="submit" role="button">Suchen</button>
							</div>
						</form>
					</div>

					<div class="header--burger">
						<button class="burger burger--menu--toggle" aria-label="Hamburger Button">
							<div class="button--wrapper">
								<b></b>
								<b></b>
								<b></b>
							</div>
						</button>
					</div>
				</div>
			</div>

			<div class="header-mobile-content">
				<div class="mobile--inner--wrapper">
					<div class="container">
						<?php wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'container'       => false,
							'menu_id'        => 'header-menu',
						)); ?>
					</div>
				</div>
			</div>
		</div>
	</header>

	<main id="primary" class="site-main"> <!-- main start -->
