(function () {
    const NOT_FOUND_SRC = `${APP_URL}/svg/no-image-placeholder-400x400.svg`;

    // window.addEventListener("DOMContentLoaded", () => {
    //     $("#preloader").fadeOut("slow");
    // });

    // chặn load khi trùng url, show loading khi chuyển trang
    document.addEventListener("turbolinks:before-visit", function (event) {
        const next = event.target.URL;
        const prev = event.data.url;
        if (prev === next || prev === next + "#") {
            return event.preventDefault();
        }

        document.querySelector("#preloader").classList.remove("hidden");
    });

    // ẩn loading khi loaded
    document.addEventListener("turbolinks:load", function () {
        document.querySelector("#preloader").classList.add("hidden");
    });

    // khi lazyloaded thì bỏ hiệu ứng img loading
    document.addEventListener("lazyloaded", function (e) {
        e.target.parentElement.classList.remove("loading");
    });

    // khi lazy error thì set ảnh mặc định
    document.addEventListener(
        "error",
        function (e) {
            if (e.target.nodeName !== "IMG") return;

            e.target.classList.add("none");
            e.target.setAttribute("srcset", NOT_FOUND_SRC);
        },
        true
    );

    // active link
    document.addEventListener("turbolinks:load", function (event) {
        const defaultUrl = window.location.origin + "/";
        let url = event.target.location.href;
        url = url === defaultUrl ? defaultUrl + "home" : url;
        const links = document.querySelectorAll(`[href='${url}']`);

        if (!links.length) return;

        links.forEach(function (link) {
            if (link.parentNode.tagName === "LI") {
                link.parentNode.classList.add("active");
            } else {
                link.classList.add("active");
            }
        });
    });

    // Compatibility with Turbolinks 5
    var fbRoot;
    function saveFacebookRoot() {
        const temp = document.querySelector("#fb-root");
        if (temp) {
            temp.querySelector("[data-turbolinks-no-cache]")?.remove();
            fbRoot = temp;
            temp.remove();
        }
    }
    function restoreFacebookRoot() {
        if (fbRoot != null) {
            const temp = document.querySelector("#fb-root");
            if (temp) {
                temp.replaceWith(fbRoot);
            } else {
                document.querySelector("body").append(fbRoot);
            }
        }
        if (typeof FB !== "undefined" && FB !== null) {
            // Instance of FacebookSDK
            FB.XFBML.parse();
        }
    }
    document.addEventListener("turbolinks:request-start", saveFacebookRoot);
    document.addEventListener("turbolinks:load", restoreFacebookRoot);
})();
