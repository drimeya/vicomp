<?php get_header(); ?>

<main id="content">
	<div class="container">
        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'includes/content', get_post_format() ); ?>

            <?php
                // If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() || '0' != get_comments_number() )
                    comments_template();
            ?>

        <?php endwhile; // end of the loop. ?>            
    </div>
</main>

<?php get_footer(); ?>