document.addEventListener("DOMContentLoaded", () => {
    const burger = document.querySelector(".burger");
    const sidebar = document.querySelector(".header-widget-area");
    const overlay = document.querySelector(".header-widget-overlay");
    const closeButton = document.querySelector(".header-widget-area__close");

    if (!burger || !sidebar || !overlay) {
        return;
    }

    const openMenu = () => {
        sidebar.classList.add("is-open");
        overlay.classList.add("is-open");

        document.body.classList.add("menu-open");

        burger.setAttribute("aria-expanded", "true");
        sidebar.setAttribute("aria-hidden", "false");
    };

    const closeMenu = () => {
        sidebar.classList.remove("is-open");
        overlay.classList.remove("is-open");

        document.body.classList.remove("menu-open");

        burger.setAttribute("aria-expanded", "false");
        sidebar.setAttribute("aria-hidden", "true");
    };

    const toggleMenu = () => {
        const isOpen = sidebar.classList.contains("is-open");

        if (isOpen) {
            closeMenu();
        } else {
            openMenu();
        }
    };


    /* Burger */

    burger.addEventListener("click", (event) => {
        event.preventDefault();

        toggleMenu();
    });


    /* Close button */

    if (closeButton) {
        closeButton.addEventListener("click", () => {
            closeMenu();
        });
    }


    /* Overlay */

    overlay.addEventListener("click", () => {
        closeMenu();
    });


    /* ESC */

    document.addEventListener("keydown", (event) => {
        if (event.key === "Escape") {
            closeMenu();
        }
    });
});

function initQuantityButtons() {
    // Шукаємо інпути і на сторінці кошика, і на сторінці окремого товару (.cart input.qty)
    document.querySelectorAll('.woocommerce-cart-form input.qty, .cart input.qty').forEach(function (input) {
        // Запобігаємо повторному додаванню кнопок
        if (input.parentElement.classList.contains('qty-wrap')) return;

        const wrap = document.createElement('div');
        wrap.className = 'qty-wrap';

        const minus = document.createElement('button');
        minus.type = 'button';
        minus.className = 'qty-minus'; // Додаємо клас, щоб працювали CSS стилі
        minus.textContent = '-';
        
        const plus = document.createElement('button');
        plus.type = 'button';
        plus.className = 'qty-plus'; // Додаємо клас, щоб працювали CSS стилі
        plus.textContent = '+';

        input.parentNode.insertBefore(wrap, input);
        wrap.appendChild(minus);
        wrap.appendChild(input);
        wrap.appendChild(plus);

        minus.addEventListener('click', function () {
            let val = parseInt(input.value, 10) || 0;
            let min = parseInt(input.min, 10) || 1;

            if (val > min) {
                input.value = val - 1;
                input.dispatchEvent(new Event('change', { bubbles: true }));
            }
        });

        plus.addEventListener('click', function () {
            let val = parseInt(input.value, 10) || 1;
            let max = input.max ? parseInt(input.max, 10) : Infinity;

            if (val < max) {
                input.value = val + 1;
                input.dispatchEvent(new Event('change', { bubbles: true }));
            }
        });
    });
}

// Викликаємо при завантаженні сторінки
document.addEventListener('DOMContentLoaded', initQuantityButtons);

jQuery(function ($) {
    // Повторно ініціалізуємо кнопки після AJAX-оновлень WooCommerce
    $(document.body).on('updated_wc_div', function() {
        initQuantityButtons();
    });
});

// 1. Викликаємо при завантаженні сторінки
document.addEventListener('DOMContentLoaded', initQuantityButtons);

jQuery(function ($) {
    // 2. Викликаємо ПІСЛЯ того, як WooCommerce оновив фрагменти кошика через AJAX
    $(document.body).on('updated_wc_div', function() {
        initQuantityButtons();
    });

    // Ваш код для авто-оновлення при зміні кількості
    $(document).on('change', 'input.qty', function () {
        // Додаємо невеличку затримку (debounce), щоб уникнути спаму запитами, 
        // якщо користувач швидко клікає кілька разів поспіль
        clearTimeout(window.wc_cart_update_timeout);
        
        const $form = $(this).closest('form.woocommerce-cart-form');
        const $updateBtn = $form.find('button[name="update_cart"]');
        
        window.wc_cart_update_timeout = setTimeout(function() {
            $updateBtn.prop('disabled', false).trigger('click');
        }, 300); // 300 мілісекунд затримки
    });
});


jQuery(document).ready(function($) {
    // Зберігаємо ваші SVG у змінні. 
    // Увага: я змінив width та height на "100%", щоб вони адаптувались до розміру в CSS.
var emptyStar = '<svg width="100%" height="100%" viewBox="0 0 8 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.34532 5.64419L3.65782 4.85253L4.97032 5.65461L4.62657 4.15461L5.78282 3.15461L4.26198 3.01919L3.65782 1.60253L3.05365 3.00877L1.53282 3.14419L2.68907 4.15461L2.34532 5.64419ZM1.39742 6.95105L1.99437 4.38056L0 2.65222L2.63138 2.42385L3.65782 0L4.68425 2.42385L7.31563 2.65222L5.32126 4.38056L5.91821 6.95105L3.65782 5.58728L1.39742 6.95105Z" fill="#95917E"/></svg>';
/* ^^^ Змінено з #D0C5AF (світло-бежевий) на #A0A0A0 (помітний сірий) */

var filledStar = '<svg width="100%" height="100%" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.59375 7.91667L2.27083 4.98958L0 3.02083L3 2.76042L4.16667 0L5.33333 2.76042L8.33333 3.02083L6.0625 4.98958L6.73958 7.91667L4.16667 6.36458L1.59375 7.91667Z" fill="#FE5F00"/></svg>';
/* ^^^ Змінено з #775A19 (блідо-коричневий) на #F0C000 (яскравий золотий/жовтий) */

    var $starsContainer = $('.comment-form-rating .stars');
    var $stars = $starsContainer.find('a');

    if ($stars.length > 0) {
        
        // 1. При завантаженні сторінки вставляємо пусті зірочки замість тексту
        $stars.each(function() {
            $(this).html(emptyStar);
        });

        // 2. Логіка при наведенні мишки (Hover)
        $stars.on('mouseenter', function() {
            var hoverIndex = $(this).index(); // Отримуємо номер зірочки, на яку навели (0-4)
            
            $stars.each(function(i) {
                if (i <= hoverIndex) {
                    $(this).html(filledStar); // Заповнюємо поточну і всі попередні
                } else {
                    $(this).html(emptyStar);  // Наступні залишаємо пустими
                }
            });
        });

        // 3. Коли курсор йде з блоку зірок — повертаємо стан до обраної оцінки
        $starsContainer.on('mouseleave', function() {
            resetStars();
        });

        // 4. Логіка при кліку (фіксуємо вибір)
        $stars.on('click', function(e) {
            // WooCommerce автоматично додає клас "active" на клікнуту зірку та оновлює <select>.
            // Ми даємо скриптам WooCommerce 10 мілісекунд, щоб вони відпрацювали, 
            // після чого оновлюємо наші SVG відповідно до обраної оцінки.
            setTimeout(function() {
                resetStars();
            }, 10);
        });

        // Допоміжна функція: перевіряє, яка зірка активна і малює SVG
        function resetStars() {
            // Шукаємо зірку з класом active (цей клас ставить сам WooCommerce)
            var activeStar = $stars.filter('.active');
            var activeIndex = activeStar.length ? activeStar.index() : -1;

            $stars.each(function(i) {
                if (activeIndex >= 0 && i <= activeIndex) {
                    $(this).html(filledStar);
                } else {
                    $(this).html(emptyStar);
                }
            });
        }
    }
});

jQuery(document).ready(function($) {

    // Головна функція для запуску анімації Toast-сповіщень
    function handleWooCommerceToast($targetWrapper) {
        var $wrapper = $targetWrapper || $('.woocommerce-notices-wrapper');

        // Перевіряємо, чи є всередині елементи сповіщень
        if ($wrapper.length && $wrapper.find('.woocommerce-message, .woocommerce-info, .woocommerce-error').length > 0) {
            
            // Якщо це помічник чекауту (.woocommerce-NoticeGroup-checkout), 
            // переносимо його вміст у наш фіксований .woocommerce-notices-wrapper
            if ($wrapper.hasClass('woocommerce-NoticeGroup-checkout')) {
                var $mainWrapper = $('.woocommerce-notices-wrapper');
                
                // Переносимо помилки в основний контейнер
                $mainWrapper.html($wrapper.html());
                $wrapper.remove(); // Видаляємо дубльований контейнер чекауту
                
                $wrapper = $mainWrapper;
            }

            // Повертаємо видимість та скидаємо старі класи анімації
            $wrapper.css('visibility', '').removeClass('is-visible is-fading');
            
            // 1. Показуємо сповіщення
            setTimeout(function() {
                $wrapper.addClass('is-visible');
            }, 100);

            // 2. Через 4 секунди ховаємо сповіщення
            setTimeout(function() {
                $wrapper.removeClass('is-visible').addClass('is-fading');
                
                // 3. Приховуємо після завершення анімації
                setTimeout(function() {
                    $wrapper.removeClass('is-fading');
                    $wrapper.css('visibility', 'hidden'); 
                }, 500);
                
            }, 4000);
        }
    }

    // Тригер 1: При звичайному завантаженні/перезавантаженні сторінки
    handleWooCommerceToast();

    // Тригер 2: Після AJAX-оновлення кошика
    $(document).on('updated_cart_totals', function() {
        handleWooCommerceToast();
    });

    // Тригер 3: При виникненні помилок валідації на сторінці Checkout
    $(document.body).on('checkout_error', function() {
        // Чекаємо мікротаск, поки WC вставить DOM-вузол з помилками чекауту
        setTimeout(function() {
            var $checkoutNotice = $('.woocommerce-NoticeGroup-checkout');
            if ($checkoutNotice.length) {
                handleWooCommerceToast($checkoutNotice);
            } else {
                handleWooCommerceToast();
            }
        }, 50);
    });

    // Тригер 4: При оновленні фрагментів Checkout через AJAX (updated_checkout)
    $(document.body).on('updated_checkout', function(event, data) {
        var $checkoutNotice = $('.woocommerce-NoticeGroup-checkout');
        if ($checkoutNotice.length) {
            handleWooCommerceToast($checkoutNotice);
        }
    });

});