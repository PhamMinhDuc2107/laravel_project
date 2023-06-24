let headerLogin = document.querySelector(".header-login");
let inforManage = document.querySelector(".infor-manage");
headerLogin.addEventListener("click", function (e) {
    inforManage.classList.toggle("active-infor");
    let height = inforManage.scrollHeight;
    inforManage.style.height = `${height}px`;
    if (!inforManage.classList.contains("active-infor")) {
        inforManage.style.height = `0px`;
    }
});
