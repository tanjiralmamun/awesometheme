<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php bloginfo( 'name' ); ?><?php wp_title('|');?></title>
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<meta name="viewport" content="width=device-width">

	<?php wp_head(); ?>
</head>
<body <?php body_class();?>>

	<div class="container">

		<div class="row">
			
			<div class="col-sm-12">

				<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
					<div class="container-fluid">
						<a href="<?php echo home_url()?>" class="navbar-brand">Awesome Theme</a>

						<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#collapsibleNavbar">
							<span class="navbar-toggler-icon"></span>
						</button>
						
						<div class="collapse navbar-collapse" id="collapsibleNavbar">
							
							<?php

								wp_nav_menu(array(
									'theme_location'	=> 'primary',
									'container'			=> false,
									'menu_class'		=> 'navbar-nav ml-auto',
									'walker'			=> new Walker_Nav_Primary()
								));

							?>

						</div>
					</div> <!-- /container-fluid -->
				</nav>

			</div>

		</div>

		<div class="search-form-container">
			<?php if(is_home()): ?>

				<?php get_search_form(); ?>

			<?php endif; ?>
		</div>
		
	<?php if(has_header_image()):?>
	<img src="<?php header_image()?>" width="<?php echo get_custom_header()->width;?>" height="<?php echo get_custom_header()->height; ?>" alt="">
	<?php endif; ?>