<?php
	/* Template Name: Шаблон страницы Перетяжка */
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
        <?php if (get_field('label_form_file')) :?>
        <a href="#callback-file" class="btn-gold open-js btn-center"><?php the_field('label_form_file');?></a>
        <?php endif; ?>
</section>
<div class="pop-up pop-min pop-styles" id="callback-file">
    <div class="contact-form">
        <h2 class="heading-form"><?php the_field('title_form_file', 'option'); ?></h2>
        <?php echo do_shortcode(get_field('form_file','option')); ?>
    </div>
</div> 


<?php if (have_rows('types_obi')) : ?>
<section class="min-section">
    <div class="content">
        <div class="img-items-gallery pad-bord">
        <?php while (have_rows('types_obi')) : the_row(); ?>
            <?php if (get_sub_field('link_obi')) : ?>
            <a href="<?php the_sub_field('link_obi');?>" class="item">
                <img src="<?php the_sub_field('izobrazhenie');?>" alt="">
                <span><u><?php the_sub_field('title_obi');?></u></span>
            </a>
            <?php else: ?>
            <div class="item">
                <img src="<?php the_sub_field('izobrazhenie');?>" alt="">
                <span><?php the_sub_field('title_obi');?></span>
            </div>
            <?php endif; ?>
        <?php endwhile; ?> 
        </div>
    </div>
</section>
<?php endif; ?>

<section class="min-section pb0">
    <div class="content">
        <div class="center-descrip">
            <h2 class="materials-title margin-left-right-0"><?php the_field('title_section_price_obi');?></h2>
            <p><?php the_field('subtitle_section_price_obi');?></p>
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
        <?php if (get_field('title_compose_price_obi')) : ?>
        <h2 class="materials-title margin-left-right-0"><?php the_field('title_compose_price_obi');?></h2>
        <?php endif; ?>
        <div class="base-text">
            <?php if (get_field('text_compose_price_obi')) : ?>
            <div>
                <?php the_field('text_compose_price_obi');?>
            </div>
            <?php endif; ?>
            <?php if (get_field('title_before_btn_obi')) : ?>
            <div class="center-banner">
                <div class="heading-tertiary"><?php the_field('title_before_btn_obi');?></div>
                <a href="#callback-file" class="btn-empty open-js">Загрузить фото</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="crem-section pb60" id="works">
    <div class="content">
        <h2 class="materials-title margin-left-right-0"><?php the_field('title_section_before-after', ID_FRONTPAGE);?></h2>
    <?php if (have_rows('slides_before-after', ID_FRONTPAGE)) :?>
        <div class="before-after-slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                <?php while( have_rows('slides_before-after', ID_FRONTPAGE)) : the_row(); ?>
                    <div class="swiper-slide">
                        <div class="before-after-block">
                            <div class="before-block">
                                <span>до</span>
                                <img src="<?php the_sub_field('image_before');?>" alt="">
                            </div>
                            <div class="after-block">
                                <span>после</span>
                                <img src="<?php the_sub_field('image_after');?>" alt="">
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                </div>
            </div>
            <div class="slider-navigation">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    <?php endif; ?>
        <div class="center-btn-banner">
            <a href="<?php the_field('works_link', ID_FRONTPAGE);?>" class="link-gold just-link"><?php the_field('works_link_label', ID_FRONTPAGE);?></a>
            <?php if (get_field('show_button_under_before-after', ID_FRONTPAGE)) :?><a href="#callback" class="btn-gold open-js">Узнать стоимость своего заказа</a><?php endif; ?>
        </div>
    </div>
</section> 

<section class="koff-section">
            <div class="content over-hid">
                <div class="center-descrip">
                    <h2 class="materials-title">Что о нас пишут клиенты</h2>
                </div> 
                <div class="flex-links">
                    <?php while (have_rows('links_top_reviews')) : the_row(); ?>
                        <a href="<?php the_sub_field('link_url'); ?>" target='_blank'><?php the_sub_field('link_label');?></a>
                    <?php endwhile; ?>
                </div> 
                <div class="logos-slider-wrap">
                    <h2 class="section-subtitle"><?php the_field('title_before_reviews'); ?></h2>
                    <div class="logos-slider">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                            <?php while (have_rows('slides_reviews')) : the_row(); ?>
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
            <h2 class="materials-title margin-left-right-0"><?php the_field('title_section_faq', ID_FRONTPAGE);?></h2>
            <p><?php the_field('subtitle_section_faq', ID_FRONTPAGE);?></p>
        </div>
        <div class="faq-block">
        <?php if (have_rows('faq-items_all')) : ?>
        <?php while (have_rows('faq-items_all')) : the_row(); ?>
            <div class="faq-item">
                <div class="faq-question">
                    <span class="heading-tertiary"><?php the_sub_field('question');?></span>
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
                    <span class="heading-tertiary"><?php the_sub_field('question');?></span>
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
            <h2 class="materials-title margin-left-right-0"><?php the_field('title_1_materials', ID_FRONTPAGE);?></h2>
            <div class="heading-small"><?php the_field('title_2_materials', ID_FRONTPAGE);?></div>
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
                            <span class="heading-tertiary"><?php the_title();?></span>
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
                <div class="heading-tertiary"><?php the_title();?></div>
                <?php the_content(); ?>
                <div class="characts">
                    <div class="heading-small">Характеристики:</div>
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
            <h2 class="materials-title margin-left-right-0"><?php the_field('title_section_masters', ID_FRONTPAGE);?></h2>
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
            <h2 class="materials-title margin-left-right-0"><?php the_field('title_photos_section_over', ID_PERETYAZHKA);?></h2>
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

<section class="crem-fon mid-section">
    <div class="content">
        <h2 class="materials-title margin-left-right-0"><?php the_field('title_section_stages', ID_FRONTPAGE);?></h2>
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
