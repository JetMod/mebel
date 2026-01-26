<?php
	/* Template Name: Шаблон страницы Реставрация */
get_header();
?>

<section class="crem-section pb60" id="works">
    <div class="content">
        <h3><?php the_field('title_section_before-after', ID_FRONTPAGE);?></h3>
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
    <br>
    <a href="#callback" class="btn-gold open-js">Задать вопрс</a>
</section>

<section class="text-section">
	<div class="content base-text black-text">
        <div>
            <?php while (have_posts()) : the_post(); ?>
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
		    <?php endwhile; ?>
        </div>
    </div>
</section>

<section class="crem-section pb60" id="works">
    <div class="content">
        <h3><?php the_field('title_section_before-after_rest');?></h3>
    <?php if (have_rows('slides_before-after_rest')) :?>
        <div class="before-after-slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                <?php while( have_rows('slides_before-after_rest')) : the_row(); ?>
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
            <a href="#callback" class="btn-gold open-js">Узнать стоимость своего заказа</a>
        </div>
    </div>
</section>

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
