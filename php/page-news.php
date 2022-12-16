<?php
/*
Template Name: Articles
*/
?>

<?php get_header(); ?>

<main id="content">
	
	<div class="container">
		<?php query_posts('cat=120'); ?>
		<?php while ( have_posts() ) : the_post(); ?>		
		<?php endwhile; ?>
	</div>

</main>

<?php get_footer(); ?>
