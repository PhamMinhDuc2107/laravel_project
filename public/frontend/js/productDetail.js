window.addEventListener("load", function () {
    let iconPlus = document.querySelector(".icon-plus");
    let iconMinus = document.querySelector(".icon-minus");
    let number = document.querySelector(".viewProduct-number");
    let numberContent = +number.textContent;

    iconMinus.addEventListener("click", function () {
        if (numberContent > 1) {
            numberContent -= 1;
            number.textContent = numberContent;
        } else {
            return numberContent;
        }
    });
    iconPlus.addEventListener("click", function () {
        numberContent += 1;
        number.textContent = numberContent;
    });
    //tab
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
});
