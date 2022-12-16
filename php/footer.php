</main>
    <footer class="footer">
    <div class="container">
        <div class="footer__top">
            <div class="row">
                <div class="col-md-8">
                    <div class="footer__top__form">
                        <h3 class="title title_white">Форма обратной связи</h3>
                            <?php echo do_shortcode('[contact-form-7 id="2509" title="Подвал сайта"]'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer__top__right">
                        <div class="footer__top__contacts">
                            <ul>
                                <li><a href="tel:+74994290803">+7 (499) 429-0803</a></li>
                                <li><a href="tel:++74955142958">+7 (495) 514-2958</a></li>
                                <li><a href="tel:+74956446718">+7 (495) 644-6718</a></li>
                                <li><a href="tel:+74957677908">+7 (495) 767-7908</a></li>
                            </ul>
                        </div>
                        <div class="footer__top__contacts">
                            <a href="mailto:vicomp@vicomp.ru">vicomp@vicomp.ru</a>
                        </div>
                        <div class="footer__top__contacts">
                        <p>г. Москва, ул. Космонавта Волкова 20 оф. 229</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 order-2 order-lg-1">
                    <div class="footer__bottom__img">
                        <picture>
                            <source srcset="<?= get_template_directory_uri(); ?>/img/logo/header.webp" type="image/webp">
                            <img loading="lazy" src="<?= get_template_directory_uri(); ?>/img/logo/header.jpg" alt="VECOMP">
                        </picture>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 order-1 order-lg-2">
                    <div class="footer__bottom__menu">
                        <?php
                        wp_nav_menu( array(
                            'menu'            => 'bottom', 
                            'container'       => '',             // (string) id самого меню (ul тега)
                            'echo'            => true,            // (boolean) Выводить на экран или возвращать для обработки
                            'fallback_cb'     => 'wp_page_menu'
                        ) ); 
                        ?>
                    </div>
                </div>
                <div class="col-lg-4 order-3 order-lg-3">
                    <div class="footer__bottom__copyright">
                        <p>© 2022 - Vecomp</p>
                        <p><a href="#">Политика конфиденциальности</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <?php wp_footer(); ?>
</body>

</html>