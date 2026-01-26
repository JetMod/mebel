<?php
	/* Template Name: Шаблон страницы Ремонт мягкой мебели */
get_header();
?>

<section class="text-section">
	<div class="content base-text black-text">
        <div>
            <?php while (have_posts()) : the_post(); ?>
            <h2><?php  the_title(); ?></h2>
            <?php the_content(); ?>
		<?php endwhile; ?>
    </div>
        <?php if (get_field('text_repair_1')) :?>
        <div>
            <div class="image-left minis-img">
                <img src="<?php the_field('image_repair_1');?>" alt="">
                <div class="text-block text-base">
                    <h3><?php the_field('title_repair_1'); ?></h3>
                    <?php the_field('text_repair_1'); ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if (have_rows('repair_types_rep_1')) : ?>
        <div>
            <div class="img-items3 pad-bord">
                <?php while (have_rows('repair_types_rep_1')) : the_row(); ?>
                <div class="item">
                    <img src="<?php the_sub_field('image_repair');?>" alt="">
                    <span><?php the_sub_field('name_repair');?></span>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
        <?php endif; ?>
        <?php if (get_field('text_repair_2')) :?>
        <div>
            <div class="image-left minis-img pad-bord">
                <img src="<?php the_field('image_repair_2');?>" alt="">
                <div class="text-block text-base">
                    <h3><?php the_field('title_repair_2'); ?></h3>
                    <?php the_field('text_repair_2'); ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if (get_field('text_repair_3')) :?>
        <div>
            <div class="image-left minis-img">
                <img src="<?php the_field('image_repair_3');?>" alt="">
                <div class="text-block text-base">
                    <h3><?php the_field('title_repair_3'); ?></h3>
                    <?php the_field('text_repair_3'); ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if (have_rows('repair_types_rep_2')) : ?>
        <div>
            <div class="img-items3 pad-bord">
                <?php while (have_rows('repair_types_rep_2')) : the_row(); ?>
                <div class="item">
                    <img src="<?php the_sub_field('image_repair');?>" alt="">
                    <span><?php the_sub_field('name_repair');?></span>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
        <?php endif; ?>
        <?php if (get_field('text_repair_4')) :?>
        <div>
            <div class="image-left minis-img">
                <img src="<?php the_field('image_repair_4');?>" alt="">
                <div class="text-block text-base">
                    <h3><?php the_field('title_repair_4'); ?></h3>
                    <?php the_field('text_repair_4'); ?>
                </div>
            </div>
        </div>
        <?php endif; ?>

	</div>
</section>

<section class="min-section pb0">
    <div class="content">
        <div class="center-descrip">
            <h3><?php the_field('title_section_prices_rep');?></h3>
            <p><?php the_field('subtitle_section_prices_rep');?></p>
        </div>
        <div class="grid-prices mb0">
        <?php 
            for($i=0;$i<=17;$i++) {
                $table_price = 'table_prices_copy' . $i;
                if (have_rows($table_price,ID_PAGE_REPAIR)): ?>
                    <div class="grid-price-table">
                    <?php while (have_rows($table_price,ID_PAGE_REPAIR)) : the_row();?>
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
        <?php if (get_field('title_compose_price_rep')) : ?>
        <h3><?php the_field('title_compose_price_rep');?></h3>
        <?php endif; ?>
        <div class="base-text">
            <?php if (get_field('text_compose_price_rep')) : ?>
            <div>
                <?php the_field('text_compose_price_rep');?>
            </div>
            <?php endif; ?>
            <?php if (get_field('text_before_btn_file_rep')) : ?>
            <div class="center-banner">
                <h4><?php the_field('text_before_btn_file_rep');?></h4>
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
            <h3><?php the_field('title_before_reviews', ID_FRONTPAGE); ?></h3>
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
            <h3><?php the_field('title_section_faq', ID_FRONTPAGE);?></h3>
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
</section>

<?php if (have_rows('furnitura')) : ?>
<section class="min-section">
    <div class="content base-text">
        <h2><?php the_field('title_section_furnitura');?></h2>
        <div class="furni-block">
        <?php while (have_rows('furnitura')) : the_row(); ?>
            <div class="furni-item">
                <img src="<?php the_sub_field('image_furni');?>" alt="">
                <span><?php the_sub_field('name_furni');?></span>
            </div>
        <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="crem-section border-bottom-dark">
    <div class="content">
        <div class="masters-block">
            <h2><?php the_field('title_section_masters', ID_FRONTPAGE);?></h2>
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
            <h3><?php the_field('title_photos_section_over', ID_PERETYAZHKA);?></h3>
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
        <h3><?php the_field('title_section_stages', ID_FRONTPAGE);?></h3>
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
