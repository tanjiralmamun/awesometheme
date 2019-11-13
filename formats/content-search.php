<article id="post-<?php the_ID();?>" <?php post_class();?>>
	
	<div class="row">
		<div class="col-md-12 col-lg-4">
			<?php if(has_post_thumbnail()): ?>

				<div class="float-left">
					<?php the_post_thumbnail('full', ['class'=> 'attachment-medium size-medium wp-post-image img-fluid']);?>
				</div>

			<?php endif; ?>
		</div>
		<div class="col-md-12 col-lg-8 text-justify">
			<small><?php the_category(' ');?> || <?php the_tags()?></small>

			<?php the_excerpt();?>

			<a href="<?php echo get_permalink()?>">Read More</a>
		</div>
	</div>

	<hr>


</article>