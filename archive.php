<?php get_header(); ?>

<div class="row">

	<div class="col-sm-8">

		<div class="row text-center no-margin">

			<?php

				if(have_posts()):?>

					<header class="page-header">
					
						<?php 

							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="archive-description">', '</div>' );

						?>

					</header>


					<?php while(have_posts()):the_post();?>

						<?php get_template_part('formats/content', 'archive'); ?>

						<?php

					endwhile;

					?>
					
					<div class="col-sm-12 text-center">
						<?php the_post_navigation(); ?>
					</div>
					
				<?php

				endif;

			?>

		</div>

	</div>

	<div class="col-sm-4">

		<?php get_sidebar('rightbar');?>

	</div>

<?php get_footer(); ?>
