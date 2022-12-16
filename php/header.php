<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="<?php esc_html(bloginfo( 'charset' )); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Raleway:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <title><?php wp_title();?></title>
    <?php wp_head(); ?>
</head>

<body>
    <header class="header">
    <div class="bg_blue bg_mobile_white">
        <div class="container">
            
            <div class="header__top">
                <i class="icon-hamb mobile-none hamburger"></i>
                <div class="header__top__city">
                    <i class="icon-location"></i>
                    Москва
                </div>
                <span class="header__top__divider"></span>
                <nav class="header__top__menu">
                    <ul>
                        <li><a href="#">О компании</a></li>
                        <li><a href="/новости/">Новости</a></li>
                    </ul>
                </nav>
                <div class="header__main__search mobile-none">
                    <input type="checkbox" name="search-button" id="search-button-mobile">
                    <label for="search-button-mobile"></label>
                    <form class="header__main__search__form">
                        <input type="text" name="search" placeholder="Поиск">
                        <button type="submit"></button>
                    </form>
                    <a href="/" class="header__top__logo mobile-none">
                        <picture>
                            <source srcset="<?= get_template_directory_uri(); ?>/img/logo/header.webp" type="image/webp">
                            <img loading="lazy" src="<?= get_template_directory_uri(); ?>/img/logo/header.jpg" alt="VECOMP">
                        </picture>
                    </a>
                </div>
                <div class="header__top__tel">
                    <a href="tel:+74994290803">
                        <i class="icon-phone"></i>
                        <span>+7 (499) 429-0803</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="bg_white">
        <div class="container">
            <div class="header__main">
                <a href="/" class="header__main__logo">
                    <picture>
                        <source srcset="<?= get_template_directory_uri(); ?>/img/logo/header.webp" type="image/webp">
                        <img loading="lazy" src="<?= get_template_directory_uri(); ?>/img/logo/header.jpg" alt="VECOMP">
                    </picture>
                </a>
                <nav class="header__main__menu">
                    <ul>
                    <?php
                        wp_nav_menu( array(
                            'menu'            => 'top', 
                            'container'       => '',             // (string) id самого меню (ul тега)
                            'echo'            => true,            // (boolean) Выводить на экран или возвращать для обработки
                            'fallback_cb'     => 'wp_page_menu',
                            'items_wrap' => '%3$s',
                            'walker' => new woocommerce_menu_with_thumbnails_walker(),
                        ) ); 
                    ?>
                    </ul>
                    <div class="header__main__search">
                        <input type="checkbox" name="search-button" id="search-button">
                        <label for="search-button"></label>
                        <form class="header__main__search__form">
                            <input type="text" name="search" placeholder="Поиск">
                            <button type="submit"></button>
                        </form>
                    </div>

                </nav>
                <div class="header__main__tel">
                    <a href="tel:+74994290803">
                        <i class="icon-phone"></i>
                        <span>+7 (499) 429-0803</span>
                    </a>
                </div>
                <a class="button button_yellow button_margin-left">
                    Получить консультацию
                    <i class="icon-up"></i>
                </a>
            </div>
        </div>
    </div>
</header>
<main>