<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/svg+xml" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon.svg">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/apple-touch-icon.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/favicon/site.webmanifest">
    <style>.wpcf7-not-valid-tip{font-size: 12px!important;padding-left: 20px;}.wpcf7-list-item{margin: 0!important;}.wpcf7-response-output{position:absolute !important;color: #fff;margin-left: 0!important; font-size: 15px;border: 0 !important;background:#fff;color: #000;z-index:20;padding: 10px;display: none !important}.wpcf7-spinner{display: none!important;}</style>
    
    <style>
        /* Services Dropdown Menu Styles */
        .services-dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: #fff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            z-index: 10000;
            min-width: 300px;
            padding: 20px 0;
            margin-top: 0;
            padding-top: 10px;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.2s, visibility 0.2s;
        }

        /* Create invisible bridge at the top of dropdown menu to prevent gap */
        .services-dropdown-menu::before {
            content: '';
            position: absolute;
            top: -10px;
            left: 0;
            width: 100%;
            height: 10px;
            background: transparent;
        }

        .services-dropdown-menu.active {
            display: block;
            opacity: 1;
            visibility: visible;
        }

        .services-dropdown-content {
            display: flex;
            flex-direction: column;
        }

        .services-dropdown-item {
            position: relative;
        }


        .services-main-link {
            display: block;
            padding: 12px 25px;
            color: #333;
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            transition: background-color 0.3s, color 0.3s;
            border-left: 3px solid transparent;
        }

        .services-main-link:hover {
            background-color: #f5f5f5;
            color: #d4af37;
            border-left-color: #d4af37;
        }

        .services-submenu {
            display: none;
            position: absolute;
            left: 100%;
            top: 0;
            background: #fff;
            box-shadow: 2px 4px 20px rgba(0, 0, 0, 0.15);
            min-width: 280px;
            padding: 15px 0;
            margin-left: 10px;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s, visibility 0.3s;
            z-index: 10001;
        }

        .services-dropdown-item.has-submenu {
            position: relative;
        }

        .services-dropdown-item.has-submenu:hover .services-submenu {
            display: block;
            opacity: 1;
            visibility: visible;
        }

        /* Prevent submenu from closing when moving mouse to it */
        .services-dropdown-item.has-submenu .services-main-link {
            position: relative;
        }

        /* Add a small gap between main menu and submenu for easier navigation */
        .services-dropdown-item.has-submenu::after {
            content: '';
            position: absolute;
            right: -5px;
            top: 0;
            width: 10px;
            height: 100%;
            z-index: 10000;
        }

        .services-submenu a {
            display: block;
            padding: 10px 25px;
            color: #666;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s, color 0.3s;
            border-left: 3px solid transparent;
        }

        .services-submenu a:hover {
            background-color: #f5f5f5;
            color: #d4af37;
            border-left-color: #d4af37;
        }

        /* Menu item with dropdown */
        .menu-links li.menu-item-has-services {
            position: relative;
        }

        .menu-links li.menu-item-has-services:hover .services-dropdown-menu,
        .services-dropdown-menu:hover,
        .services-dropdown-menu.active {
            display: block;
            opacity: 1;
            visibility: visible;
        }

        @media (max-width: 1024px) {
            .services-dropdown-menu {
                position: static;
                box-shadow: none;
                margin-top: 0;
                padding: 10px 0;
                display: none !important;
            }

            .services-submenu {
                position: static;
                box-shadow: none;
                margin-left: 0;
                padding-left: 20px;
            }

            /* Show dropdown in mobile menu */
            .mobile-menu .services-dropdown-menu {
                display: block !important;
                position: static;
                opacity: 1;
                visibility: visible;
            }
        }
    </style>

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<div class="wrapper">
        <header class="header">
            <div class="header-top content">
                <div class="header-menu">
                    <div class="logotype-block">
                        <a href="<?php echo home_url('/');?>" class="logo-img">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logotype.svg" alt="">
                        </a>
                        <a href="<?php echo home_url('/'); ?>" class="logo-text">
                            <h1><?php bloginfo('description');?></h1>
                        </a>
                        <div class="cities-dropdown desk">
                            <div class="city-current">
                                <span class="active"><?php the_field('current_city', 'option'); ?></span>
                                <span class="drop-icon"></span>
                            </div>
                            <?php if (have_rows('city_links', 'option')) :?>
                            <div class="cities-all">
                                <?php while (have_rows('city_links', 'option')) : the_row() ; ?>
                                <a href="<?php the_sub_field('city_address'); ?>"><?php the_sub_field('city_name'); ?></a>
                                <?php endwhile; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="menu-center">
                        <div class="menu-links">
                            <?php wp_nav_menu( array(
                                'theme_location' => 'menu_header',
                                'container' => false,
                            ) ); ?>
                        </div>
                        <p class="time-work"><?php if (get_field('time_header', 'option')) the_field('time_header', 'option'); ?></p>
                    </div>
                    
                    <!-- Services Dropdown Menu -->
                    <div class="services-dropdown-menu" id="services-dropdown">
                        <div class="services-dropdown-content">
                            <div class="services-dropdown-item has-submenu">
                                <a href="<?php echo get_permalink(ID_PERETYAZHKA); ?>" class="services-main-link">ПЕРЕТЯЖКА МЯГКОЙ МЕБЕЛИ</a>
                                <div class="services-submenu">
                                    <a href="<?php echo get_permalink(ID_PERETYAZHKA); ?>#divany">Перетяжка диванов</a>
                                    <a href="<?php echo get_permalink(ID_PERETYAZHKA); ?>#krovati">Перетяжка кровати</a>
                                    <a href="<?php echo get_permalink(ID_PERETYAZHKA); ?>#kresla">Перетяжка кресел</a>
                                    <a href="<?php echo get_permalink(ID_PERETYAZHKA); ?>#stulya">Перетяжка стульев</a>
                                    <a href="<?php echo get_permalink(ID_PERETYAZHKA); ?>#pufy">Перетяжка пуфа и банкетки</a>
                                    <a href="<?php echo get_permalink(ID_PERETYAZHKA); ?>#kozha">Перетяжка кожаной мебели</a>
                                    <a href="<?php echo get_permalink(ID_PERETYAZHKA); ?>#ofis">Перетяжка офисной мебели</a>
                                </div>
                            </div>
                            <?php 
                            $page_caret = get_page_by_path('karetnaya-styazhka');
                            $page_restavr = get_page_by_path('restavraciya-mebeli');
                            $page_destroy = get_page_by_path('razborka-i-utilizaciya-mebeli');
                            $page_movement = get_page_by_path('perevozka-mebeli');
                            $page_order = get_page_by_path('izgotovlenie-mebeli-pod-zakaz');
                            ?>
                            <div class="services-dropdown-item">
                                <a href="<?php echo $page_caret ? get_permalink($page_caret->ID) : '#'; ?>" class="services-main-link">КАРЕТНАЯ СТЯЖКА</a>
                            </div>
                            <div class="services-dropdown-item">
                                <a href="<?php echo $page_restavr ? get_permalink($page_restavr->ID) : get_permalink(ID_PAGE_RESTAVRAT); ?>" class="services-main-link">РЕСТАВРАЦИЯ МЕБЕЛИ</a>
                            </div>
                            <div class="services-dropdown-item has-submenu">
                                <a href="<?php echo get_permalink(ID_REMONT); ?>" class="services-main-link">РЕМОНТ МЯГКОЙ МЕБЕЛИ</a>
                                <div class="services-submenu">
                                    <a href="<?php echo get_permalink(ID_REMONT); ?>#divany">Ремонт диванов</a>
                                    <a href="<?php echo get_permalink(ID_REMONT); ?>#krovati">Ремонт кровати</a>
                                    <a href="<?php echo get_permalink(ID_REMONT); ?>#kresla">Ремонт кресел</a>
                                    <a href="<?php echo get_permalink(ID_REMONT); ?>#stulya">Ремонт стульев</a>
                                </div>
                            </div>
                            <div class="services-dropdown-item">
                                <a href="<?php echo $page_destroy ? get_permalink($page_destroy->ID) : get_permalink(ID_PAGE_DESTROY); ?>" class="services-main-link">РАЗБОРКА И УТИЛИЗАЦИЯ МЕБЕЛИ</a>
                            </div>
                            <div class="services-dropdown-item">
                                <a href="<?php echo $page_movement ? get_permalink($page_movement->ID) : get_permalink(ID_PAGE_MOVEMENT); ?>" class="services-main-link">ПЕРЕВОЗКА МЕБЕЛИ</a>
                            </div>
                            <div class="services-dropdown-item">
                                <a href="<?php echo $page_order ? get_permalink($page_order->ID) : get_permalink(ID_PAGE_MADE); ?>" class="services-main-link">ИЗГОТОВЛЕНИЕ МЕБЕЛИ ПОД ЗАКАЗ</a>
                            </div>
                        </div>
                    </div>  
                    <div class="phone-block">
                        <a href="tel:<?php the_field('phone_link_header', 'option'); ?>" class="black-link"><?php the_field('phone_label_header','option'); ?></a>
                        <a href="#callback" class="gold-link open-js">Обратный звонок</a>
                    </div>
                    <div class="menu-burger"></div>
                </div>
                <div class="mobile-menu-wrap">
                    <div class="mobile-menu">
                        <div class="mobile-menu-inner">
                            <div class="menu-links">
                                <?php wp_nav_menu( array(
                                    'theme_location' => 'menu_header',
                                    'container' => false,
                                ) ); ?>
                            </div> 
                            <div class="cities-dropdown">
                                <div class="city-current">
                                    <span class="active"><?php the_field('current_city', 'option'); ?></span>
                                    <span class="drop-icon"></span>
                                </div>
                                <?php if (have_rows('city_links', 'option')) :?>
                                <div class="cities-all">
                                    <?php while (have_rows('city_links', 'option')) : the_row() ; ?>
                                    <a href="<?php the_sub_field('city_address'); ?>"><?php the_sub_field('city_name'); ?></a>
                                    <?php endwhile; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <a href="tel:<?php the_field('phone_link_header', 'option'); ?>" class="white-link"><?php the_field('phone_label_header','option'); ?></a>
                            <div class="socies-links goriz">
                                <a href="tel:<?php the_field('phone_link_header', 'option'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/phone-icon.png" alt=""></a>
                                <?php if (get_field('telegram_link_header','option')) : ?><a href="<?php the_field('telegram_link_header','option');?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/teleg-icon.png" alt=""></a><?php endif; ?>
                                <?php if (get_field('whatsapp_link_header','option')) : ?><a href="<?php the_field('whatsapp_link_header','option');?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/wts-icon.png" alt=""></a><?php endif; ?>
                                <?php if (get_field('vk_link_header','option')) : ?><a href="<?php the_field('vk_link_header','option');?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/vk-icon.png" alt=""></a><?php endif; ?>
                                <?php if (get_field('ok_link_header','option')) : ?><a href="<?php the_field('ok_link_header','option');?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/ok-icon.png" alt=""></a><?php endif; ?>
                            </div>
                            <a href="#callback" class="gold-link open-js">Обратный звонок</a>
                        </div>
                    </div>
                    <div class="menu-closer"></div>
                    <div class="menu-closer-back"></div>
                </div>
            </div>
        </header>

		<?php if (is_front_page()) :?>

        <div class="main-screen">
            <div class="content">
                <div class="main-screen-text">
                    <h2><?php the_field('title_header', 'option');?></h2>
                    <div class="form-wrapp">
                        <?php $form_header = get_field('forma_header','option');?>
                        <?php echo do_shortcode($form_header);?>
                    </div>
                </div>
            </div>
            <div class="socies-links vertic">
                <a href="tel:<?php the_field('phone_link_header', 'option'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/phone-icon.png" alt=""></a>
                <?php if (get_field('telegram_link_header','option')) : ?><a href="<?php the_field('telegram_link_header','option');?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/teleg-icon.png" alt=""></a><?php endif; ?>
                <?php if (get_field('whatsapp_link_header','option')) : ?><a href="<?php the_field('whatsapp_link_header','option');?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/wts-icon.png" alt=""></a><?php endif; ?>
                <?php if (get_field('vk_link_header','option')) : ?><a href="<?php the_field('vk_link_header','option');?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/vk-icon.png" alt=""></a><?php endif; ?>
                <?php if (get_field('ok_link_header','option')) : ?><a href="<?php the_field('ok_link_header','option');?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/ok-icon.png" alt=""></a><?php endif; ?>
            </div>
            <?php if (have_rows('advants_header','option')) :?>
            <div class="content">
                <div class="advants">
                <?php while (have_rows('advants_header','option')) : the_row(); ?>
                    <div class="advant-item">
                        <div class="adv-icon">
                            <img src="<?php echo get_sub_field('img_advant')['url'] ?>" alt="">
                        </div>
                        <div class="adv-title"><?php the_sub_field('text_advant') ?></div>
                    </div>
                <?php endwhile; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <script>
            jQuery(function($) {
                // Attach services dropdown to "УСЛУГИ" menu item
                function attachServicesDropdown() {
                    var $menuLinks = $('.menu-center .menu-links');
                    var $menuItems = $menuLinks.find('li');
                    var $dropdown = $('#services-dropdown');
                    
                    if (!$dropdown.length) {
                        return;
                    }
                    
                    $menuItems.each(function() {
                        var $menuItem = $(this);
                        var $link = $menuItem.find('a');
                        var linkText = $link.text().toUpperCase().trim();
                        var linkHref = $link.attr('href') || '';
                        
                        // Check if this is the "УСЛУГИ" menu item
                        if (linkText.indexOf('УСЛУГИ') !== -1 || 
                            linkText.indexOf('SERVICES') !== -1 ||
                            linkHref.indexOf('services') !== -1 ||
                            linkHref.indexOf('uslugi') !== -1) {
                            
                            if (!$menuItem.hasClass('menu-item-has-services')) {
                                $menuItem.addClass('menu-item-has-services');
                                
                                // Move dropdown if it's not already there
                                if ($menuItem.find('#services-dropdown').length === 0) {
                                    $menuItem.append($dropdown);
                                }
                            }
                        }
                    });
                }

                // Initialize on page load
                $(document).ready(function() {
                    attachServicesDropdown();
                    
                    // Re-initialize after a short delay to ensure menu is loaded
                    setTimeout(attachServicesDropdown, 200);
                    setTimeout(attachServicesDropdown, 500);

                    // Add hover handlers with delay to prevent menu from closing immediately
                    var hideTimeout;
                    
                    $(document).on('mouseenter', '.menu-item-has-services', function() {
                        clearTimeout(hideTimeout);
                        var $dropdown = $(this).find('#services-dropdown');
                        $dropdown.addClass('active');
                    });

                    $(document).on('mouseleave', '.menu-item-has-services', function() {
                        var $dropdown = $(this).find('#services-dropdown');
                        var $item = $(this);
                        hideTimeout = setTimeout(function() {
                            // Check if mouse is still over dropdown or menu item
                            if (!$dropdown.is(':hover') && !$item.is(':hover')) {
                                $dropdown.removeClass('active');
                            }
                        }, 200);
                    });

                    $(document).on('mouseenter', '#services-dropdown', function() {
                        clearTimeout(hideTimeout);
                        $(this).addClass('active');
                    });

                    $(document).on('mouseleave', '#services-dropdown', function() {
                        var $dropdown = $(this);
                        hideTimeout = setTimeout(function() {
                            $dropdown.removeClass('active');
                        }, 200);
                    });
                });

                $('.menu-center .menu-links a').on('click',function(e){
                    let url = $(this).attr('href');
                    if (url.indexOf('#') != -1) {
                        e.preventDefault();
                        let hash = url.slice(url.indexOf('#'));
                        console.log(hash)
                        $('body, html').stop().animate({scrollTop:$(hash).offset().top - 50},600);
                    }
                });

                $('.mobile-menu .menu-links a').on('click',function(e){
                    let url = $(this).attr('href');
                    if (url.indexOf('#') != -1) {
                        e.preventDefault();
                        let hash = url.slice(url.indexOf('#'));
                        $('body, html').stop().animate({scrollTop:$(hash).offset().top - 50},600);
                        $('.mobile-menu-wrap').fadeOut(300);
                    }
                });
            })
        </script>

        <?php else: ?>
 
            <div class="min-main-screen">
            <div class="content">
                <div class="min-main-screen-text">
                    <h4><?php the_field('title_header', 'option');?></h4>
                    <div class="form-wrapp">
						<?php $form_header = get_field('forma_header','option');?>
						<?php echo do_shortcode($form_header);?>
                    </div>
                </div>
				<?php if (have_rows('advants_header','option')) :?>
                <div class="advants">
					<?php while (have_rows('advants_header','option')) : the_row(); ?>
					<div class="advant-item">
						<div class="adv-icon">
							<img src="<?php echo get_sub_field('img_advant')['url'] ?>" alt="">
						</div>
						<div class="adv-title"><?php the_sub_field('text_advant') ?></div>
					</div>
					<?php endwhile; ?>
                </div>
				<?php endif; ?>
            </div>
            <div class="socies-links vertic">
				<a href="tel:<?php the_field('phone_link_header', 'option'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/phone-icon.png" alt=""></a>
                <?php if (get_field('telegram_link_header','option')) : ?><a href="<?php the_field('telegram_link_header','option');?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/teleg-icon.png" alt=""></a><?php endif; ?>
                <?php if (get_field('whatsapp_link_header','option')) : ?><a href="<?php the_field('whatsapp_link_header','option');?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/wts-icon.png" alt=""></a><?php endif; ?>
                <?php if (get_field('vk_link_header','option')) : ?><a href="<?php the_field('vk_link_header','option');?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/vk-icon.png" alt=""></a><?php endif; ?>
                <?php if (get_field('ok_link_header','option')) : ?><a href="<?php the_field('ok_link_header','option');?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/ok-icon.png" alt=""></a><?php endif; ?>
            </div>
        </div>
 
<?php endif; ?>