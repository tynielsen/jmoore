<?php
/**
 * The template for displaying full blog posts.
 *
 * This is the template that displays full blog posts by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package jmoore
 */

get_header(); ?>  

<div class="full-book-article-container">
	<section class="full-book-article generic-post">
		<div class="container">

		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<article>
			<?php if (get_field('book_cover_photo')): ?>
				<div class="media-container-photo media-container">
					<img src="<?php the_field('book_cover_photo'); ?>" alt="Book Image">
				</div>
			<?php elseif ( has_post_video() ): ?>

				<div class="media-container-video media-container">
					<?php the_post_video(); ?>
				</div> <!-- /.media-container-video -->

			<?php elseif ( has_post_thumbnail() ): ?>

				<div class="media-container-photo media-container">
					<?php the_post_thumbnail(); ?>
				</div> <!-- /.media-container-photo -->
			<?php endif; ?>
				
				<div class="book-post-content generic-post-content default-text">
					<h1><?php the_title(); ?></h1>
					<div><?php the_field('book_description'); ?></div>
					<!-- <span>by <?php // the_author(); ?></span> -->
				</div> <!-- /.summary -->
			</article>
		
		<?php endwhile; ?>

		</div> <!-- /.container -->
	</section> <!-- /.full-article -->
</div> <!-- /.full-article-container -->

<?php get_footer(); ?>
