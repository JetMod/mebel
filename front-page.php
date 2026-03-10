<?php
get_header();
?>

        <section class="base-section" id="prices">
            <div class="content">
                <div class="center-descrip">
                    <h2 class="materials-title">Цены на перетяжку</h2>
                    <p>Перетягиваем любой вид мягкой мебели недорого</p>
                    <p>Бесплатно отвозим в мастерскую и привозим обратно!</p>
                </div>
                <div class="table-price">
                    <table>
                        <tr>
                            <th>Тип / сложность</th>
                            <th>Простая</th>
                            <th>Сложная</th>
                        </tr> 
                    <?php while(have_rows('prices_front')): the_row(); ?>
                        <tr>
                            <td><?php the_sub_field('prod_name');?></td>
                            <td><?php the_sub_field('price_simple');?> руб.</td>
                            <td><?php the_sub_field('price_complex');?> руб.</td>
                        </tr>
                    <?php endwhile; ?>
                    </table> 
                </div>
                <div class="center-text-banner">
                    <?php if (get_field('price_link_label')):?><a href="<?php the_field('price_link');?>" class="link-gold"><?php the_field('price_link_label');?></a><?php endif; ?>
                    <p><?php the_field('sub_prices_text');?></p>
                  
                    <?php if(get_field('show_button_under_prices')): ?><a href="#callback" class="btn-gold open-js">Рассчитать стоимость</a><?php endif; ?>
                </div>
            </div>
        </section> 
 
        <section class="crem-section pb60" id="works">
            <div class="content">
                <h2 class="materials-title"><?php the_field('title_section_before-after');?></h2>
            <?php if (have_rows('slides_before-after')) :?>
                <div class="before-after-slider">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                        <?php while( have_rows('slides_before-after')) : the_row(); ?>
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
                    <a href="<?php the_field('works_link');?>" class="link-gold just-link"><?php the_field('works_link_label');?></a>
                    <?php if (get_field('show_button_under_before-after')) :?><a href="#callback" class="btn-gold open-js">Узнать стоимость своего заказа</a><?php endif; ?>
                </div>
            </div>
        </section>

        <section class="koff-section">
            <div class="content over-hid">
                <div class="center-descrip">
                    <h2 class="materials-title">Что о нас пишут клиенты</h2>
                    <p class="reviews-subtitle">Узнайте правдивые отзывы</p>
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

        <section class="base-section no-border-bottom" id="services">
            <div class="content">
                <div class="center-wide-text before-mob-after">
                    <?php echo mebel_add_materials_title_to_first_h2( get_field('zagolovki_section_services') ); ?>
                    <div class="tile-box">
                    <?php while (have_rows('links_services')) : the_row(); ?>
                        <a href="<?php the_sub_field('url_link_service');?>" class="tile-item">
                            <span class="heading-tertiary"><?php the_sub_field('text_link_service');?></span>
                            <img src="<?php the_sub_field('img_link_service'); ?>" alt="">
                        </a>
                    <?php endwhile; ?>
                    </div>
                </div>
                <?php if (get_field('show_button_under_services')):?><a href="#callback" class="btn-gold max-h open-js">Отправить заявку</a><?php endif; ?>
            </div>
        </section>  

        <section class="base-section pd-tb-60 crem-fon" id="stuff">
            <div class="content"> 
                <div class="materials-header">
                    <h2 class="materials-title"><?php the_field('title_1_materials');?></h2>
                    <div class="heading-small"><?php the_field('title_2_materials');?></div>
                </div>
                <div class="flex-btns"> 
                    <?php if (get_field('link_btn_choose_material')) :?><a href="<?php the_field('link_btn_choose_material');?>" class="btn-empty">выберите ткань</a><?php endif; ?>
                    <?php if (get_field('catalog_btn_materials')):?><a href="<?php the_field('catalog_btn_materials');?>" class="btn-empty btn-download" download>Скачать каталог</a><?php endif; ?>
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
                <?php if (get_field('show_button_under_materials')) :?><a href="#callback" class="btn-gold max-h open-js">Вызовите замерщика с образцами</a><?php endif; ?>
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

        <section class="section section-about" id="about">
            <div class="content about-block">
                <div class="text-about">
                    <h2 class="materials-title"><?php the_field('title_section_aboutus');?></h2>
                    <p><?php the_field('text_section_aboutus'); ?></p>
                    <php if (get_field('file_section_aboutus')) : ?>
                        <a href="<?php the_field('file_section_aboutus');?>" class="btn-gold min-h">Скачать договор</a>
                    </php endif; ?>
                </div>
                <img src="<?php the_field('image_section_aboutus');?>" alt="">
            </div>
        </section>      

        <section class="crem-section">
            <div class="content">
                <div class="marsters-block">
                    <h2 class="materials-title"><?php the_field('title_section_masters');?></h2>
                    <div class="masters">
                    <?php while(have_rows('masters')) : the_row(); ?>
                        <div class="master-item">
                            <img src="<?php the_sub_field('foto_master');?>" alt="">
                            <span><?php the_sub_field('name_master');?></span>
                        </div>
                    <?php endwhile; ?>
                    </div>
                </div>
            </div> 
        </section>

        <section class="base-section border-bottom-light">
            <div class="content"> 
                <h2 class="materials-title"><?php the_field('title_section_gramots');?></h2>
                <div class="letters-slider">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                        <?php while (have_rows('image_section_gramots')) : the_row(); ?>
                            <div class="swiper-slide">
                                <div class="letter-item">
                                    <img src="<?php the_sub_field('image_gramota');?>" alt="">
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
            </div>
        </section>

        <section class="min-section">
            <div class="content">
                <div class="center-descrip">
                    <h2 class="materials-title"><?php the_field('title_section_faq');?></h2>
                    <p><?php the_field('subtitle_section_faq');?></p>
                </div>
                <div class="faq-block">
                <?php while (have_rows('faq-items_front')) : the_row(); ?>
                    <div class="faq-item">
                        <div class="faq-question">
                            <span class="heading-tertiary"><?php the_sub_field('question');?></span>
                        </div>
                        <div class="answer-block">
                            <?php the_sub_field('answer');?>
                        </div>
                    </div>
                <?php endwhile; ?>
                </div>
                <a href="<?php the_field('url_link_faq');?>" class="link-gold just-link"><?php the_field('text_link_faq');?></a>
            </div>
        </section>

        <section class="crem-fon mid-section">
            <div class="content">
                <h2 class="materials-title"><?php the_field('title_section_stages');?></h2>
                <div class="grid-stadies">
                <?php while (have_rows('stages')) : the_row(); ?>
                    <div class="stadi-item">
                        <div class="stadi-header">
                            <div class="stadi-icon"><img src="<?php the_sub_field('stage_icon');?>" alt=""></div>
                            <div class="stadi-title"><?php the_sub_field('title_stage');?></div>
                        </div>
                        <div class="stadi-text base-text">
                            <?php the_sub_field('content_stage'); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
                </div>
                
            </div>
        </section>

<?php
get_footer();
