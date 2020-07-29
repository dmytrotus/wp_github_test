<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php bloginfo( 'name' ); ?> | <?php wp_title(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php
	if ( is_singular() && get_option( 'thread_comments' ) ) :
		wp_enqueue_script( 'comment-reply' );
	endif;
	?>
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'd-flex flex-column' ); ?>>
	<header>
		<div class="container">
			<div class="row">
				<div class="col">
					<?php $logo = the_custom_logo(); ?>
					<?php echo ! empty( $logo ) ? esc_url( $logo ) : ''; ?>
					<nav class="navbar navbar-expand-lg navbar-light bg-light" role="navigation">
						<div class="container">
							<?php
							wp_nav_menu(array(
								'theme_location' => 'primary',
								'depth' => 3,
								'container' => 'div',
								'container_class' => 'collapse navbar-collapse',
								'container_id' => 'bs-example-navbar-collapse-1',
								'menu_class' => 'nav navbar-nav',
								'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
								'walker' => new WP_Bootstrap_Navwalker(),
							));
							?>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</header>
	<main class="site-content">
