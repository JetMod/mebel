<?php
	/* Template Name: Шаблон страницы Пошив чехлов */
get_header();
?>

<section class="text-section">
	<div class="content base-text black-text">
        <div>
            <?php while (have_posts()) : the_post(); ?>
                <h1 class="page-title"><?php the_title(); ?></h1> 
                <div class="image-right minis-img">
                    <?php the_post_thumbnail('full');?>
                    <div class="text-block text-base">
                        <?php the_content(); ?>
                    </div>
                </div>
		    <?php endwhile; ?> 
        </div>
</section> 


<section class="min-section">
    <div class="content"> 
        <div class="center-descrip">
            <h2 class="materials-title"><?php the_field('title_section_faq', ID_FRONTPAGE);?></h2>
            <p><?php the_field('subtitle_section_faq', ID_FRONTPAGE);?></p>
        </div>
        <div class="faq-block">
        <?php if (have_rows('faq-items_all')) : ?>
        <?php while (have_rows('faq-items_all')) : the_row(); ?>
            <div class="faq-item">
                <div class="faq-question">
                    <h4><?php the_sub_field('question');?></h4>
                </div>
                <div class="answer-block">
                    <?php the_sub_field('answer');?>
                </div>
            </div> 
        <?php endwhile; ?>
        <?php else: ?>
        <?php while (have_rows('faq-items_front', ID_FRONTPAGE)) : the_row(); ?>
            <div class="faq-item">
                <div class="faq-question">
                    <h4><?php the_sub_field('question');?></h4>
                </div>
                <div class="answer-block">
                    <?php the_sub_field('answer');?>
                </div>
            </div>
        <?php endwhile; ?>
        <?php endif; ?>
        </div>
        <a href="<?php the_field('url_link_faq', ID_FRONTPAGE);?>" class="link-gold just-link"><?php the_field('text_link_faq', ID_FRONTPAGE);?></a>
    </div>
    <br>
    <a href="#callback" class="btn-gold open-js">Задать вопрс</a>
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
