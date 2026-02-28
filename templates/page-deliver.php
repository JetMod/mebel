<?php
	/* Template Name: Шаблон страницы Доставка */
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
        <?php if (get_field('text_block_img')) :?>
        <div>
            <div class="image-left minis-img">
                <img src="<?php the_field('image_block_img');?>" alt="">
                <div class="text-block text-base">
                    <?php the_field('text_block_img'); ?>
                </div>
            </div>
        </div>
        <?php endif; ?> 

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
        <!-- /*<a href="<?php the_field('url_link_faq', ID_FRONTPAGE);?>" class="link-gold just-link"><?php the_field('text_link_faq', ID_FRONTPAGE);?></a>*/ -->
        <a href="#callback-file" class="btn-gold open-js">Задать вопрос</a>
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
