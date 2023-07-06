// "use strict";
// header-category
window.addEventListener("load", function () {
    let headerCategory = document.querySelector(".header-category");
    let headerCategoryList = document.querySelector(".header-category-list");
    //headerCartText
    let headerCartText = document.querySelector(".header-cart-text");
    let height = headerCategoryList.scrollHeight;
    headerCategory.addEventListener("click", function (e) {
        headerCategoryList.classList.toggle("is-active");
        headerCategoryList.style.height = `${height}px`;
        if (!headerCategoryList.classList.contains("is-active")) {
            headerCategoryList.style.height = "0px";
        }
    });

    // tooltip
    let iconToolTip = document.querySelectorAll(".overplay-product-icon");
    [...iconToolTip].forEach((item) =>
        item.addEventListener("mouseenter", function (e) {
            let title = e.target.dataset.tooltip;
            const tooltipDiv = document.createElement("div");
            tooltipDiv.className = "tooltip-text";
            tooltipDiv.textContent = title;
            document.body.appendChild(tooltipDiv);
            let cords = e.target.getBoundingClientRect();
            let { top, left, width } = cords;
            let tooltipHeight = tooltipDiv.offsetHeight;
            tooltipDiv.style.left = `${left - width / 2}px`;
            tooltipDiv.style.top = `${top - tooltipHeight - 10}px`;
        })
    );
    [...iconToolTip].forEach((item) =>
        item.addEventListener("mouseleave", function (event) {
            const tooltip = document.querySelector(".tooltip-text");
            if (!tooltip) return;
            tooltip.parentNode.removeChild(tooltip);
        })
    );
    let clickScrollTop = document.querySelector(".click-top");
    clickScrollTop.addEventListener("click", function (e) {
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    });
});
