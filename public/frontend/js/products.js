//sortBar
let sortBar = document.querySelector(".sortBar-sort-text");
let sortBarItem = document.querySelectorAll(".sortBar-item");
[...sortBarItem].forEach((item) =>
    item.addEventListener("click", function (e) {
        sortBar.textContent = e.target.textContent;
    })
);
