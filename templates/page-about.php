<?php
	/* Template Name: Шаблон страницы О компании         */
get_header();
?>

<section class="text-section">
	<div class="content base-text black-text">
        <div>
            <?php while (have_posts()) : the_post(); ?>
            <h1 class="page-title"><?php  the_title(); ?></h1>
            <div class="image-left minis-img">
                <img src="<?php echo get_template_directory_uri() . '/assets/img/logotype.svg';?>" alt="" style="object-fit:contain">
                <div class="text-block text-base">
                    <?php the_content(); ?> 
                </div>
            </div>
            <?php endwhile; ?>
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

<?php if (have_rows('foto_products_over', ID_PERETYAZHKA)) :?>
<section class="base-section crem-fon border-bottom-dark">
    <div class="content">
        <div class="center-descrip">
            <h2 class="materials-title"><?php the_field('title_photos_section_over', ID_PERETYAZHKA);?></h2>
            <p><?php the_field('subtitle_photos_section_over', ID_PERETYAZHKA);?></p>
        </div>
        <div class="photos-block">
            <?php while (have_rows('foto_products_over', ID_PERETYAZHKA)) : the_row(); ?>
            <img src="<?php the_sub_field('foto');?>" alt="">
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="koff-section">
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
            <h2 class="materials-title"><?php the_field('title_before_reviews', ID_FRONTPAGE); ?></h2>
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

<section class="crem-fon mid-section">
    <div class="content">
        <h2 class="materials-title"><?php the_field('title_section_stages', ID_FRONTPAGE);?></h2>
        <div class="grid-stadies">
        <?php while (have_rows('stages', ID_FRONTPAGE)) : the_row(); ?>
            <div class="stadi-item">
                <div class="stadi-header">
                    <div class="stadi-icon"><img src="<?php the_sub_field('stage_icon');?>" alt=""></div>
                    <div class="stadi-title"><?php the_sub_field('title_stage');?></div>
                </div>
                <div class="stadi-text base-text">
                    <?php the_sub_field('content_stage', ID_FRONTPAGE); ?>
                </div>
            </div>
        <?php endwhile; ?>
        </div>
        
    </div>
</section>

<?php
get_footer();
