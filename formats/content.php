<article id="post-<?php the_ID();?>" <?php post_class();?>>
	<header class="entry-header">
		<?php the_title(sprintf('<h2 class="entry-title"><a href="%s">', esc_url(get_permalink())), '</a></h2>');?>
		<small>Posted On: <?php the_time('F j, Y');?>, at <?php the_time('g:i a');?>, in <?php the_category();?></small>
	</header>

	<div class="row">

		<?php if(has_post_thumbnail()):?>

			<div class="col-sm-4">
				<div class="thumbnail"><?php the_post_thumbnail('full', ['class'=> 'attachment-medium size-medium wp-post-image img-fluid']); ?></div>
			</div>
			<div class="col-sm-8">
				<?php the_content(); ?>
			</div>

		<?php else: ?>

			<div class="col-sm-12">
				<?php the_content(); ?>
			</div>

		<?php endif;?>

	</div>

</article>