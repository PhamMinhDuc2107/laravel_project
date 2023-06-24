window.addEventListener("load", function () {
    const imageCover = document.querySelector(".images-cover");
    imageCover.addEventListener("mousemove", handleHoverImage);
    const imageWrapper = document.querySelector(".image-wrapper");
    let imageWrapperWidth = imageWrapper.offsetWidth;
    let imageWrapperHeight = imageWrapper.offsetHeight;
    const image = document.querySelector(".images-hoverZoom");
    function handleHoverImage(e) {
        const pX = e.pageX;
        const pY = e.pageY;
        image.style = "width: auto; max-height: unset";
        let imageWidth = image.offsetWidth;
        let imageHeight = image.offsetHeight;
        let spaceX = (imageWidth / 2 - imageWrapperWidth) * 2;
        let spaceY = (imageHeight / 2 - imageWrapperHeight) * 2;
        imageWidth = imageWidth + spaceX;
        imageHeight = imageHeight + spaceY + spaceY;
        let ratioX = imageWidth / imageWrapperWidth / 2;
        let ratioY = imageHeight / imageWrapperHeight / 2;
        let x = (pX - imageWrapper.offsetLeft) * ratioX;
        let y = (pY - imageWrapper.offsetTop) * ratioY;
        image.style = `left: ${-x}px; top: ${-y}px; width: auto; height: auto; max-height: unset; transform: none;`;
    }
    imageCover.addEventListener("mouseleave", handleLeaveImage);
    function handleLeaveImage() {
        image.style = "";
    }
    let imagesList = document.querySelectorAll(
        ".productDetail-images-item img"
    );
    let boxImage = document.querySelectorAll(".productDetail-images-item");
    [...imagesList].forEach((item) =>
        item.addEventListener("click", function (e) {
            [...boxImage].forEach((item) =>
                item.classList.remove("active-detail")
            );
            e.target.parentNode.classList.add("active-detail");
            let src = e.target.getAttribute("src");
            image.setAttribute("src", src);
        })
    );
});
