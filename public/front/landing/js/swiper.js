var interleaveOffset = 0.5;
var autoplayDelay = 3000;
var swiperOptions = {
    loop: true,
    speed: 500,
    autoplay: {
        delay: autoplayDelay,
    },
    grabCursor: true,
    watchSlidesProgress: true,
    mousewheelControl: true,
    keyboardControl: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    on: {
        progress: function () {
            var swiper = this;
            for (var i = 0; i < swiper.slides.length; i++) {
                var slideProgress = swiper.slides[i].progress;
                var innerOffset = swiper.width * interleaveOffset;
                var innerTranslate = slideProgress * innerOffset;
                swiper.slides[i].querySelector(".slide-inner").style.transform =
                    "translate3d(" + innerTranslate + "px, 0, 0)";
            }
        },
        touchStart: function () {
            var swiper = this;
            for (var i = 0; i < swiper.slides.length; i++) {
                swiper.slides[i].style.transition = "";
            }
        },
        setTransition: function (speed) {
            var swiper = this;
            for (var i = 0; i < swiper.slides.length; i++) {
                swiper.slides[i].style.transition = speed + "ms";
                swiper.slides[i].querySelector(
                    ".slide-inner"
                ).style.transition = speed + "ms";
            }
        },
        slideChangeTransitionEnd: function () {
            startProgressBar(this.realIndex);
        },
        init: function () {
            startProgressBar(this.realIndex);
        },
    },
};

var swiper = new Swiper(".swiper-container", swiperOptions);

document.querySelectorAll(".slide-img").forEach(function (element) {
    element.addEventListener("click", function () {
        console.log(this.getAttribute("data-slide"));

        var slideIndex = parseInt(this.getAttribute("data-slide"), 10);
        swiper.slideTo(slideIndex + swiper.loopedSlides, 500);
    });
});
function startProgressBar(slideIndex) {
    document.querySelectorAll(".progress-bar").forEach((bar) => {
        bar.classList.remove("active");
        bar.style.width = "0";
        bar.style.opacity = "0";
    });

    var activeProgressBar = document.getElementById(`progress-${slideIndex}`);

    if (activeProgressBar) {
        activeProgressBar.style.opacity = "1";
        activeProgressBar.classList.add("active");
        activeProgressBar.style.animationDuration = `${swiperOptions.autoplay.delay}ms`;
    }
}
