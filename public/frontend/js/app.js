// "use strict";
// header-category
window.addEventListener("load", function () {
  let headerCategory = document.querySelector(".header-category");
  let headerCategoryList = document.querySelector(".header-category-list");
  //cartList LocalStorage
  let cartList = JSON.parse(localStorage.getItem("cartList")) || [];
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
  // viewProduct

  let iconViewProduct = document.querySelectorAll(".icon-viewProduct");
  [...iconViewProduct].forEach((item) =>
    item.addEventListener("click", function (e) {
      let img = e.target.parentNode.previousElementSibling.getAttribute("src");
      let title =
        e.target.parentNode.parentNode.parentNode.parentNode.firstElementChild
          .nextElementSibling.firstElementChild.nextElementSibling.textContent;
      let brand =
        e.target.parentNode.parentNode.parentNode.parentNode.firstElementChild
          .nextElementSibling.firstElementChild.textContent;
      let priceNew =
        e.target.parentNode.parentNode.parentNode.parentNode.firstElementChild
          .nextElementSibling.firstElementChild.nextElementSibling
          .nextElementSibling.nextElementSibling.textContent;
      let priceOld =
        e.target.parentNode.parentNode.parentNode.parentNode.firstElementChild
          .nextElementSibling.firstElementChild.nextElementSibling
          .nextElementSibling.textContent;
      let template = `<div class="viewProduct">
      <div class="viewProduct-overplay"></div>
      <div class="viewProduct-container">
    <i class="fa fa-close viewProduct-close"></i>
    <div class="viewProduct-left">
      <div class="viewProduct-img">
        <img src="${img}" alt="" />
      </div>
      <div class="viewProduct-list-img">
        <i class="fa fa-angle-left icon-prev"></i>
        <img src="${img}" alt="" class="viewProducts-item-img active-border" data-numberImg ="0"/>
        <img src="./public/images/S9-2.webp" alt="" class="viewProducts-item-img" data-numberImg ="1"/>
        <img src="./public/images/S9-3.webp" alt="" class="viewProducts-item-img" data-numberImg ="2"/>
        <i class="fa fa-angle-right icon-next"></i>
      </div>
    </div>
    <div class="viewProduct-right">
      <a href="">
        <h2 class="viewProduct-title">${title}</h2>
      </a>
      <span class="viewProduct-subtitle">
        Thương hiệu: ${brand} | Tình trạng:
        <span>Còn hàng</span>
      </span>
      <div class="viewProduct-price">
        <span class="viewProduct-price-new"> ${priceNew}</span>
        <span class="viewProduct-price-old"> ${priceOld}</span>
      </div>
      <div class="viewProduct-text">
        <p>
          Đặc điểm nổi bật của Samsung Galaxy S9+ 128GB Samsung Galaxy S9
          Plus128GB, siêu phẩm smartphone hàng đầu trong thế giới Android đã
          ra mắt với đây là một cái
        </p>
      </div>
      <div class="viewProduct-amount">
        <i class="fa fa-minus icon-minus"></i>
        <span class="viewProduct-number">1</span>
        <i class="fa fa-plus icon-plus"></i>
      </div>
      <button type="submit" class="viewProduct-btn">
        Thêm vào giỏ hàng
      </button>
    </div>
  </div>
</div>`;

      document.body.insertAdjacentHTML("beforeend", template);
      let productImg = document.querySelector(".viewProduct-img img");
      let viewProductListImg = document.querySelectorAll(
        ".viewProducts-item-img"
      );
      [...viewProductListImg].forEach((item) =>
        item.addEventListener("click", handlerChangeImg)
      );
      // handlerClickImg
      function handlerChangeImg(e) {
        [...viewProductListImg].forEach((item) =>
          item.classList.remove("active-border")
        );
        let srcImg = e.target.getAttribute("src");
        productImg.setAttribute("src", srcImg);
        e.target.classList.add("active-border");
      }
      // clickButtonChangeImg
      let iconNext = document.querySelector(".icon-next");
      let iconPrev = document.querySelector(".icon-prev");
      let viewProduct = document.querySelector(".viewProduct");
    })
  );
  // remove ViewProduct
  document.body.addEventListener("click", function (e) {
    //amount

    if (e.target.matches(".icon-minus")) {
      console.log("e");
      let number = +e.target.nextElementSibling.textContent;
      console.log(number);
      if (number <= 0) {
        number = 0;
      } else {
        number -= 1;
        e.target.nextElementSibling.textContent = number;
      }
    }
    if (e.target.matches(".icon-plus")) {
      console.log("e");

      let number = +e.target.previousElementSibling.textContent;
      number += 1;
      e.target.previousElementSibling.textContent = number;
    }
    if (e.target.matches(".viewProduct-close")) {
      const viewProduct = e.target.parentNode.parentNode;
      viewProduct.parentNode.removeChild(viewProduct);
    } else if (e.target.matches(".viewProduct-overplay")) {
      let viewProduct = e.target.parentNode;

      viewProduct.parentNode.removeChild(viewProduct);
    }
    // //click viewProductBtn save localStorage

    if (e.target.matches(".viewProduct-btn")) {
      let number =
        e.target.previousElementSibling.firstElementChild.nextElementSibling
          .textContent;
      let priceNew =
        e.target.previousElementSibling.previousElementSibling
          .previousElementSibling.firstElementChild.textContent;
      let title =
        e.target.previousElementSibling.previousElementSibling
          .previousElementSibling.previousElementSibling.previousElementSibling
          .firstElementChild.textContent;
      let img =
        e.target.parentNode.parentNode.firstElementChild.nextElementSibling
          .firstElementChild.firstElementChild;
      let imgSrc = img.getAttribute("src");
      let cartItem = {
        src: `${imgSrc}`,
        title: `${title}`,
        price: `${priceNew}`,
        number: `${number}`,
      };
      cartList.push(cartItem);
      localStorage &&
        localStorage.setItem("cartList", JSON.stringify(cartList));
      let viewProduct = e.target.parentNode.parentNode.parentNode;
      console.log(viewProduct);
      viewProduct.parentNode.removeChild(viewProduct);
      // headerCartText
      headerCartText.textContent =
        localStorage.length > 0
          ? JSON.parse(localStorage.getItem("cartList")).length
          : 0;
    }
  });
  headerCartText.textContent =
    localStorage.length > 0
      ? JSON.parse(localStorage.getItem("cartList")).length
      : 0;
  //cartMain

  let cartMainList = document.querySelector(".cartMain-list");
  if (Array.isArray(cartList) && cartList.length > 0) {
    [...cartList].forEach((item) => {
      let price = parseFloat(("" + item.price).slice(0, -1));
      let number = item.number;
      let total = price * number;
      createCartItem(item.src, item.title, item.price, item.number, total);
    });
  }

  // create CartItem
  function createCartItem(img, title, price, number, total) {
    let cartItem = ` <li class="cartMain-item">
        <div class="cartMain-item-info">
         <img src="${img}" alt="" class="cartMain-info-img">
          <div class="cartMain-info-content">
      <span class="cartMain-info-name">${title}</span>
      <span class="cartMain-info-remove">Xóa</span>
        </div>
        </div>
    <span class="cartMain-item-price">${price}</span>
    <div class="cartMain-item-amount">
      
      <i class="fa fa-minus cartMain-icon-minus"></i>
     <span class="viewProduct-number">${number}</span>
      <i class="fa fa-plus cartMain-icon-plus"></i>
 
    </div>
    <div class="cartMain-item-total">
      <span class="cartMain-total-number">${total}0.000đ</span>
    </div>
    </li>`;
    cartMainList.insertAdjacentHTML("beforeend", cartItem);
  }
  let cartTotal = document.querySelectorAll(".cartMain-total-number")
    ? document.querySelectorAll(".cartMain-total-number")
    : "";
  let cartMainMoney = document.querySelector(".cartMain-money-total");
  let total = 0;
  updateTotalMoney();
  function updateTotalMoney() {
    if (cartTotal.length > 0) {
      [...cartTotal].forEach((item) => {
        let number = parseFloat(item.textContent.slice(0, -1));
        total += number;
        console.log(total);
        cartMainMoney.textContent = `${total}0.000đ`;
      });
    } else {
      cartMainMoney.textContent = `0đ`;
    }
  }
  // remove CartItem
  cartMainList.addEventListener("click", function (e) {
    if (e.target.matches(".cartMain-info-remove")) {
      //remove cartItem in DOM
      let money = e.target.parentNode.parentNode.nextElementSibling.textContent;
      let numberMoney = parseFloat(money.slice(0, -1));
      let cartItem = e.target.parentNode.parentNode.parentNode;
      cartItem.parentNode.removeChild(cartItem);
      //remove cartItem in localStorage
      let cartName = e.target.previousElementSibling.textContent;
      let index = cartList.filter((item) => {
        item.title === cartName;
      });
      cartList.splice(index, 1);
      localStorage &&
        localStorage.setItem("cartList", JSON.stringify(cartList));
      headerCartText.textContent =
        localStorage.length > 0
          ? JSON.parse(localStorage.getItem("cartList")).length
          : 0;
    }
    // cartMain-icon-minus
    if (e.target.matches(".cartMain-icon-minus")) {
      let number = +e.target.nextElementSibling.textContent;
      number--;
      if (number < 1) {
        number = 1;
      }
      e.target.nextElementSibling.textContent = number;
      let price = e.target.parentNode.previousElementSibling.textContent;
      let multiply = parseFloat(price.slice(0, -1)) * parseInt(number);
      console.log(multiply);
      let total = e.target.parentNode.nextElementSibling.firstElementChild;
      total.textContent = `${multiply}0.000đ`;
    }
    // cartMain-icon-plus
    if (e.target.matches(".cartMain-icon-plus")) {
      let number = +e.target.previousElementSibling.textContent;
      number++;
      e.target.previousElementSibling.textContent = number;
      let price = e.target.parentNode.previousElementSibling.textContent;
      let multiply = parseFloat(price.slice(0, -1)) * parseInt(number);
      let total = e.target.parentNode.nextElementSibling.firstElementChild;
      total.textContent = `${multiply}0.000đ`;
    }
  });
});
// newToggleMenu
$(document).ready(function () {
  $(".blog-icon").click(function () {
    $(".menu-2").toggle(500);
  });
  $(".aside-menu-2").click(function () {
    $(".menu-3").toggle(500);
  });
});
