<?php

// Template Name: Portfolio Template

get_header(); ?>

<div class="row">

	<div class="col-sm-8">

		<?php 

			$args = array('post_type'=> 'portfolio', 'posts_per_page'=> 3);
			$pf_loop = new WP_Query($args);

			if($pf_loop->have_posts()):

				while($pf_loop->have_posts()): $pf_loop->the_post();?>

					<?php get_template_part('formats/content', 'archive');?>

					<?php

				endwhile;

			endif;

		?>

	</div>

	<div class="col-sm-4">

		<?php get_sidebar('rightbar');?>
		
	</div>
	
</div>


<?php get_footer(); ?>