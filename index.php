<?php
get_header();
?>

<section class="base-section">
	<div class="content">
		<?php while (have_posts()) : the_post(); ?>
		<div class="center-descrip">
            <h2 class="page-title"><?php the_title(); ?></h2>
        </div>

		<?php the_content(); ?>

		<?php endwhile; ?>
	</div>
</section>
<?php
get_footer();
