const toBasketBtns = document.querySelectorAll(".to-basket");
const headerBasket = document.querySelector("header .buy span");
const toBasket = (b) => {
  b.onclick = () => {
    const card = b.closest(".card-flower");
    const flowerId = card.dataset.flowerId;
    const count = card.querySelector(".calc input")?.value ?? 1;
    if (getCookie(flowerId) === undefined) {
      headerBasket.textContent = Number(headerBasket.textContent) + 1;
    }
    setCookie(flowerId, count);
  };
};

toBasketBtns.forEach(toBasket);
