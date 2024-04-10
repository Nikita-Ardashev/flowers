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
  m.onclick = () => {
    if (count.value <= 1) {
      return;
    }
    count.value--;
    newCountCookie(count.value);
  };
  p.onclick = () => {
    if (count.value >= 100) {
      return;
    }
    count.value++;
    newCountCookie(count.value);
  };
  count.onchange = () => {
    if (count.value > 100) {
      count.value = 100;
    }
    if (count.value < 1) {
      count.value = 1;
    }
    newCountCookie(count.value);
  };
};

calcs.forEach(calculate);
