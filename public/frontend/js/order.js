window.addEventListener("load", function () {
    let inputs = document.querySelectorAll(".main-form-input input");
    [...inputs].forEach((item) =>
        item.addEventListener("focus", function (e) {
            e.target.classList.add("is-active-input");
            e.target.nextElementSibling.classList.add("is-active-label");
        })
    );
});
