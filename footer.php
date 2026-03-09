<footer class="main-footer">
            <div class="content padd86">
                <?php 
                    if ( is_active_sidebar( 'footer-menu' )) :?>
                    <div class="main-footer-top">
                        <?php dynamic_sidebar( 'footer-menu' ); ?>
                    </div>
                <?php endif; ?>
                
                <div class="main-footer-center" id="conts">
                    <div class="info-item">
                        <div class="info-line">
                            <div class="info-icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/grey-location.svg" alt="">
                            </div>
                            <div class="info-text">
                                <div class="heading-small">Адрес</div>
                            </div>
                        </div>
                        <div class="info-line">
                            <div class="info-icon"></div>
                            <div class="info-text">
                                <p><?php the_field('address_footer','option');?></p>
                            </div>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-line">
                            <div class="info-icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/grey-time.svg" alt="">
                            </div>
                            <div class="info-text">
                                <div class="heading-small">График работы:</div>
                            </div>
                        </div>
                        <div class="info-line">
                            <div class="info-icon"></div>
                            <div class="info-text">
                                <p><?php the_field('grafic_footer','option');?></p>
                            </div>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-line">
                            <div class="info-icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/grey-phone.svg" alt="">
                            </div>
                            <div class="info-text">
                                <a href="tel:<?php the_field('phone_link_header', 'option'); ?>"><?php the_field('phone_label_header','option'); ?></a>
                            </div>
                        </div>
                        <div class="info-line">
                            <div class="info-icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/grey-letter.svg" alt="">
                            </div>
                            <div class="info-text">
                                <a href="mailto:<?php the_field('email_footer','option');?>"><?php the_field('email_footer','option');?></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="main-footer-bottom">
                    <a href="#" class="link-to-top"></a>    
                    <div class="footer-code">
                        <img src="<?php the_field('qr-code_footer','option');?>" alt="">
                    </div>
                    <div class="copyrights">
                    <?php the_field('copyrights_footer','option');?>
                    </div>
                    <div class="rekvis">
                    <?php if(get_field('inn_footer','option')):?><p>ИНН: <span><?php the_field('inn_footer','option');?></span></p><?php endif; ?>
                    <?php if(get_field('ogrn_footer','option')):?><p>ОГРН: <span><?php the_field('ogrn_footer','option');?></span></p><?php endif; ?>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    

    <div class="pop-up pop-min pop-styles" id="callback">
        <div class="contact-form">
            <h2 class="heading-form"><?php the_field('title_main_form','option'); ?></h2>
            <?php echo do_shortcode(get_field('main_form','option')); ?>
        </div>
    </div>

    <div class="pop-up pop-min center-txt" id="pop-success">
        <h2 class="heading-form">Заявка успешно отправлена</h2>
        <p>Наш менеджер свяжется с вами в ближайшее время.</p>
    </div>

    <!-- Cookie Popup -->
    <div class="cookie-popup" id="cookie-popup">
        <div class="cookie-popup-content">
            <button class="cookie-popup-close" id="cookie-close">&times;</button>
            <p class="cookie-popup-text">Мы используем файлы cookie и другие технологии, чтобы вам было удобнее пользоваться сайтом. Если вы не согласны с использованием файлов cookie, покиньте сайт.</p>
            <button class="cookie-popup-button" id="cookie-accept">Согласен</button>
        </div>
    </div>

    <style>
        .cookie-popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 99999;
            align-items: center;
            justify-content: center;
        }

        .cookie-popup.active {
            display: flex;
        }

        .cookie-popup-content {
            position: relative;
            background-color: #fff;
            padding: 30px 40px;
            max-width: 600px;
            width: 90%;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .cookie-popup-close {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            font-size: 28px;
            color: #666;
            cursor: pointer;
            line-height: 1;
            padding: 0;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: color 0.3s;
        }

        .cookie-popup-close:hover {
            color: #000;
        }

        .cookie-popup-text {
            margin: 0 0 20px 0;
            font-size: 16px;
            line-height: 1.5;
            color: #333;
            padding-right: 30px;
        }

        .cookie-popup-button {
            background-color: #d4af37;
            color: #fff;
            border: none;
            padding: 12px 30px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-family: inherit;
        }

        .cookie-popup-button:hover {
            background-color: #b8941f;
        }

        body.cookie-popup-open {
            overflow: hidden;
            position: fixed;
            width: 100%;
        }

        @media (max-width: 768px) {
            .cookie-popup-content {
                padding: 25px 30px;
                max-width: 95%;
            }

            .cookie-popup-text {
                font-size: 14px;
                padding-right: 25px;
            }

            .cookie-popup-button {
                width: 100%;
                padding: 14px 30px;
            }
        }
    </style>

    <script>
        (function() {
            function getCookie(name) {
                var nameEQ = name + "=";
                var ca = document.cookie.split(';');
                for(var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
                }
                return null;
            }

            function setCookie(name, value, days) {
                var expires = "";
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                    expires = "; expires=" + date.toUTCString();
                }
                document.cookie = name + "=" + (value || "") + expires + "; path=/";
            }

            var scrollPosition = 0;

            function showCookiePopup() {
                var popup = document.getElementById('cookie-popup');
                if (popup) {
                    scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
                    document.body.style.top = '-' + scrollPosition + 'px';
                    document.body.classList.add('cookie-popup-open');
                    popup.classList.add('active');
                }
            }

            function hideCookiePopup() {
                var popup = document.getElementById('cookie-popup');
                if (popup) {
                    popup.classList.remove('active');
                    document.body.classList.remove('cookie-popup-open');
                    document.body.style.top = '';
                    window.scrollTo(0, scrollPosition);
                }
                setCookie('cookie_consent', 'accepted', 365);
            }

            document.addEventListener('DOMContentLoaded', function() {
                var cookieConsent = getCookie('cookie_consent');
                
                if (!cookieConsent) {
                    setTimeout(function() {
                        showCookiePopup();
                    }, 500);
                }

                var acceptButton = document.getElementById('cookie-accept');
                var closeButton = document.getElementById('cookie-close');

                if (acceptButton) {
                    acceptButton.addEventListener('click', hideCookiePopup);
                }

                if (closeButton) {
                    closeButton.addEventListener('click', hideCookiePopup);
                }
            });
        })();
    </script>
    
<?php wp_footer(); ?>
</body>
</html>	  