<?php
	/* Template Name: Шаблон страницы с Кнопкой Заказа */
get_header();
?>

<section class="text-section">
	<div class="content base-text">
		<?php while (have_posts()) : the_post(); ?>
		<div>
            <div class="center-descrip">
                <h1 class="page-title"><?php the_title(); ?></h1>
            </div>
			<?php the_content(); ?> 
		</div>
        <?php endwhile; ?>
        <?php if (have_rows('content_btn')) :?>
            <?php while (have_rows('content_btn')) : the_row(); ?>
                <div>
                <?php if (get_sub_field('content')): ?>
                    <?php the_sub_field('content'); ?>
                <?php endif; ?> 
                <?php if (get_sub_field('btn_link')) : ?>
                    <div style="padding-top:25px";>
                        <a href="<?php the_sub_field('btn_link');?>" class="btn-gold open-js"><?php the_sub_field('btn_label');?></a>
                    </div>
                <?php endif; ?> 
                </div>
            <?php endwhile; ?>
        <?php endif; ?>

        <?php if (have_rows('popups_btn')) :?>
        <?php while (have_rows('popups_btn')) : the_row(); ?>
        <div class="pop-stock stock-styles" id="<?php the_sub_field('id_popup');?>">
            <div class="stock-contain stock-first">
                <?php if (get_sub_field('fon_popup')) :?>
                    <img src="<?php the_sub_field('fon_popup');?>" alt="">
                <?php endif; ?>
                <div class="stock-text">
                    <?php the_sub_field('text_popup'); ?>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
	</div>
</section>
<?php
get_footer();
