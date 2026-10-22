<?php get_header(); ?>

    <!--СЕКЦІЯ АКЦІЇ -->
    <section>
        <div class="container">
            <div class="swiper hero-swiper">
                <ul class="swiper-wrapper">
                <?php 
                    $posts = get_posts([
                        'numberposts' => -1,
                        'category_name' => 'hero',
                        'post_type' => 'post',
                        'suppress_filters' => true
                        ]);
                    foreach($posts as $post) {
                        setup_postdata($post);
                ?>  
                    <li class="swiper-slide promo-card">
                        <div class="promo-card__tags">
                            <span class="badge badge--orange"><?php echo CFS()->get('red_label'); ?></span>
                            <span class="badge badge--outline"><?php echo CFS()->get('black_label'); ?></span>
                        </div>
                        <div class="promo-card__header">
                            <h2 class="promo-card__title">
                                <span class="accent-code"><?php echo CFS()->get('num'); ?> //</span> <?php the_title(); ?>
                            </h2>
                            <p class="promo-card__description">
                               <?php the_content(); ?>
                            </p>
                        </div>
                        <div class="promo-card__media">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Кобура Тайфун Кайдекс" class="promo-card__img"
                                loading="lazy">
                            <div class="promo-card__discount-tag">
                                <?php echo CFS()->get('img_text'); ?>
                            </div>
                        </div>
                        <div class="promo-card__actions">
                            <a href="#" class="btn btn--primary">
                                <span><?php echo CFS()->get('btn_text'); ?></span>
                                <svg width="12" height="15" viewBox="0 0 12 15" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.9125 12.15L8.79375 7.5H5.79375L6.3375 3.24375L2.86875 8.25H5.475L4.9125 12.15ZM3 15L3.75 9.75H0L6.75 0H8.25L7.5 6H12L4.5 15H3Z"
                                        fill="white" />
                                </svg>
                            </a>

                            <button type="button" class="btn btn--icon" aria-label="Фільтри або налаштування">
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.33333 16.5V11H9.16667V12.8333H16.5V14.6667H9.16667V16.5H7.33333V16.5M0 14.6667V12.8333H5.5V14.6667H0V14.6667M3.66667 11V9.16667H0V7.33333H3.66667V5.5H5.5V11H3.66667V11M7.33333 9.16667V7.33333H16.5V9.16667H7.33333V9.16667M11 5.5V0H12.8333V1.83333H16.5V3.66667H12.8333V5.5H11V5.5M0 3.66667V1.83333H9.16667V3.66667H0V3.66667"
                                        fill="#D4C95E" />
                                </svg>
                            </button>
                        </div>
                    </li>
                <?php
                }
                wp_reset_postdata();
                ?>
                </ul>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <section class="arsenal">
        <div class="container">

            <div class="arsenal__header">
                <div class="arsenal__titles">
                    <span class="arsenal__label">// ARSENAL SELECTOR</span>
                    <h2 class="arsenal__title">КАТЕГОРІЇ СПОРЯДЖЕННЯ</h2>
                </div>

                <a href="<?php echo esc_url( get_term_link( 'all-cat', 'product_cat' ) ); ?>" class="arsenal__all">
                    <span>всі (<?php echo wp_count_posts( 'product' )->publish; ?>)</span>
                    <span class="arsenal__arrow">
                        <svg viewBox="0 0 5 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.06667 4L0 0.933333L0.933333 0L4.93333 4L0.933333 8L0 7.06667L3.06667 4Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                </a>
            </div>

            <div class="categories">
            <?php
                wp_nav_menu( [
                    'theme_location'  => 'top', //ідентифікатор нашого меню
                    'menu'            => '', //меню яке потрібно вивести
                    'container'       => 'div', //чим огортати тег ul
                    'container_class' => 'front-page-menu', //клас контейнера меню
                ] );
            ?>
            </div>
            

        </div>
    </section>

    <section class="hits">
        <div class="container">
            <!-- SECTION HEADER -->
            <div class="hits__header">
                <span class="hits__label">
                    🔥 TOP OPERATIONAL SELLERS
                </span>
                <h2 class="hits__title">
                    ХІТИ СЕЗОНУ //
                    <br>
                    НАЯВНІСТЬ
                </h2>
            </div>
            <!-- SWIPER -->
             <?php echo do_shortcode('[recent_products class="swiper products-slider"]'); ?>
        </div>
    </section>

    <section class="workshop">
        <div class="container">

            <div class="workshop__header">
                <span class="workshop__label">
                    // WORKSHOP ARCHIVE
                </span>

                <h2 class="workshop__title">
                    МАЙСТЕРНЯ СНЕHLUНА
                </h2>
            </div>


            <a class="workshop__video-link" href="https://www.youtube.com/@YOUR_CHANNEL" target="_blank"
                rel="noopener noreferrer" aria-label="Перейти на YouTube-канал майстерні">
                <div class="workshop__video-wrapper">

                    <video class="workshop__video" autoplay muted loop playsinline preload="metadata"
                        poster="./img/workshop-poster.jpg">
                        <source src="<?php echo esc_url(CFS()->get('main_page_video', 97)); ?>" type="video/mp4">

                        Ваш браузер не підтримує відтворення відео.
                    </video>
                </div>
            </a>
        </div>
    </section>

 <section class="reviews">
    <div class="container">

        <!-- Section header -->
        <div class="reviews__header">

            <span class="reviews__label">
                ★ COMBAT TESTED
            </span>

            <h2 class="reviews__title">
                БОЙОВИЙ ТЕСТ-ДРАЙВ
            </h2>

        </div>

<?php
$reviews = get_comments([
    'type'    => 'review',
    'status'  => 'approve',
    'number'  => 6,
    'orderby' => 'comment_date_gmt',
    'order'   => 'DESC',
]);
?>

<!-- Reviews slider -->
<div class="swiper reviews-slider">

    <ul class="swiper-wrapper">

        <?php foreach ( $reviews as $review ) : ?>

            <?php
            $product = wc_get_product( $review->comment_post_ID );

            if ( ! $product ) {
                continue;
            }

            $author = trim( $review->comment_author );

            // Перша літера імені для аватара
            $author_clean = preg_replace( '/[^\p{L}\p{N}]+/u', '', $author );
            $avatar_letter = mb_strtoupper(
                mb_substr( $author_clean, 0, 1 )
            );

            // Рейтинг
            $rating = (int) get_comment_meta(
                $review->comment_ID,
                'rating',
                true
            );

            // Можна зберігати локацію як comment meta "location"
            $location = get_comment_meta(
                $review->comment_ID,
                'location',
                true
            );
            ?>

            <li class="swiper-slide review-card">

                <div class="review-card__top">

                    <div class="review-card__avatar">
                        <?php echo esc_html( $avatar_letter ); ?>
                    </div>

                    <div class="review-card__user">

                        <h3 class="review-card__name">
                            <?php echo esc_html( mb_strtoupper( $author ) ); ?>
                        </h3>

                        <?php if ( $location ) : ?>
                            <p class="review-card__location">
                                <?php echo esc_html( mb_strtoupper( $location ) ); ?>
                            </p>
                        <?php endif; ?>

                    </div>

                </div>


                <?php if ( $rating > 0 ) : ?>

                    <div class="review-card__rating">

                        <?php for ( $i = 1; $i <= $rating; $i++ ) : ?>

                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.23125 11.0833L3.17917 6.98542L0 4.22917L4.2 3.86458L5.83333 0L7.46667 3.86458L11.6667 4.22917L8.4875 6.98542L9.43542 11.0833L5.83333 8.91042L2.23125 11.0833Z" fill="currentColor"/>
                            </svg>

                        <?php endfor; ?>

                    </div>

                <?php endif; ?>


                <p class="review-card__text">
                    <?php echo esc_html( $review->comment_content ); ?>
                </p>


                <p class="review-card__products">
                    ВИРОБИ: <?php echo esc_html( mb_strtoupper( $product->get_name() ) ); ?>
                </p>

            </li>

        <?php endforeach; ?>

    </ul>

</div>

            <!-- Pagination -->
            <div class="reviews-pagination"></div>

        </div>

    </div>
</section>
<?php get_footer(); ?> 