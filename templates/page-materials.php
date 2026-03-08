<?php
	/* Template Name: Шаблон страницы Материалы */
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

<section class="base-section pd-tb-60 crem-fon" id="stuff">
    <div class="content">
        <div class="materials-header"> 
            <h2 class="materials-title"><?php the_field('title_1_materials', ID_FRONTPAGE);?></h2>
            <h5><?php the_field('title_2_materials', ID_FRONTPAGE);?></h5>
        </div>
        <div class="flex-btns">
            <?php if (get_field('link_btn_choose_material', ID_FRONTPAGE)) :?><a href="<?php the_field('link_btn_choose_material', ID_FRONTPAGE);?>" class="btn-empty">выберите ткань</a><?php endif; ?>
            <?php if (get_field('catalog_btn_materials', ID_FRONTPAGE)):?><a href="<?php the_field('catalog_btn_materials', ID_FRONTPAGE);?>" class="btn-empty btn-download" download>Скачать каталог</a><?php endif; ?>
        </div> 
        <?php $materials = new WP_Query(array('post_type'=>'materials'));
        if ($materials->have_posts()):?>  
        <div class="materials-slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php while($materials->have_posts()) : $materials->the_post(); ?>
                    <div class="swiper-slide">
                        <a href="#mater-<?php the_ID(); ?>" class="material-item">
                            <h4><?php the_title();?></h4>
                            <?php the_post_thumbnail('full');?>
                        </a>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="slider-navigation">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
        <?php endif;?>
        <a href="#callback" class="btn-gold max-h open-js">Вызовите замерщика с образцами</a>
    </div>
</section>

<?php if ($materials->have_posts()): while($materials->have_posts()) : $materials->the_post(); ?>
<div class="pop-material pop-styles" id="mater-<?php the_ID();?>">
    <div class="pop-material-block">
        <div class="about-mat">
            <div class="about-mat-img">
                <?php the_post_thumbnail('full'); ?>
            </div>
            <div class="about-mat-txt">
                <h4><?php the_title();?></h4>
                <?php the_content(); ?>
                <div class="characts">
                    <h5>Характеристики:</h5>
                    <ul class="left-block">
                        <?php while(have_rows('list_characters_left')) : the_row();?>
                        <li><?php the_sub_field('character_item');?></li>
                        <?php endwhile; ?>
                    </ul>
                    <ul class="right-block">
                        <?php while(have_rows('list_characters_right')) : the_row();?>
                        <li><?php the_sub_field('character_item');?></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div> 
    </div>
</div>
<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
<?php endif;?>

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
            <h3 class="section-subtitle"><?php the_field('title_before_reviews', ID_FRONTPAGE); ?></h3>
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

<?php
get_footer();
