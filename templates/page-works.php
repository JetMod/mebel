<?php
	/* Template Name: Шаблон страницы Наши работы */
get_header();
?>

<section class="text-section">
	<div class="content base-text black-text">
        <div>
            <?php while (have_posts()) : the_post(); ?>
            <h1 class="page-title"><?php  the_title(); ?></h1>
            <?php the_content(); ?>
		<?php endwhile; ?>
    </div> 
</section> 

<?php if (have_rows('gallery_works')) : ?>
<section class='base-section'>
    <div class="content">
        <div class="gallery-block">
            <?php while(have_rows('gallery_works')) : the_row(); ?>
                <img src="<?php the_sub_field('image_gal'); ?>" alt="">
            <?php endwhile; ?>
        </div> 
    </div>
</section>
<?php endif; ?>

<section class="koff-section page-works-section">
    <div class="content over-hid"> 
        <div class="center-descrip">
            <?php the_field('zagolovki_section_reviews', ID_FRONTPAGE); ?>
        </div>
        <div class="flex-links">
            <?php while (have_rows('links_top_reviews', ID_FRONTPAGE)) : the_row(); ?>
                <a href="<?php the_sub_field('link_url'); ?>" target='_blank'><?php the_sub_field('link_label');?></a>
            <?php endwhile; ?>
        </div> 
        <div class="logos-slider-wrap">
            <h2 class="section-subtitle"><?php the_field('title_before_reviews', ID_FRONTPAGE); ?></h2>
            <div class="logos-slider"> 
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                    <?php while (have_rows('slides_reviews', ID_FRONTPAGE)) : the_row(); ?>
                        <div class="swiper-slide">
                        <?php if (get_sub_field('link_review')) : ?>
                            <a href="<?php the_sub_field('link_review'); ?>">
                                <img src="<?php the_sub_field('img_review') ?>" alt="">
                            </a>
                        <?php else : ?>
                            <img src="<?php the_sub_field('img_review') ?>" alt="">
                        <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</section>

<section class="crem-section border-bottom-dark">
    <div class="content">
        <div class="masters-block">
            <h2 class="materials-title"><?php the_field('title_section_masters', ID_FRONTPAGE);?></h2>
            <div class="masters">
            <?php while(have_rows('masters', ID_FRONTPAGE)) : the_row(); ?>
                <div class="master-item">
                    <img src="<?php the_sub_field('foto_master');?>" alt="">
                    <span><?php the_sub_field('name_master');?></span>
                    <p><?php the_sub_field('descript_master');?></p>
                </div>
            <?php endwhile; ?>
            </div>
            <?php if (get_field('agree_master', ID_FRONTPAGE)):?>
            <a href="<?php the_field('agree_master', ID_FRONTPAGE);?>" class="btn-gold min-h" rel="download">Скачать договор</a>
            <?php endif;?>
        </div>
    </div>
</section>

<?php
get_footer();
