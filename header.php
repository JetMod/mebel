<!DOCTYPE html>
 <html <?php language_attributes(); ?> prefix="og: http://ogp.me/ns# article: http://ogp.me/ns/article#">
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
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12), 0 2px 8px rgba(0, 0, 0, 0.08);
            z-index: 10000;
            min-width: 320px;
            padding: 15px 0;
            border-radius: 4px;
        }

        .services-dropdown-content {
            display: flex;
            flex-direction: column;
            gap: 2px;
            position: relative;
            z-index: 10000;
        }

        /* Show dropdown on hover - simple like WordPress default */
        @media (min-width: 1025px) {
            .menu-item-has-services:hover > .services-dropdown-menu {
                display: block;
            }
        }

        .services-dropdown-item {
            position: relative;
            margin-bottom: 2px;
        }

        .services-dropdown-item:last-child {
            margin-bottom: 0;
        }

        .services-main-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 25px;
            color: #333;
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            border-left: 3px solid transparent;
            position: relative;
        }

        /* Hover effect only on desktop */
        @media (min-width: 1025px) {
            .services-main-link:hover {
                background: #f5f5f5;
                color: #d4af37;
                border-left-color: #d4af37;
            }
        }

        .services-submenu {
            display: none;
            position: absolute;
            left: 100%;
            top: 0;
            background: #fff;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.12);
            min-width: 300px;
            padding: 15px 0;
            border-radius: 4px;
        }

        .services-dropdown-item.has-submenu {
            position: relative;
        }

        /* Show submenu on hover - desktop only */
        @media (min-width: 1025px) {
            .services-dropdown-item.has-submenu:hover .services-submenu {
                display: block;
            }
        }

        .services-submenu a {
            display: block;
            padding: 12px 25px;
            color: #555;
            text-decoration: none;
            font-size: 14px;
            font-weight: 400;
            border-left: 3px solid transparent;
        }

        /* Hover effect only on desktop */
        @media (min-width: 1025px) {
            .services-submenu a:hover {
                background: #f5f5f5;
                color: #d4af37;
                border-left-color: #d4af37;
            }
        }

        /* Menu arrow icon for submenu items */
        .menu-arrow-icon {
            display: inline-block;
            margin-left: 10px;
            font-size: 18px;
            color: #bbb;
            font-weight: 300;
            line-height: 1;
        }

        /* Menu item with dropdown */
        .menu-links li.menu-item-has-services {
            position: relative;
        }

        /* Icon for main menu item "УСЛУГИ" */
        @media (min-width: 1025px) {
            .menu-links li.menu-item-has-services > a {
                position: relative;
                padding-right: 18px;
                cursor: default;
            }

            .menu-links li.menu-item-has-services > a::after {
                content: '';
                position: absolute;
                right: 0;
                top: 50%;
                transform: translateY(-50%);
                width: 0;
                height: 0;
                border-left: 4px solid transparent;
                border-right: 4px solid transparent;
                border-top: 5px solid #666;
            }

            .menu-links li.menu-item-has-services:hover > a {
                color: #d4af37;
            }

            .menu-links li.menu-item-has-services:hover > a::after {
                border-top-color: #d4af37;
            }
        } 

        @media (max-width: 1024px) { 
            /* Hide desktop dropdown on mobile */
            .menu-center .services-dropdown-menu {
                display: none !important;
            }

            /* Disable all hover and active effects on mobile */
            .services-dropdown-menu *:hover,
            .services-dropdown-menu *:active,
            .services-main-link:hover,
            .services-main-link:active,
            .services-submenu a:hover,
            .services-submenu a:active,
            .mobile-menu .services-main-link:hover,
            .mobile-menu .services-main-link:active,
            .mobile-menu .services-submenu a:hover,
            .mobile-menu .services-submenu a:active,
            .mobile-menu .services-dropdown-item:hover,
            .mobile-menu .services-dropdown-item:active {
                background: none !important;
                color: inherit !important;
                border-left-color: transparent !important;
                opacity: 1 !important;
                transform: none !important;
            }

            /* Disable hover on touch devices */
            @media (hover: none) and (pointer: coarse) {
                .services-dropdown-menu *:hover,
                .services-dropdown-menu *:active {
                    background: none !important;
                    color: inherit !important;
                }
            }
            
            /* Remove iOS tap effects */
            .mobile-menu .services-dropdown-menu,
            .mobile-menu .services-dropdown-item,
            .mobile-menu .services-main-link,
            .mobile-menu .services-submenu,
            .mobile-menu .services-submenu a,
            .mobile-menu .menu-arrow-icon {
                -webkit-tap-highlight-color: transparent !important;
                -webkit-touch-callout: none;
                -webkit-user-select: none;
                user-select: none;
                transition: none !important;
            }
            
            /* Specifically disable hover effects for services items */
            .mobile-menu .services-main-link,
            .mobile-menu .services-submenu a {
                pointer-events: auto;
            }
            
            .mobile-menu .services-main-link:hover,
            .mobile-menu .services-main-link:focus,
            .mobile-menu .services-main-link:active {
                background: transparent !important;
                color: #fff !important;
            }
            
            .mobile-menu .services-submenu a:hover,
            .mobile-menu .services-submenu a:focus,
            .mobile-menu .services-submenu a:active {
                background: transparent !important;
                color: rgba(255, 255, 255, 0.85) !important;
            }

            /* Mobile menu item "УСЛУГИ" styling */
            .mobile-menu .menu-item-has-services-mobile > a {
                position: relative;
                padding-right: 30px;
                -webkit-tap-highlight-color: transparent;
            }

            .mobile-menu .menu-item-has-services-mobile > a::after {
                content: '▼';
                position: absolute;
                right: 10px;
                top: 50%;
                transform: translateY(-50%);
                font-size: 10px;
                color: rgba(255, 255, 255, 0.5);
            }

            .mobile-menu .menu-item-has-services-mobile.active > a::after {
                transform: translateY(-50%) rotate(180deg);
            }

            .mobile-menu .services-dropdown-menu.mobile-services {
                display: none;
                position: static;
                padding: 10px 0 10px 20px;
                background: rgba(255, 255, 255, 0.05);
            }

            .mobile-menu .services-dropdown-item {
                margin-bottom: 0;
            }

            .mobile-menu .services-main-link {
                padding: 12px 15px;
                font-size: 14px;
                color: #fff;
                -webkit-tap-highlight-color: transparent;
            }

            .mobile-menu .services-dropdown-item.has-submenu.active > .services-main-link {
                color: #d4af37;
            }

            .mobile-menu .services-submenu {
                display: none;
                position: static;
                padding: 5px 0 5px 20px;
                background: rgba(0, 0, 0, 0.2);
                box-shadow: none;
                min-width: auto;
            }

            .mobile-menu .services-submenu a {
                display: block;
                padding: 10px 15px;
                font-size: 13px;
                color: rgba(255, 255, 255, 0.85);
                -webkit-tap-highlight-color: transparent;
            }

            .mobile-menu .menu-arrow-icon {
                color: rgba(255, 255, 255, 0.5);
            }

            .mobile-menu .services-dropdown-item.has-submenu.active .menu-arrow-icon {
                transform: rotate(90deg);
                color: #d4af37;
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
                            <p><?php bloginfo('description');?></p>
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
                                'walker' => new Mebel_Custom_Walker()
                            ) ); ?>
                        </div>
                        <p class="time-work"><?php if (get_field('time_header', 'option')) the_field('time_header', 'option'); ?></p>
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
                                    'walker' => new Mebel_Mobile_Walker()
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

        <script>
            jQuery(function($) {
                $(document).ready(function() {
                    // Mobile: Toggle main services menu
                    $(document).on('click', '.mobile-menu .menu-item-has-services-mobile > a', function(e) {
                        if ($(window).width() > 1024) return;
                        
                        e.preventDefault();
                        e.stopPropagation();
                        
                        var $parent = $(this).parent();
                        var $dropdown = $parent.find('> .services-dropdown-menu');   
                        
                        if ($dropdown.length) {
                            $dropdown.slideToggle(200);
                            $parent.toggleClass('active');
                        }
                        
                        return false;
                    });

                    // Mobile: Toggle submenu items with has-submenu class
                    $(document).on('click', '.mobile-menu .services-dropdown-item.has-submenu > .services-main-link', function(e) {
                        if ($(window).width() > 1024) return;
                        
                        e.preventDefault();
                        e.stopPropagation();
                        
                        var $parent = $(this).parent();
                        var $submenu = $parent.find('> .services-submenu');
                        
                        if ($submenu.length) {
                            // Close other submenus
                            $('.mobile-menu .services-submenu').not($submenu).slideUp(200);
                            $('.mobile-menu .services-dropdown-item').not($parent).removeClass('active');
                            
                            // Toggle current
                            $submenu.slideToggle(200);
                            $parent.toggleClass('active');
                        }
                        
                        return false;
                    });

                    // Allow navigation for links inside submenu
                    $(document).on('click', '.mobile-menu .services-submenu a', function(e) {
                        e.stopPropagation();
                        // Allow default behavior (navigation)
                    });
                });

                <?php if (is_front_page()) : ?>
                $('.menu-center .menu-links a').on('click',function(e){
                    let url = $(this).attr('href');
                    if (url && url.indexOf('#') != -1) {
                        e.preventDefault();
                        let hash = url.slice(url.indexOf('#'));
                        $('body, html').stop().animate({scrollTop:$(hash).offset().top - 50},600);
                    }
                });

                $('.mobile-menu .menu-links a:not(.services-main-link)').on('click',function(e){
                    let url = $(this).attr('href');
                    if (url && url.indexOf('#') != -1 && !$(this).closest('.services-dropdown-menu').length) {
                        e.preventDefault();
                        let hash = url.slice(url.indexOf('#'));
                        $('body, html').stop().animate({scrollTop:$(hash).offset().top - 50},600);
                        $('.mobile-menu-wrap').fadeOut(300);
                    }
                });
                <?php endif; ?> 
            })
        </script> 

		<?php if (is_front_page()) :?>

        <div class="main-screen"> 
            <div class="content">
                <div class="main-screen-text">
                    <h1><?php the_field('title_header', 'option');?></h1>
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
  
        <?php else: ?>
 
            <div class="min-main-screen">
            <div class="content">
                <div class="min-main-screen-text"> 
                    <p><?php the_field('title_header', 'option');?></p>
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