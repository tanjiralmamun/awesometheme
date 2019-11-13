<?php get_header(); ?>

<div class="row">

	<div class="col-sm-8">

		<div class="row text-center no-margin">

			<?php

				if(have_posts()): $i = 0;

					while(have_posts()):the_post();?>

						<?php
							if($i == 0): $column = 12;
							elseif($i > 0 && $i <= 2) : $column = 6; $class = ' second-row-padding';
							elseif($i > 2): $column = 4; $class = ' third-row-padding';
							endif;
						?>
						<div class="col-sm-<?php echo $column; echo $class; ?>">
							<?php if(has_post_thumbnail()):
								$url_img = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
							endif;?>
							<div class="blog-element" style="background-image: url('<?php echo $url_img?>');">
								<?php the_title(sprintf('<h2 class="entry-title"><a href="%s">', esc_url(get_permalink())), '</a></h2>');?>
								<small><?php the_category(' ')?></small>
							</div>
						</div>

						<?php $i++;

					endwhile;

					?>
					
					<div class="col-sm-6 text-left">
						<?php next_posts_link("&#8666; Older Posts");?>
					</div>
					<div class="col-sm-6 text-right">
						<?php previous_posts_link("Newer Posts &#8667;");?>
					</div>

				<?php

				endif;

				wp_reset_query();

			?>

		</div>

	</div>

	<div class="col-sm-4">

		<?php get_sidebar('rightbar');?>

	</div>

<?php get_footer(); ?>
