<?php
	/* Template Name: Шаблон страницы Перевозка */
get_header();
?>

<section class="min-section pb0">
    <div class="content">
        <div class="title-section">
        <?php while (have_posts()) : the_post(); ?>
            <h2><?php the_title();?></h2>
		    <?php the_content(); ?>

		<?php endwhile; ?>
        </div>
        <?php if (have_rows('services_3')) :?>
        <div class="services">
            <?php while (have_rows('services_3')) : the_row(); ?>
            <div class="serv-item">
                <img src="<?php the_sub_field('image_serv');?>" alt="">
                <h3><?php the_sub_field('name_serv');?></h3>
                <a href="<?php the_sub_field('link_serv');?>">Перейти</a>
            </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>

    <div class="offer-section">
        <div class="offer-ribbon">
            <div class="content">
                <div class="offer-text">
                    <?php the_field('description_offer_move'); ?>
                </div>
                <img src="<?php the_field('image_offer_move');?>" class="offer-img" alt="">
            </div>
        </div>
    </div>

    <div class="content">
        <div class="img-side-corn">
            <div class="img-side">
                <img src="<?php echo get_template_directory_uri() . '/assets/img/img-why.png';?>" alt="">
            </div>
            <div class="text-side">
                <h3><?php the_field('title_why_move');?></h3>
                <div class="grid-four-text">
                    <?php while(have_rows('advants_choose_move')) : the_row();?>
                    <div class="grid-item">
                        <h5><?php the_sub_field('advant_title');?></h5>
                        <p><?php the_sub_field('advant_descript');?></p>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="banner-invite" style="background-image:url('<?php if (get_field('fon_banner_invite')) { the_field('fon_banner_invite'); } else { echo get_template_directory_uri() . '/assets/img/invite-banner.png'; };?>')">
        <div class="content">
            <div class="invite-inner">
                <div class="invite-text">
                    <h4><?php the_field('title_banner_invite');?></h4>
                    <p><?php the_field('text_banner_invite');?></p>
                </div>
                <div class="invite-conts">
                    <a href="tel:<?php the_field('phone_link_header', 'option'); ?>" class="phone-link"><?php the_field('phone_label_header', 'option');?></a>
                    <a href="#callback" class="white-btn open-js">Оставить заявку</a>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="text-with-lines bold-mob">
            <div>
                <p><?php the_field('slogan_page_zakaz');?>
                    <?php if (get_field('subslogan_page_zakaz')) :?>
                        <span><?php the_field('subslogan_page_zakaz');?></span>
                    <?php endif; ?>
                </p>
                
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
