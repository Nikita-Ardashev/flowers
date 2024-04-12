const calcs = document.querySelectorAll(".calc") ?? null;
const calculate = (c) => {
  const card = c.closest(".card-flower");
  const flowerId = card.dataset.flowerId;
  const m = c.querySelector(".minus");
  const p = c.querySelector(".plus");
  const count = c.querySelector("input");
  const newCountCookie = (value) => {
    if (getCookie(flowerId) !== undefined) {
      setCookie(flowerId, value);
    }
  };
  const newCost = (plus = true) => {
    const lastCost = card.closest("div")?.querySelector(".cost span") ?? null;
    if (lastCost !== null) {
      const firstCost = Number(card.dataset.firstCost);
      lastCost.textContent = Number(firstCost) * count.value;
      const price = document.querySelector("main .buy p b span");
      const priceInt = Number(price.textContent.trim());
      if (plus) {
        const fullprice = priceInt + firstCost;
        price.textContent = fullprice;
      } else {
        const fullprice = priceInt - firstCost;
        price.textContent = fullprice;
      }
    }
  };
  m.onclick = () => {
    if (count.value <= 1) {
      return;
    }
    count.value--;
    newCountCookie(count.value);
    newCost(false);
  };
  p.onclick = () => {
    if (count.value >= 100) {
      return;
    }
    count.value++;
    newCountCookie(count.value);
    newCost();
  };
  count.onchange = () => {
    if (count.value > 100) {
      count.value = 100;
    }
    if (count.value < 1) {
      count.value = 1;
    }
    newCountCookie(count.value);
    newCost();
  };
};

calcs.forEach(calculate);
