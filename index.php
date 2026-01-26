<?php
get_header();
?>

<section class="base-section">
	<div class="content">
		<?php while (have_posts()) : the_post(); ?>
		<div class="center-descrip">
            <h3><?php the_title(); ?></h3>
        </div>

		<?php the_content(); ?>

		<?php endwhile; ?>
	</div>
</section>
<?php
get_footer();
