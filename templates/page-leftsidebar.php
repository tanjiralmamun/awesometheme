<?php

// Template Name: Left Sidebar

get_header(); ?>

<div class="row">

	<div class="col-sm-4">

		<?php get_sidebar('leftbar');?>
		
	</div>

	<div class="col-sm-8">

		<?php 

			if(have_posts()):

				while(have_posts()):the_post();?>

					<?php get_template_part('formats/content', get_post_format());?>

					<?php

				endwhile;

			endif;

		?>

	</div>
	
</div>


<?php get_footer(); ?>