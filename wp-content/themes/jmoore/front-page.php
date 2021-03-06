<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package jmoore
 */

get_header();?>

<section class="carousel">
	<div class="container">

		<ul class="bxslider">

		<?php
		$Slides = new WP_Query(array(
			'showposts'   => -1,  // -1 brings all slides, otherwise it will bring the value define in wp settings, default is 10.
			'post_type'   => 'slides'
		));

		while($Slides->have_posts()) : $Slides->the_post(); //start the loop to print book list
		?>

			<li>
				<?php if (wp_is_mobile() && get_field( 'carousel_mobile_bg_image' )) { ?>
				<img src="<?php the_field('carousel_mobile_bg_image'); ?>" alt="Book Image">
				<?php } else { ?>
				<img src="<?php the_field('carousel_bg_image'); ?>" alt="Book Image">
				<?php } ?>

				<div class="slide-content <?php the_field('carousel_orientation'); ?>">
					<h1><?php the_field('carousel_message') ?></h1>
					<a class="btn pink-btn" href="<?php the_field('carousel_button_link'); ?>"><?php the_field('carousel_button_text'); ?> &raquo;</a>
				</div> <!-- /.slide-content -->
			</li>

		<?php
		endwhile;
		wp_reset_postdata();
		?>

		</ul>
	</div> <!-- /.container -->
</section> <!-- /.hero-carousel -->

<section class="featured-stories">
	<div class="container">

		<?php
		query_posts(array(
			'showposts' => -1,  // -1 brings all books, otherwise it will bring the value define in wp settings, default is 10.
			'post_type' => array('post', 'books', 'news', 'ahoy'),
		));

		while(have_posts()) : the_post(); //start the loop to print book list

			if(get_field('featured_post')):
		?>

		<div class="featured-story">

			<?php if( 'news' == get_post_type() ): ?>

			<div class="img-container"></div>
			<div class="content-container">
				<h2><?php the_title(); ?></h2>
				<hr class="purple-hr">
				<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>">Learn More<i class="icon icon-dbl-arrow-pink"></i></a>
			</div> <!-- /.content-container -->

			<?php elseif('post' == get_post_type()): ?>

			<div class="img-container"></div>
			<div class="content-container">
				<h2><?php the_title(); ?></h2>
				<hr class="purple-hr">
				<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>">Learn More<i class="icon icon-dbl-arrow-pink"></i></a>
			</div> <!-- /.content-container -->

			<?php elseif('ahoy' == get_post_type()): ?>

			<div class="img-container"></div>
			<div class="content-container">
				<h2><?php the_title(); ?></h2>
				<hr class="purple-hr">
				<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>">Learn More<i class="icon icon-dbl-arrow-pink"></i></a>
			</div> <!-- /.content-container -->

			<?php elseif('books' == get_post_type()): ?>

			<div class="img-container">
				<img src="<?php the_field('book_cover_photo'); ?>" alt="Book Image">
			</div> <!-- /.img-container -->

			<div class="content-container">
				<h2><?php the_title(); ?></h2>
				<hr class="purple-hr">
				<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>">Learn More<i class="icon icon-dbl-arrow-pink"></i></a>
			</div> <!-- /.content-container -->

			<?php endif; ?>
		</div> <!-- /.featured-story -->

		<?php
			endif;
		endwhile;
		wp_reset_postdata(); // reset the loop.
		?>
	</div> <!-- /.container -->
</section> <!-- /.featured-stories -->

<?php get_footer(); ?>
