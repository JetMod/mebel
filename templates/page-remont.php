<?php
	/* Template Name: Шаблон страницы Ремонт */
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
    </div>

    <?php if (have_rows('remont_types_one')) : ?>
        <br><br><br>
    <div class="content base-text">
        <?php $i = 1;
        while (have_rows('remont_types_one')) : the_row();
        if ($i % 2 == 0) :?> 
        <div class="image-right">
        <?php else: ?>
        <div class="image-left">
        <?php endif; ?>
            <img src="<?php the_sub_field('izobrazhenie');?>" alt="">
            <div class="text-block text-base">
                <h2 class="materials-title"><?php the_sub_field('title_rem_type');?></h2>
                <?php the_sub_field('text_rem_type'); ?>
            </div>
        </div>  
        <?php $i++; endwhile; ?>
    </div>
    <?php endif; ?>
    
<?php if (have_rows('remont_types_two')) : ?>
    <div class="content base-text">
        <br><br>
        <?php
            while (have_rows('remont_types_two')) : the_row();?>
            <div class="image-left">
                <img src="<?php the_sub_field('izobrazhenie');?>" alt="">
                <div class="text-block text-base">
                    <h2 class="materials-title"><?php the_sub_field('title_rem_type');?></h2>
                    <?php the_sub_field('text_rem_type'); ?>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</section>

<?php if (have_rows('types_rem')) : ?>
<section class="min-section">
    <div class="content">
        <div class="img-items-gallery pad-bord">
        <?php while (have_rows('types_rem')) : the_row(); ?>
            <?php if (get_sub_field('link_rem')) : ?>
            <a href="<?php the_sub_field('link_rem');?>" class="item">
                <img src="<?php the_sub_field('izobrazhenie');?>" alt="">
                <span><u><?php the_sub_field('title_rem');?></u></span>
            </a>
            <?php else: ?>
            <div class="item">
                <img src="<?php the_sub_field('izobrazhenie');?>" alt="">
                <span><?php the_sub_field('title_rem');?></span>
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
            <h2 class="materials-title"><?php the_field('title_section_price_rem');?></h2>
            <p><?php the_field('subtitle_section_price_rem');?></p>
        </div>
        <div class="grid-prices mb0">
        <?php 
            if (have_rows('table_prices_apart_copy0')) {
                $prices_from = 'table_prices_apart_copy';
                $id_from = '';
            }
            else {
                $prices_from = 'table_prices_copy';
                $id_from = ID_PAGE_REPAIR;
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
        <?php if (get_field('title_compose_price_rem')) : ?>
        <h2 class="materials-title"><?php the_field('title_compose_price_rem');?></h2>
        <?php endif; ?>
        <div class="base-text">
            <?php if (get_field('text_compose_price_rem')) : ?>
            <div>
                <?php the_field('text_compose_price_rem');?>
            </div>
            <?php endif; ?>
            <?php if (get_field('title_before_btn_rem')) : ?>
            <div class="center-banner">
                <h4><?php the_field('title_before_btn_rem');?></h4>
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

<?php if (have_rows('furnitura', ID_REMONT)) : ?>
<section class="min-section">
    <div class="content base-text">
        <h2 class="materials-title"><?php the_field('title_section_furnitura', ID_REMONT);?></h2>
        <div class="furni-block">
        <?php while (have_rows('furnitura', ID_REMONT)) : the_row(); ?>
            <div class="furni-item">
                <img src="<?php the_sub_field('image_furni');?>" alt="">
                <span><?php the_sub_field('name_furni');?></span>
            </div>
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
