<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chehluha</title>
    <?php wp_head(); ?>
</head>

<body>
    <div class="ticker">
        <div class="ticker-track">

 <?php
$news_posts = get_posts([
    'numberposts'    => -1,
    'category_name'  => 'news',
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'suppress_filters' => true,
]);
?>

    <div class="ticker-group">
        <?php foreach ( $news_posts as $news_post ) : ?>
            <span>
                <?php echo wp_kses_post( wpautop( get_the_content( '', false, $news_post ) ) ); ?>
            </span>
        <?php endforeach; ?>
    </div>

    <!-- Копія для безперервної анімації -->
    <div class="ticker-group">
        <?php foreach ( $news_posts as $news_post ) : ?>
            <span>
                <?php echo wp_kses_post( wpautop( get_the_content( '', false, $news_post ) ) ); ?>
            </span>
        <?php endforeach; ?>
    </div>

        </div>
    </div>
    <header>
        <div class="container">
            <div class="icons-left">
                <button
                    class="burger"
                    type="button"
                    aria-label="Відкрити меню"
                    aria-controls="header-sidebar"
                    aria-expanded="false"
                >
                    <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0 12V10H18V12H0ZM0 7V5H18V7H0ZM0 2V0H18V2H0Z"
                            fill="currentColor"
                        />
                    </svg>
                </button>
                <a class="search">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15.2167 16.5L9.44167 10.725C8.98333 11.0917 8.45625 11.3819 7.86042 11.5958C7.26458 11.8097 6.63056 11.9167 5.95833 11.9167C4.29306 11.9167 2.88368 11.3399 1.73021 10.1865C0.576736 9.03299 0 7.62361 0 5.95833C0 4.29306 0.576736 2.88368 1.73021 1.73021C2.88368 0.576736 4.29306 0 5.95833 0C7.62361 0 9.03299 0.576736 10.1865 1.73021C11.3399 2.88368 11.9167 4.29306 11.9167 5.95833C11.9167 6.63056 11.8097 7.26458 11.5958 7.86042C11.3819 8.45625 11.0917 8.98333 10.725 9.44167L16.5 15.2167L15.2167 16.5ZM5.95833 10.0833C7.10417 10.0833 8.07812 9.68229 8.88021 8.88021C9.68229 8.07812 10.0833 7.10417 10.0833 5.95833C10.0833 4.8125 9.68229 3.83854 8.88021 3.03646C8.07812 2.23438 7.10417 1.83333 5.95833 1.83333C4.8125 1.83333 3.83854 2.23438 3.03646 3.03646C2.23438 3.83854 1.83333 4.8125 1.83333 5.95833C1.83333 7.10417 2.23438 8.07812 3.03646 8.88021C3.83854 9.68229 4.8125 10.0833 5.95833 10.0833Z"
                            fill="currentColor" />
                    </svg>
                </a>
            </div>
            <a class="logo" href="<?php echo home_url(); ?>">
                CHEHLUHA
            </a>
            <div class="icons-right">
                <a class="icon" href="<?php echo wc_get_cart_url(); ?>">
                    <?php 
                    if ( class_exists( 'WooCommerce' ) && WC()->cart && ( function_exists( 'is_cart' ) && ! is_cart() ) ) {
                        $cart_count = WC()->cart->get_cart_contents_count();
                        echo '<span class="custom-cart-count">' . esc_html( $cart_count ) . '</span>';
                    }
                    ?>
                    <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2 20C1.45 20 0.979167 19.8042 0.5875 19.4125C0.195833 19.0208 0 18.55 0 18V6C0 5.45 0.195833 4.97917 0.5875 4.5875C0.979167 4.19583 1.45 4 2 4H4C4 2.9 4.39167 1.95833 5.175 1.175C5.95833 0.391667 6.9 0 8 0C9.1 0 10.0417 0.391667 10.825 1.175C11.6083 1.95833 12 2.9 12 4H14C14.55 4 15.0208 4.19583 15.4125 4.5875C15.8042 4.97917 16 5.45 16 6V18C16 18.55 15.8042 19.0208 15.4125 19.4125C15.0208 19.8042 14.55 20 14 20H2ZM2 18H14V6H12V8C12 8.28333 11.9042 8.52083 11.7125 8.7125C11.5208 8.90417 11.2833 9 11 9C10.7167 9 10.4792 8.90417 10.2875 8.7125C10.0958 8.52083 10 8.28333 10 8V6H6V8C6 8.28333 5.90417 8.52083 5.7125 8.7125C5.52083 8.90417 5.28333 9 5 9C4.71667 9 4.47917 8.90417 4.2875 8.7125C4.09583 8.52083 4 8.28333 4 8V6H2V18ZM6 4H10C10 3.45 9.80417 2.97917 9.4125 2.5875C9.02083 2.19583 8.55 2 8 2C7.45 2 6.97917 2.19583 6.5875 2.5875C6.19583 2.97917 6 3.45 6 4ZM2 18V6V18Z"
                            fill="currentColor" />
                    </svg>
                </a>
                <a class="icon" href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6 6C5.175 6 4.46875 5.70625 3.88125 5.11875C3.29375 4.53125 3 3.825 3 3C3 2.175 3.29375 1.46875 3.88125 0.88125C4.46875 0.29375 5.175 0 6 0C6.825 0 7.53125 0.29375 8.11875 0.88125C8.70625 1.46875 9 2.175 9 3C9 3.825 8.70625 4.53125 8.11875 5.11875C7.53125 5.70625 6.825 6 6 6ZM0 12V9.9C0 9.475 0.109375 9.08437 0.328125 8.72812C0.546875 8.37187 0.8375 8.1 1.2 7.9125C1.975 7.525 2.7625 7.23438 3.5625 7.04063C4.3625 6.84688 5.175 6.75 6 6.75C6.825 6.75 7.6375 6.84688 8.4375 7.04063C9.2375 7.23438 10.025 7.525 10.8 7.9125C11.1625 8.1 11.4531 8.37187 11.6719 8.72812C11.8906 9.08437 12 9.475 12 9.9V12H0ZM1.5 10.5H10.5V9.9C10.5 9.7625 10.4656 9.6375 10.3969 9.525C10.3281 9.4125 10.2375 9.325 10.125 9.2625C9.45 8.925 8.76875 8.67188 8.08125 8.50313C7.39375 8.33438 6.7 8.25 6 8.25C5.3 8.25 4.60625 8.33438 3.91875 8.50313C3.23125 8.67188 2.55 8.925 1.875 9.2625C1.7625 9.325 1.67188 9.4125 1.60312 9.525C1.53437 9.6375 1.5 9.7625 1.5 9.9V10.5ZM6 4.5C6.4125 4.5 6.76562 4.35312 7.05937 4.05937C7.35312 3.76562 7.5 3.4125 7.5 3C7.5 2.5875 7.35312 2.23438 7.05937 1.94062C6.76562 1.64687 6.4125 1.5 6 1.5C5.5875 1.5 5.23438 1.64687 4.94063 1.94062C4.64688 2.23438 4.5 2.5875 4.5 3C4.5 3.4125 4.64688 3.76562 4.94063 4.05937C5.23438 4.35312 5.5875 4.5 6 4.5Z"
                            fill="currentColor" />
                    </svg>
                </a>
            </div>
        </div>
    </header>
<div class="header-widget-overlay"></div>

<aside
    id="header-sidebar"
    class="header-widget-area"
    aria-hidden="true"
>
    <div class="header-widget-area__inner">

        <button
            class="header-widget-area__close"
            type="button"
            aria-label="Закрити меню"
        >
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M2 2L16 16M16 2L2 16"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                />
            </svg>
        </button>

        <?php if ( is_active_sidebar( 'header-widget' ) ) : ?>
            <?php dynamic_sidebar( 'header-widget' ); ?>
        <?php endif; ?>

    </div>
</aside>