<?php
	/* Template Name: Шаблон страницы Вопрос-ответ */
get_header();
?>

<section class="min-section">
    <div class="content">
        <div class="center-descrip">
            <h1 class="page-title"><?php the_field('title_page_faq');?></h1>
            <p><?php the_field('description_page_faq');?></p>
        </div> 
        <div class="faq-block">
        <?php 
            $faq = get_field('faq_items'); 
            $adr_count = count($faq);
            $i = 0; 
            while ($i < $adr_count) : ?>
            <?php if ($i == 0) :?>
            <div class="faq-item active">
                <div class="faq-question">
                    <span class="heading-tertiary"><?php echo $faq[$i]['question'];?></span>
                </div>
                <div class="answer-block" style="display:block;">
                    <?php echo $faq[$i]['answer'];?>
                </div>
            </div>
            <?php else: ?> 
            <div class="faq-item">
                <div class="faq-question">
                    <span class="heading-tertiary"><?php echo $faq[$i]['question'];?></span>
                </div>
                <div class="answer-block">
                    <?php echo $faq[$i]['answer'];?>
                </div>
            </div>
            <?php endif; ?>
        <?php $i++;endwhile; ?>
        </div>
        <div class="center-banner">
            <div class="heading-tertiary"><?php the_field('title_banner_faq');?></div>
            <?php the_field('text_banner_faq');?>
            <a href="#callback" class="btn-gold open-js">Задать вопрос</a>
        </div>
    </div>
</section>
<?php
get_footer();
