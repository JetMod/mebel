<?php
get_header();
?>

<section class="text-section">
	<div class="content base-text">
		<?php while (have_posts()) : the_post(); ?>
		<div class="center-descrip">
            <h2><?php the_title(); ?></h2>
        </div>

		<?php the_content(); ?>

		<?php endwhile; ?>
	</div>
</section>
<?php
get_footer();
