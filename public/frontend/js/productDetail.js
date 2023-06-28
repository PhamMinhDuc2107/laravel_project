window.addEventListener("load", function () {
    let tabItems = document.querySelectorAll(".tab-item");
    let tabContent = document.querySelectorAll(".productDetail-tab-content");
    [...tabItems].forEach((item) =>
        item.addEventListener("click", function (e) {
            let tabNumber = e.target.dataset.tab;
            tabItems.forEach((el) => el.classList.remove("border-bottom-red"));
            e.target.classList.add("border-bottom-red");
            [...tabContent].forEach((item) => {
                item.classList.remove("tab-active");
                if (item.getAttribute("data-tab") === tabNumber) {
                    item.classList.add("tab-active");
                }
            });
        })
    );
    //learn-more
    let btnMore = document.querySelector(".btn-more");
    let btnCollapse = document.querySelector(".btn-collapse");
    btnMore.addEventListener("click", function (e) {
        let productTable = e.target.parentNode;
        productTable.style.height = "auto";
        productTable.style.overflow = "visible";
        btnMore.style.display = "none";
        btnCollapse.style.display = "block";
    });
    btnCollapse.addEventListener("click", function (e) {
        let productTable = e.target.parentNode;
        productTable.style.height = "390px";
        productTable.style.overflow = "hidden";
        btnMore.style.display = "block";
        btnCollapse.style.display = "none";
    });
});
