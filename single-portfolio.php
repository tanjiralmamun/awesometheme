<?php get_header(); ?>

<div class="row p-1">
	
	<div class="col-sm-8">
		
		<?php

			if(have_posts()):
				while(have_posts()): the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class();?>>
						
						<?php the_title('<h2 class="entry-title">', '</h2>');?>

						<?php if(has_post_thumbnail()):?>

							<div class="float-right"><?php the_post_thumbnail('medium', ['class'=> 'attachment-medium size-medium wp-post-image img-fluid']);?></div>

						<?php endif; ?>

						<small>

							<?php echo awesome_custom_term( $post->ID, 'field' ); ?>

							||

							<?php echo awesome_custom_term( $post->ID, 'software' ); ?>

							<?php
								if(current_user_can( 'manage_options' )){
									echo ' || '; edit_post_link();
								}
							?>
								
						</small>

						<?php the_content();?>

						<hr>

						<div class="row">
							<div class="col-sm-6 text-left">
								<small><?php previous_post_link();?></small>
							</div>
							<div class="col-sm-6 text-right">
								<small><?php next_post_link();?></small>
							</div>
						</div>

					</article>

				<?php endwhile;
			endif;

		?>

	</div>

	<div class="col-sm-4">
		<?php get_sidebar();?>
	</div>

</div>

<?php get_footer(); ?>