<?php
	/* Template Name: Шаблон страниц Цены */
get_header();
?>

<section class="base-section page-prices-section">
    <div class="content">
        <div class="center-descrip">
            <h1 class="page-title"><?php the_field('title_page_prices');?></h1>
            <p><?php the_field('description_page_prices');?></p>
        </div> 
        <div class="menu-prices">
            <?php wp_nav_menu(array('theme_location'=>'menu_prices','container'=>false)); ?>
        </div>
        <div class="grid-prices">  
        <?php 
            for($i=0;$i<=17;$i++) {
                $table_price = 'table_prices_copy' . $i;
                if (have_rows($table_price)): ?>
                    <div class="grid-price-table">
                    <?php while (have_rows($table_price)) : the_row();?>
                        <?php if (get_sub_field('head_price_item')) : ?>
                            <div class="grid-price-title"><?php the_sub_field('name_price_item');?></div>
                            <div class="grid-price-lines">
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
        <div class="center-text-banner">
            <a href="#callback" class="btn-gold open-js">Заказать услугу</a>
        </div>
    </div>
</section>
<?php
get_footer();
