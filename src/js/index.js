document.addEventListener("DOMContentLoaded", function() {
    const hamburger = document.querySelector(".hamburger"),
        menu = document.querySelector(".header__main");

    if(hamburger && menu) {
        hamburger.addEventListener("click", () => {
            menu.classList.toggle("active");
            hamburger.classList.toggle("icon-hamb");
            hamburger.classList.toggle("icon-close");
        });
    }
    const mainMenu = document.querySelector(".header__main__menu");

    if (mainMenu) {
        const subMenu = mainMenu.querySelector(".menu-item-has-children");

        if (subMenu) {
            const ul = subMenu.querySelector("ul");

            if (ul) {
                function addActive() {
                    ul.classList.add("active");
                    subMenu.removeEventListener("click", addActive);
                    
                }
                function removeActive() {
                    ul.classList.remove("active");
                    setTimeout(()=> {
                        subMenu.addEventListener("click", addActive);
                    }, 500);
                }

                const back = document.createElement("a");
                back.classList.add("back");
                back.textContent = "Назад / Каталог";
                ul.prepend(back);

                const backButton = document.querySelector(".back");

                subMenu.addEventListener("click", addActive);
                backButton.addEventListener("click", removeActive);

                const windowWidth = window.screen.width;

                if (windowWidth >= 992) {
                    subMenu.addEventListener("mouseover", ()=> {
                        mainMenu.classList.add("active");
                    });
                    ul.addEventListener("mouseout", ()=> {
                        mainMenu.classList.remove("active");
                    });
                }
            }
        }
    }
    jQuery(".news__slider").slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false,
        mobileFirst: true,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 992,
                settings: "unslick"
            }
        ]
    });
    jQuery(".partners__slider").slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 2,
        dots: true,
        arrows: false,
        mobileFirst: true,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },
            {
                breakpoint: 992,
                settings: "unslick"
            }
        ]
    });
    jQuery(function(){
        //2. Получить элемент, к которому необходимо добавить маску
        jQuery(".tel").mask("8(999) 999-9999");
    });
});




 


