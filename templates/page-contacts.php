<?php
	/* Template Name: Шаблон страницы Контакты */
get_header();
 
// Получаем общие данные для Schema.org
$schema_company_name = get_field('schema_company_name') ?: 'Дядя Мебель';
$schema_company_logo = get_field('schema_company_logo') ?: '/assets/img/logotype.svg';
$schema_company_description = get_field('schema_company_description') ?: 'Профессиональная перетяжка и ремонт мебели в России. Реставрация мягкой и корпусной мебели, замена обивки, ремонт каркаса. Опытные мастера, качественные материалы, доступные цены.';
$schema_price_range = get_field('schema_price_range') ?: 'от 1500₽';

// Получаем данные рейтинга
$schema_enable_rating = get_field('schema_enable_rating');
$schema_rating_value = get_field('schema_rating_value') ?: 5;
$schema_rating_count = get_field('schema_rating_count') ?: 45;

// Получаем данные локаций для Schema.org
$schema_locations = get_field('schema_locations_data') ?: [];

// Получаем ссылки на социальные сети для sameAs
$social_links = [];
if (get_field('telegram_link_header', 'option')) {
    $social_links[] = get_field('telegram_link_header', 'option');
}
if (get_field('whatsapp_link_header', 'option')) {
    $social_links[] = get_field('whatsapp_link_header', 'option');
}
if (get_field('vk_link_header', 'option')) {
    $social_links[] = get_field('vk_link_header', 'option');
}
if (get_field('ok_link_header', 'option')) {
    $social_links[] = get_field('ok_link_header', 'option');
}
?>  
 
<section class="min-section conts-page">
    <div class="content">
        <div class="title-section">
        <?php while (have_posts()) : the_post(); ?>
            <div class="center-descrip">
                <h1 class="page-title"><?php the_title(); ?></h1> 
            </div>
            <?php the_content(); ?> 
		<?php endwhile; ?>  
        </div>   
        <div class="address-block">
            <?php 
                $adresses = get_field('adress_contacts');
                $adr_count = count($adresses);
                $i = 0;
                while ($i < $adr_count) : 
                    // Получаем Schema.org данные для текущей локации
                    $schema_location = isset($schema_locations[$i]) ? $schema_locations[$i] : [];
                    $latitude = isset($schema_location['latitude']) ? $schema_location['latitude'] : '';
                    $longitude = isset($schema_location['longitude']) ? $schema_location['longitude'] : '';
                    $opening_hours = isset($schema_location['opening_hours']) ? $schema_location['opening_hours'] : 'Mo-Fr 09:00-18:00';
                    $location_url = isset($schema_location['location_url']) && !empty($schema_location['location_url']) 
                        ? home_url($schema_location['location_url']) 
                        : get_permalink();
                ?>
                    <div class="address-item">
                        <!-- Видимый контент без микроразметки (чтобы избежать дублирования) -->
                        <div class="heading-tertiary"><?php echo $adresses[$i]['town'];?></div>
                        <p><?php echo $adresses[$i]['adres'] ?></p>
                        <a href="#map<?php echo $i ?>" class="map-js">Смотреть на карте</a>
                    </div>  
            <?php $i++;endwhile; ?>
            </div>
        </div>

        <div class="center-socies">
            <div class="heading-tertiary"><?php the_field('title_center_conts');?></div>
            <p><?php the_field('text_center_conts');?></p>
            <div class="socies-links goriz">
                <a href="tel:<?php the_field('phone_link_header', 'option'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/phone-icon.png" alt=""></a>
                <?php if (get_field('telegram_link_header','option')) : ?><a href="<?php the_field('telegram_link_header','option');?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/teleg-icon.png" alt=""></a><?php endif; ?>
                <?php if (get_field('whatsapp_link_header','option')) : ?><a href="<?php the_field('whatsapp_link_header','option');?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/wts-icon.png" alt=""></a><?php endif; ?>
                <?php if (get_field('vk_link_header','option')) : ?><a href="<?php the_field('vk_link_header','option');?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/vk-icon.png" alt=""></a><?php endif; ?>
                <?php if (get_field('ok_link_header','option')) : ?><a href="<?php the_field('ok_link_header','option');?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/ok-icon.png" alt=""></a><?php endif; ?>
            </div>
        </div>
    </div> 

    <div class="maps-section">
    <?php
        $i = 0;
        while ($i < $adr_count) : 
            // Получаем Schema.org данные для текущей локации в карте
            $schema_location = isset($schema_locations[$i]) ? $schema_locations[$i] : [];
            $latitude = isset($schema_location['latitude']) ? $schema_location['latitude'] : '';
            $longitude = isset($schema_location['longitude']) ? $schema_location['longitude'] : '';
            $opening_hours = isset($schema_location['opening_hours']) ? $schema_location['opening_hours'] : 'Mo-Fr 09:00-18:00';
            $location_url = isset($schema_location['location_url']) && !empty($schema_location['location_url']) 
                ? home_url($schema_location['location_url']) 
                : get_permalink();
        ?>
            <div class="map-block-wrapper" id="map<?php echo $i;?>" itemscope itemtype="https://schema.org/LocalBusiness">
                <!-- Скрытые мета-данные для Schema.org -->
                <meta itemprop="name" content="<?php echo esc_attr($schema_company_name); ?>">
                <meta itemprop="description" content="<?php echo esc_attr($schema_company_description); ?>">
                <meta itemprop="priceRange" content="<?php echo esc_attr($schema_price_range); ?>">
                <meta itemprop="telephone" content="<?php echo esc_attr($adresses[$i]['telefon']); ?>">
                <?php if (!empty($adresses[$i]['email'])) : ?>
                <meta itemprop="email" content="<?php echo esc_attr($adresses[$i]['email']); ?>">
                <?php endif; ?>
                <link itemprop="url" href="<?php echo esc_url($location_url); ?>">
                <link itemprop="image" href="<?php echo esc_url(home_url($schema_company_logo)); ?>">
                
                <?php if ($latitude && $longitude) : ?>
                <div itemprop="geo" itemscope itemtype="https://schema.org/GeoCoordinates">
                    <meta itemprop="latitude" content="<?php echo esc_attr($latitude); ?>">
                    <meta itemprop="longitude" content="<?php echo esc_attr($longitude); ?>">
                </div>
                <?php endif; ?>
                
                <?php if (!empty($opening_hours)) : ?>
                    <?php 
                    // Разбиваем часы работы по запятой, если указано несколько периодов
                    $hours_array = array_map('trim', explode(',', $opening_hours));
                    foreach ($hours_array as $hours) : ?>
                        <meta itemprop="openingHours" content="<?php echo esc_attr($hours); ?>">
                    <?php endforeach; ?>
                <?php endif; ?>
                
                <?php foreach ($social_links as $social_link) : ?>
                    <link itemprop="sameAs" href="<?php echo esc_url($social_link); ?>">
                <?php endforeach; ?>
                
                <?php if ($schema_enable_rating) : ?>
                <!-- Рейтинг компании -->
                <div itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
                    <meta itemprop="ratingValue" content="<?php echo esc_attr($schema_rating_value); ?>">
                    <meta itemprop="bestRating" content="5">
                    <meta itemprop="ratingCount" content="<?php echo esc_attr($schema_rating_count); ?>">
                </div>
                <?php endif; ?>
                
            <div class="map-block">
                <div class="content">
                    <div class="map-addr">
                        <div class="heading-tertiary">Контакты</div>
                        <div itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                            <p>
                                г. <span itemprop="addressLocality"><?php echo $adresses[$i]['town']; ?></span>, 
                                <span itemprop="streetAddress"><?php echo $adresses[$i]['adres']; ?></span>
                            </p>
                        </div>
                        <p><a href="tel:<?php echo $adresses[$i]['telefon'];?>" itemprop="telephone"><?php echo $adresses[$i]['telefon'];?></a></p>
                        <p><?php echo $adresses[$i]['time_work'];?></p>
                        <?php if (!empty($adresses[$i]['email'])) : ?>
                        <p>E-mail: <a href="mailto:<?php echo $adresses[$i]['email'];?>" itemprop="email"><?php echo $adresses[$i]['email'];?></a></p>
                        <?php endif; ?>
                        <a href="#callback" class="btn-gold open-js">ОСТАВИТЬ ЗАЯВКУ</a>
                    </div>
                </div>
                <?php echo $adresses[$i]['map-iframe'];?>  
            </div>
        </div>
    <?php $i++;endwhile; ?>
    </div>
</section>
<?php
get_footer(); 
