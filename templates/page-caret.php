<?php
	/* Template Name: Шаблон страницы Каретная стяжка */
get_header();
?>

<section class="text-section">
	<div class="content base-text black-text"> 
        <div>
            <?php while (have_posts()) : the_post(); ?>
            <h1 class="page-title"><?php the_title(); ?></h1>
            <?php the_content(); ?>
		    <?php endwhile; ?>
    </div> 
    <div> 
        <div class="image-right minis-img">
            <img src="<?php the_field('image_descr_1');?>" alt="">
            <div class="text-block text-base">
                <?php the_field('text_descr_1'); ?>
            </div>
        </div>
        <div class="image-left minis-img">
            <img src="<?php the_field('image_descr_2');?>" alt="">
            <div class="text-block text-base">
                <?php the_field('text_descr_2'); ?>
            </div>
        </div>
    </div>
        
    <?php if (have_rows('gallery_caret')) : ?>
        <div>
            <div class="gallery-block">
                <?php while(have_rows('gallery_caret')) : the_row(); ?>
                    <div>
                        <?php if (get_sub_field('imag_gal')) : ?>
                            <img src="<?php the_sub_field('imag_gal'); ?>" alt="">
                        <?php endif; ?>
                        <?php if (get_sub_field('title_gal')) : ?>
                            <h4><?php the_sub_field('title_gal'); ?></h4>
                        <?php endif; ?>
                        <?php if (get_sub_field('text_gal')) : ?>
                            <p><?php the_sub_field('text_gal'); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
</section> 

<section class="min-section pb0">
    <div class="content">
        <div class="center-descrip">
            <h2 class="materials-title"><?php the_field('title_section_prices_caret');?></h2>
            <p><?php the_field('subtitle_section_prices_caret');?></p>
        </div>
        <div class="grid-prices mb0">
        <?php 
            if (have_rows('table_prices_apart_copy0')) {
                $prices_from = 'table_prices_apart_copy';
                $id_from = '';
            }
            else {
                $prices_from = 'table_prices_copy';
                $id_from = ID_PAGE_OVERDRAWING;
            }
            for($i=0;$i<=17;$i++) {
                
                $table_price = $prices_from . $i;
                if (have_rows($table_price, $id_from)): ?>
                    <div class="grid-price-table">
                    <?php while (have_rows($table_price, $id_from)) : the_row();?>
                        <?php if (get_sub_field('head_price_item')) : ?>
                            <div class="grid-price-title closed"><?php the_sub_field('name_price_item');?></div>
                            <div class="grid-price-lines" style="display:none">
                                <table>
                        <?php else: ?>
                            <tr>
                                <td><?php the_sub_field('name_price_item');?></td>
                                <td><?php the_sub_field('price_price_item');?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endwhile; ?>
                                </table>
                            </div>
                    </div>
                <?php endif;
            }
        ?>
        </div>
    </div>
</section>

<section class="min-section border-bottom-light">
    <div class="content">
        <?php if (get_field('title_compose_price_caret')) : ?>
        <h2 class="materials-title"><?php the_field('title_compose_price_caret');?></h2>
        <?php endif; ?>
        <div class="base-text">
            <?php if (get_field('text_compose_price_caret')) : ?>
            <div>
                <?php the_field('text_compose_price_caret');?>
            </div>
            <?php endif; ?>
            <?php if (get_field('text_before_btn_file_caret')) : ?>
            <div class="center-banner">
                <h4><?php the_field('text_before_btn_file_caret');?></h4>
                <a href="#callback-file" class="btn-empty open-js">Загрузить фото</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<div class="pop-up pop-min pop-styles" id="callback-file">
    <div class="contact-form">
        <h3><?php the_field('title_form_file', 'option'); ?></h3>
        <?php echo do_shortcode(get_field('form_file','option')); ?>
    </div>
</div>

<?php if (have_rows('work_item_caret')) : ?>
<section class="min-section">
    <div class="content">
        <div class="center-descrip">
            <h3><?php the_field('title_our_works_caret');?></h3>
        </div>
        <div class="img-items-gallery pad-bord">
        <?php while (have_rows('work_item_caret')) : the_row(); ?>
            <div class="item">
                <img src="<?php the_sub_field('image_work');?>" alt="">
                <span><?php the_sub_field('title_work');?></span>
            </div>
        <?php endwhile; ?>
        </div>
        <?php if (get_field('linkk_works_caret')) : ?>
            <a href="<?php the_field('linkk_works_caret')?>" class="link-gold">Посмотреть Наши работы</a>
        <?php endif;?>
        <br>
        <a href="#callback" class="btn-gold open-js">Узнать стоимость своего заказа</a>
    </div>
</section> 
<?php endif; ?>

<section class="koff-section"> 
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
