<?php
get_header();
?>

<section class="text-section">
	<div class="content base-text">
		<?php while (have_posts()) : the_post(); ?>
		<div class="center-descrip">
            <h1 class="page-title"><?php the_title(); ?></h1>
        </div>

		<?php the_content(); ?> 

		<?php endwhile; ?>
	</div>
</section>
<?php  
get_footer();
