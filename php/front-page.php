<?php get_header(); ?>
<div class="container">
    <section class="main-banner">
        <div class="main-banner__content">
            <h1>Продажа лабораторного оборудования</h1>
            <p>Лабораторное и промышленное
                аналитическое оборудование для проведения качественных и количественных испытаний зерна, молочных изделий, табака и других товаров</p>
            <a href="#" class="button button_blue button_margin-right button_long">
                Оставить заявку
                <i class="icon-up"></i>
            </a>
        </div>
        <div class="main-banner__images">
            <div class="main-banner__images__item">
                <picture>
                    <source srcset="<?= get_template_directory_uri(); ?>/img/main-banner/1.webp" type="image/webp">
                    <img loading="lazy" src="<?= get_template_directory_uri(); ?>/img/main-banner/1.jpg" alt="VECOMP">
                </picture>
            </div>
            <div class="main-banner__images__item">
                <picture>
                    <source srcset="<?= get_template_directory_uri(); ?>/img/main-banner/2.webp" type="image/webp">
                    <img loading="lazy" src="<?= get_template_directory_uri(); ?>/img/main-banner/2.jpg" alt="VECOMP">
                </picture>
            </div>
            <div class="main-banner__images__item">
                <picture>
                    <source srcset="<?= get_template_directory_uri(); ?>/img/main-banner/4.webp" type="image/webp">
                    <img loading="lazy" src="<?= get_template_directory_uri(); ?>/img/main-banner/4.jpg" alt="VECOMP">
                </picture>
            </div>
            <div class="main-banner__images__item">
                <picture>
                    <source srcset="<?= get_template_directory_uri(); ?>/img/main-banner/3.webp" type="image/webp">
                    <img loading="lazy" src="<?= get_template_directory_uri(); ?>/img/main-banner/3.jpg" alt="VECOMP">
                </picture>
            </div>
        </div>
    </section>
    <div class="partners">
        <div class="row partners__slider">
            <div class="col-6 col-md-3 col-lg-2">
                <div class="partners__item">
                    <picture>
                        <source srcset="<?= get_template_directory_uri(); ?>/img/partners/1.webp" type="image/webp">
                        <img loading="lazy" src="<?= get_template_directory_uri(); ?>/img/partners/1.png" alt="Наш партнер">
                    </picture>
                </div>
            </div>
            <div class="col-6 col-md-3 col-lg-2">
                <div class="partners__item">
                    <picture>
                        <source srcset="<?= get_template_directory_uri(); ?>/img/partners/2.webp" type="image/webp">
                        <img loading="lazy" src="<?= get_template_directory_uri(); ?>/img/partners/2.png" alt="Наш партнер">
                    </picture>
                </div>
            </div>
            <div class="col-6 col-md-3 col-lg-2">
                <div class="partners__item">
                    <picture>
                        <source srcset="<?= get_template_directory_uri(); ?>/img/partners/3.webp" type="image/webp">
                        <img loading="lazy" src="<?= get_template_directory_uri(); ?>/img/partners/3.png" alt="Наш партнер">
                    </picture>
                </div>
            </div>
            <div class="col-6 col-md-3 col-lg-2">
                <div class="partners__item">
                    <picture>
                        <source srcset="<?= get_template_directory_uri(); ?>/img/partners/4.webp" type="image/webp">
                        <img loading="lazy" src="<?= get_template_directory_uri(); ?>/img/partners/4.png" alt="Наш партнер">
                    </picture>
                </div>
            </div>
            <div class="col-6 col-md-3 col-lg-2">
                <div class="partners__item">
                    <picture>
                        <source srcset="<?= get_template_directory_uri(); ?>/img/partners/5.webp" type="image/webp">
                        <img loading="lazy" src="<?= get_template_directory_uri(); ?>/img/partners/5.png" alt="Наш партнер">
                    </picture>
                </div>
            </div>
            <div class="col-6 col-md-3 col-lg-2">
                <div class="partners__item">
                    <picture>
                        <source srcset="<?= get_template_directory_uri(); ?>/img/partners/6.webp" type="image/webp">
                        <img loading="lazy" src="<?= get_template_directory_uri(); ?>/img/partners/6.png" alt="Наш партнер">
                    </picture>
                </div>
            </div>

        </div>
    </div>
    <section class="catalog">
        <div class="row">
            <div class="col-8 col-md-6 col-lg-3">
                <h3 class="title">Каталог оборудования</h3>
            </div>
            <div class="col-4 col-md-6 col-lg-9 static">
                <div class="catalog__link">
                    <a href="" class="button button_transparent button_margin-left button_long">
                        В каталог
                        <i class="icon-up"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="catalog__list">
            <div class="row">
            <?php
                $taxonomy     = 'product_cat';
                $orderby      = 'menu_order';
                $show_count   = 0;      // 1 for yes, 0 for no
                $pad_counts   = 0;      // 1 for yes, 0 for no
                $hierarchical = 1;      // 1 for yes, 0 for no  
                $title        = '';
                $empty        = 0;

                $args = array(
                    'taxonomy'     => $taxonomy,
                    'orderby'      => $orderby,
                    'show_count'   => $show_count,
                    'pad_counts'   => $pad_counts,
                    'hierarchical' => $hierarchical,
                    'title_li'     => $title,
                    'hide_empty'   => $empty

                );
                $all_categories = get_categories($args);
                $i = 0;
                foreach ($all_categories as $cat) {
                    if ($cat->category_parent == 0) {
                        if ($i == 1) {
                            echo '<div class="col-lg-6">
                                        <a href="' . get_term_link($cat->slug, 'product_cat') . '" class="catalog__item catalog__item_first">
                                            <picture>';
                            woocommerce_subcategory_thumbnail($cat);
                            echo '</picture>
                                            <div class="catalog__item__title">' . $cat->name . '</div>
                                            <div class="catalog__item__icon button_icon">
                                                <i class="icon-up"></i>
                                            </div>
                                        </a>
                                    </div>
                            <div class="col-lg-6">
                                <div class="row">';
                        } elseif ($i < 6 && $i != 0) {
                            echo '<div class="col-6">
                                    <a href="' . get_term_link($cat->slug, 'product_cat') . '" class="catalog__item">
                                        <picture>';
                            woocommerce_subcategory_thumbnail($cat);
                            echo '</picture>
                                        <div class="catalog__item__title">' . $cat->name . '</div>
                                        <div class="catalog__item__icon button_icon">
                                            <i class="icon-up"></i>
                                        </div>
                                    </a>
                                </div>';
                        }
                        $i += 1;
                    }
                }
                echo '</div>
                </div>';
            ?>
            </div>
        </div>

    </section>
</div>
<section class="why-us">
    <div class="container">
        <div class="row">
            <div class="col-md-5 static">
                <div class="why-us__content">
                    <h2 class="title title_white title_mb">Почему выбирают компанию Vicomp</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <div class="row">
                        <div class="col-6">
                            <div class="why-us__adv">
                                <div class="big">8 лет</div>
                                <div class="text">успешной работы</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="why-us__adv">
                                <div class="big">1млн+</div>
                                <div class="text">Отгруженных товаров</div>
                            </div>
                        </div>
                    </div>
                    <a href="" class="button button_yellow button_margin-right button_long why-us__button">
                        Оставить заявку
                        <i class="icon-up"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-7">
                <div class="why-us__advantages">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="why-us__advantages__item">
                                <div class="why-us__advantages__item__icon">
                                    <img loading="lazy" src="<?= get_template_directory_uri(); ?>/img/icons/adv1.png" alt="">
                                </div>
                                <div class="why-us__advantages__item__title">
                                    Официальная гарантия
                                </div>
                                <div class="why-us__advantages__item__p">
                                    Предоставляем официальную гарантию от 1-3 лет на все товары
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="why-us__advantages__item">
                                <div class="why-us__advantages__item__icon">
                                    <img loading="lazy" src="<?= get_template_directory_uri(); ?>/img/icons/adv2.png" alt="">
                                </div>
                                <div class="why-us__advantages__item__title">
                                    Соответствие ISO 9001-2011
                                </div>
                                <div class="why-us__advantages__item__p">
                                    Предоставляем официальную гарантию от 1-3 лет на все товары
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="why-us__advantages__item">
                                <div class="why-us__advantages__item__icon">
                                    <img loading="lazy" src="<?= get_template_directory_uri(); ?>/img/icons/adv1.png" alt="">
                                </div>
                                <div class="why-us__advantages__item__title">
                                    Доставка по всей России
                                </div>
                                <div class="why-us__advantages__item__p">
                                    Предоставляем официальную гарантию от 1-3 лет на все товары
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="why-us__advantages__item">
                                <div class="why-us__advantages__item__icon">
                                    <img loading="lazy" src="<?= get_template_directory_uri(); ?>/img/icons/adv2.png" alt="">
                                </div>
                                <div class="why-us__advantages__item__title">
                                    Лучшие цены на рынке
                                </div>
                                <div class="why-us__advantages__item__p">
                                    Предоставляем официальную гарантию от 1-3 лет на все товары
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <section class="support">
        <div class="row">
            <div class="col-md-6 col-lg-5">
                <div class="support__content">
                    <h2 class="title title_mb">Полная техническая и методическая поддержка</h2>
                    <p class="support__content__text">Можем заранее установить сроки и стоимость предполагаемых работ, так как достаточно точно выясняем причины неисправности при беседе с заказчиком </p>
                    <ul class="support__content__list">
                        <li>Доставка запчастей <br />во все регионы России</li>
                        <li>Полная поддержка даже после <br />окончания срока эксплуатации</li>
                    </ul>
                    <a href="#" class="button button_transparent button_margin-right support__content__button">
                        Подробнее
                        <i class="icon-up"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 offset-lg-1">
                <div class="support__image">
                    <picture>
                        <source srcset="<?= get_template_directory_uri(); ?>/img/support.webp" type="image/webp">
                        <img loading="lazy" src="<?= get_template_directory_uri(); ?>/img/support.jpg" alt="VECOMP">
                    </picture>
                </div>
            </div>
        </div>
    </section>
    <div class="consultation">
        <img class="consultation__bg consultation__bg_left" loading="lazy" src="<?= get_template_directory_uri(); ?>/img/consultation/consultation_bg1.png" alt="VECOMP">
        <img class="consultation__bg consultation__bg_right" loading="lazy" src="<?= get_template_directory_uri(); ?>/img/consultation/consultation_bg2.png" alt="VECOMP">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="consultation__wrapper">
                    <div class="title title_center title_mb title_center">
                        Получите бесплатную консультацию специалиста
                    </div>
                    <p class="text-center">Наши специалисты всегда на связи и готовы ответить на все вопросы</p>
                    <?php echo do_shortcode('[contact-form-7 id="2486" title="Получите бесплатную консультацию специалиста"]'); ?>
                </div>
                
            </div>
        </div>
    </div>
    <div class="news">
        <div class="row">
            <div class="col-md-6">
                <h3 class="title">Последние новости</h3>
            </div>
            <div class="col-md-6 static">
                <div class="news__link">
                    <a href="#" class="button button_transparent button_margin-left button_long">
                        Смотреть все
                        <i class="icon-up"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="news__list">
            <div class="row news__slider">
            <?php query_posts('cat=121&posts_per_page=3'); ?>

            <?php while (have_posts()) : the_post(); ?>
                <div class="col-md-4">
                    <div class="news__item">
                        <div class="news__item__img">
                            <picture>
                                <?php echo get_the_post_thumbnail(); ?>
                            </picture>
                        </div>
                        <?php $title = get_the_title();
                        if (mb_strlen($title) > 48) {
                            $title = mb_substr($title, 0, 47) . '...';
                        } ?>
                        <div class="news__item__content">
                            <div class="news__item__date">28.01.2022</div>
                            <a href="<?php the_permalink(); ?>" class="news__item__title"><?= $title ?></a>
                            <a href="<?php the_permalink(); ?>" class="news__item__icon button_icon">
                                <i class="icon-up"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            </div>
        </div>
    </div>
    <div class="faq">
        <div class="row">
            <div class="col-md-3">
                <h3 class="title">Часто задаваемые вопросы</h3>
            </div>
            <div class="col-md-8 offset-md-1">
                <ul class="faq__list">
                    <li class="faq__item">
                        <input type="checkbox" name="faq1" id="faq1">
                        <label for="faq1">
                            <div class="faq__item__question">
                                В каких областях промышленности применяется аналитическое лабораторное оборудование?
                            </div>
                            <i class="faq__item__icon"></i>
                            <div class="faq__item__answer">
                                Мы предлагаем решения для предприятий, занятых в сфере производства кормовых ингредиентов, кормов и комбикормов для сельскохозяйственных и домашних животных, в производстве масла, муки, табака, в сфере переработки кукурузы и пшеницы.
                            </div>
                        </label>

                    </li>
                    <li class="faq__item">
                        <input type="checkbox" name="faq2" id="faq2">
                        <label for="faq2">
                            <div class="faq__item__question">
                            Где можно купить расходные материалы для ваших приборов?
                            </div>
                            <i class="faq__item__icon"></i>
                            <div class="faq__item__answer">
                            Оригинальные запасные части и расходные материалы вы также можете приобрести в нашей компании. Мы организуем отправку этих товаров по всей России.
                            </div>
                        </label>

                    </li>
                    <li class="faq__item">
                        <input type="checkbox" name="faq3" id="faq3">
                        <label for="faq3">
                            <div class="faq__item__question">
                            Предоставляете ли вы гарантию?
                            </div>
                            <i class="faq__item__icon"></i>
                            <div class="faq__item__answer">
                            Наша компания осуществляет полную техническую и методическую поддержку для заказчика, так как мы являемся авторизованными дистрибьюторами большинства поставляемых товаров. Мы готовы предоставить консультацию, а также запасные части и другие материалы для самостоятельного ремонта, или направить специалиста для устранения проблемы.
                            </div>
                        </label>

                    </li>
                    <li class="faq__item">
                        <input type="checkbox" name="faq4" id="faq4">
                        <label for="faq4">
                            <div class="faq__item__question">
                            Окупается ли ваше оборудование?
                            </div>
                            <i class="faq__item__icon"></i>
                            <div class="faq__item__answer">
                            Лабораторные исследования необходимы для поддержки уровня качества, а ошибки в ходе их проведения могут привести к падению качества продукции и возникновению нежелательных издержек. Автоматизация лабораторных процессов путем внедрения современных технологий значительно снижает риск возникновения ошибок и таким образом быстро окупается.
                            </div>
                        </label>

                    </li>
                    <li class="faq__item">
                        <input type="checkbox" name="faq5" id="faq5">
                        <label for="faq5">
                            <div class="faq__item__question">
                            Как связаться с вашей компанией?
                            </div>
                            <i class="faq__item__icon"></i>
                            <div class="faq__item__answer">
                            Вы можете позвонить по телефону, который указан на нашем официальном сайте, или заполнить специальную форму для получения консультации.
                            </div>
                        </label>

                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>