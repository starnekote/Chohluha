
<footer class="footer">
    <div class="container">

        <!-- Бренд -->
        <div class="footer__brand">

            <div class="footer__brand-info">
                <a href="#" class="footer__brand-name">
                    CHEHLUHA
                </a>

                <span class="footer__brand-subtitle">
                    MIL-SPEC KYDEX &amp; POP GEAR
                </span>
            </div>

        </div>


        <!-- Контакти -->
        <div class="footer__contacts">

            <a
                href="#"
                class="footer__location"
            >
                <span class="footer__contact-icon">
                    <svg width="12" height="15" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 7.5C6.4125 7.5 6.76562 7.35312 7.05937 7.05937C7.35312 6.76562 7.5 6.4125 7.5 6C7.5 5.5875 7.35312 5.23438 7.05937 4.94063C6.76562 4.64688 6.4125 4.5 6 4.5C5.5875 4.5 5.23438 4.64688 4.94063 4.94063C4.64688 5.23438 4.5 5.5875 4.5 6C4.5 6.4125 4.64688 6.76562 4.94063 7.05937C5.23438 7.35312 5.5875 7.5 6 7.5ZM6 13.0125C7.525 11.6125 8.65625 10.3406 9.39375 9.19687C10.1313 8.05312 10.5 7.0375 10.5 6.15C10.5 4.7875 10.0656 3.67188 9.19687 2.80312C8.32812 1.93437 7.2625 1.5 6 1.5C4.7375 1.5 3.67188 1.93437 2.80312 2.80312C1.93437 3.67188 1.5 4.7875 1.5 6.15C1.5 7.0375 1.86875 8.05312 2.60625 9.19687C3.34375 10.3406 4.475 11.6125 6 13.0125ZM6 15C3.9875 13.2875 2.48438 11.6969 1.49063 10.2281C0.496875 8.75937 0 7.4 0 6.15C0 4.275 0.603125 2.78125 1.80938 1.66875C3.01562 0.55625 4.4125 0 6 0C7.5875 0 8.98438 0.55625 10.1906 1.66875C11.3969 2.78125 12 4.275 12 6.15C12 7.4 11.5031 8.75937 10.5094 10.2281C9.51562 11.6969 8.0125 13.2875 6 15Z" fill="currentColor"/>
                    </svg>
                </span>

                <span class="footer__contact-text">
                    <?php echo CFS()->get('footer_location', 113); ?>
                </span>
            </a>


            <div class="footer__contact">

                <span class="footer__contact-icon">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.7125 13.5C11.15 13.5 9.60625 13.1594 8.08125 12.4781C6.55625 11.7969 5.16875 10.8313 3.91875 9.58125C2.66875 8.33125 1.70312 6.94375 1.02188 5.41875C0.340625 3.89375 0 2.35 0 0.7875C0 0.5625 0.075 0.375 0.225 0.225C0.375 0.075 0.5625 0 0.7875 0H3.825C4 0 4.15625 0.059375 4.29375 0.178125C4.43125 0.296875 4.5125 0.4375 4.5375 0.6L5.025 3.225C5.05 3.425 5.04375 3.59375 5.00625 3.73125C4.96875 3.86875 4.9 3.9875 4.8 4.0875L2.98125 5.925C3.23125 6.3875 3.52813 6.83437 3.87188 7.26562C4.21562 7.69688 4.59375 8.1125 5.00625 8.5125C5.39375 8.9 5.8 9.25937 6.225 9.59062C6.65 9.92188 7.1 10.225 7.575 10.5L9.3375 8.7375C9.45 8.625 9.59688 8.54062 9.77812 8.48438C9.95937 8.42813 10.1375 8.4125 10.3125 8.4375L12.9 8.9625C13.075 9.0125 13.2188 9.10312 13.3313 9.23438C13.4438 9.36563 13.5 9.5125 13.5 9.675V12.7125C13.5 12.9375 13.425 13.125 13.275 13.275C13.125 13.425 12.9375 13.5 12.7125 13.5ZM2.26875 4.5L3.50625 3.2625L3.1875 1.5H1.51875C1.58125 2.0125 1.66875 2.51875 1.78125 3.01875C1.89375 3.51875 2.05625 4.0125 2.26875 4.5ZM8.98125 11.2125C9.46875 11.425 9.96562 11.5938 10.4719 11.7188C10.9781 11.8438 11.4875 11.925 12 11.9625V10.3125L10.2375 9.95625L8.98125 11.2125Z" fill="currentColor"/>
                    </svg>
                </span>
                    <?php
                    $loop = CFS()->get('footer_phone', 113);
                    $total = count($loop);

                    foreach ($loop as $index => $row) {
                    ?>
                        <div class="footer__contact-text">
                            <a href="tel:<?php echo esc_attr($row['footer_phone_call']); ?>">
                                <?php echo esc_html($row['footer_phone_num']); ?>
                            </a>
                        </div>

                        <?php if ($index < $total - 1) : ?>
                            <span class="footer__separator">
                                •
                            </span>
                        <?php endif; ?>

                    <?php
                    }
                    ?>
            </div>
        </div>


        <!-- Соціальні мережі -->
<div class="footer__socials">

    <?php
    $loop = CFS()->get( 'footer_social', 113 );

    if ( ! empty( $loop ) ) :
        foreach ( $loop as $row ) :

            $link = $row['footer_social_link'];
    ?>

        <a
            href="<?php echo esc_url( $link['url'] ); ?>"
            class="footer__social"
            aria-label="<?php echo esc_attr( $link['text'] ); ?>"
            <?php if ( ! empty( $link['target'] ) ) : ?>
                target="<?php echo esc_attr( $link['target'] ); ?>"
            <?php endif; ?>
        >
            <?php echo $row['footer_social_svg']; ?>
        </a>

    <?php
        endforeach;
    endif;
    ?>

</div>



        <!-- Категорії -->
        <div class="footer__categories">

            <h2 class="footer__categories-title">
                КАТЕГОРІЇ
            </h2>

            <div class="footer__categories-list">

            <?php
                wp_nav_menu( [
                    'theme_location'  => 'bottom', //ідентифікатор нашого меню
                    'menu'            => '', //меню яке потрібно вивести
                    'container'       => 'div', //чим огортати тег ul
                    'container_class' => 'footer_menu', //клас контейнера меню
                ] );
            ?>

            </div>

        </div>


        <!-- Платіжні системи -->
        <div class="footer__payments">

            <?php
                $loop = CFS()->get('footer_payments', 113);
                foreach ($loop as $index => $row) {
                    $link = $row['footer_payments_link'];
            ?>
            <a href="<?php echo esc_url( $link['url'] ); ?>" class="footer__payment">
                <?php echo $row['footer_payments_text']; ?>
            </a>
            <?php
            }
            ?>
        </div>


        <!-- Copyright -->
        <div class="footer__copyright">
            © 2025 Chehluha Custom Kydex Lab.
            All tactical rights reserved.
        </div>

    </div>
</footer>

    <script src="assets/js/swiper-bundle.min.js"></script>
    <?php wp_footer(); ?>
</body>

</html>