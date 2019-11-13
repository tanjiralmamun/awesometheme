<?php get_header(); ?>


<div class="row">

	<div class="col-sm-12">
	
		<div id="awesome-carousel" class="carousel slide" data-ride="carousel">
			
			<div class="carousel-inner">
				<?php

					$args_cat = array(
						'include' => '6, 15, 19, 25'
					);
					$categories = get_categories( $args_cat );
					$count = 0;
					$bullets = ' ';
					foreach ($categories as $category):

					$args = array(
						'type'	=> 'post',
						'posts_per_page' => 1,
						'category__in'	=> $category->term_id
					);

					$sliderData = new WP_Query( $args );

						if($sliderData->have_posts()):

							while($sliderData->have_posts()): $sliderData->the_post();?>

								<div class="carousel-item <?php if($count == 0): echo 'active'; endif;?>">

									<?php the_post_thumbnail('full');?>

									<div class="carousel-caption">

										<?php the_title(sprintf('<h2 class="entry-title"><a href="%s">', esc_html(get_permalink())), '</a></h2>');?>

										<small><?php the_category(' ');?></small>	

									</div>
								</div>

								<?php $bullets .= '<li data-target="#awesome-carousel" data-slide-to="'.$count.'" class="' ?>
								<?php if($count == 0): $bullets .= 'active'; endif; ?>
								<?php $bullets .= '"></li>';?>

							<?php endwhile;

						endif;

						wp_reset_postdata();

					$count++;

					endforeach;

				?>
			</div>

			<ul class="carousel-indicators">
				<?php echo $bullets; ?>
			</ul>

			<!-- Controls -->
			<a href="#awesome-carousel" class="carousel-control-prev" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			</a>
			<a href="#awesome-carousel" class="carousel-control-next" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			</a>

		</div> <!-- End of Carousel Slider -->

	</div>

</div>


<div class="row">

	<div class="col-sm-8">

		<?php

			if(have_posts()):

				while(have_posts()):the_post();?>

					<?php get_template_part('formats/content', get_post_format());?>

				<?php endwhile;

			endif;

			//Another query posts
/*
			$lastBlog = new WP_Query('type=post&posts_per_page=2&offset=1');

			if($lastBlog->have_posts()):
				while($lastBlog->have_posts()): $lastBlog->the_post();?>

					<?php get_template_part('formats/content', get_post_format());?>

				<?php endwhile;
			endif;

			wp_reset_postdata();*/

		?>

		<!-- <hr> -->

		<?php
/*
			$lastBlog = new WP_Query('type=post&post_per_page=-1&category_name=sports');

			if($lastBlog->have_posts()):

				while($lastBlog->have_posts()): $lastBlog->the_post();?>

					<?php get_template_part('formats/content', get_post_format());?>

				<?php endwhile;

			endif;

			wp_reset_postdata();
*/
		?>

	</div>

	<div class="col-sm-4">

		<?php get_sidebar('rightbar');?>

	</div>

<?php get_footer(); ?>
