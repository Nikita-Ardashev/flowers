const dropdowns = document.querySelectorAll(".dropdown");
const dropdown = (d) => {
  const select = d.querySelector("label > input");
  const itemsBox = d.querySelector(".items");
  const items = itemsBox.querySelectorAll("span");
  const notView = () => {
    select.classList.remove("active");
    itemsBox.style.display = null;
    document.removeEventListener("mouseup", notView);
  };
  select.onclick = () => {
    select.classList.add("active");
    itemsBox.style.display = "flex";
    document.addEventListener("mouseup", notView);
  };
  items.forEach((i) => {
    i.onclick = (e) => {
      select.value = e.currentTarget.textContent.trim();
      select.style.color = null;
      notView();
    };
  });
};

dropdowns.forEach(dropdown);

const viewModalBoxes = (id) => {
  const cardProps =
    document.querySelector(`.card[data-card-id='${id}']`) ?? null;
  const view = (className) => {
    const modal = document.querySelector(`.${className}`);
    const modalBox = modal.closest(".modal-box");
    const closeBtns = modal.querySelectorAll(".modal input.close");
    const notView = () => {
      modalBox.style.display = null;
    };
    modalBox.style.display = "flex";
    modalBox.onmousedown = (e) => {
      const t = e.target;
      const ct = e.currentTarget;
      if (t === ct) {
        notView();
      }
    };
    closeBtns.forEach((b) => {
      b.addEventListener("click", notView);
    });
  };
};

const openModal = (btn) => {
  const id = btn.closest(".card-flower").dataset.flowerId;
  viewModalBoxes(id);
};

const orders = document.querySelectorAll(".order");

const deleteOrder = (order) => {
  const btn = order.querySelector(".delete input");
  btn.addEventListener("change", () => {
    if (btn.checked) {
      order.classList.add("d");
    } else {
      order.classList.remove("d");
    }
  });
};

const editOrder = (order) => {
  const btn = order.querySelector(".edit input");
  const editCost = order.querySelectorAll('input[type="number"]');
  const setRead = (isRead, box) => {
    if (isRead) {
      box.readOnly = true;
    } else {
      box.readOnly = false;
    }
  };
  btn.addEventListener("change", () => {
    editCost.forEach((c) => {
      if (btn.checked) {
        setRead(false, c);
      } else {
        setRead(true, c);
      }
    });
  });
};

const orderAdmin = (order) => {
  deleteOrder(order);
  editOrder(order);
};

orders.forEach(orderAdmin);

const countBoxes = document.querySelectorAll('.orders input[type="number"]');

const editCount = (count) => {
  const lastcost = count.closest(".order").querySelector(".last-cost span");
  const orderId = count.closest("li").dataset.orderId;
  const cost = count.closest("p").querySelector("span");
  const firstCount = Number(count.value);
  const firstCost = Number(count.dataset.cost);
  let lastcount = firstCount;
  count.addEventListener("change", async (e) => {
    const t = e.target;
    if (t.value <= 0) {
      t.value = firstCount;
    }
    if (t.value > 100) {
      t.value = 100;
    }
    cost.textContent = firstCost * t.value;
    const lastcostValue = Number(lastcost.textContent.trim());
    const gap = Math.abs(t.value - lastcount) * firstCost;
    if (t.value / lastcount > 1) {
      if (t.value - lastcount >= 2) {
        lastcost.textContent = lastcostValue + gap;
      } else {
        lastcost.textContent = lastcostValue + firstCost;
      }
    } else if (t.value / lastcount < 1) {
      if (t.value - lastcount <= -2) {
        lastcost.textContent = lastcostValue - gap;
      } else {
        lastcost.textContent = lastcostValue - firstCost;
      }
    }
    lastcount = t.value;
    await fetch(`/php/editOrder.php?id=${orderId}&count=${t.value}`, {
      method: "get",
    }).catch((e) => console.error(e));
  });
};

countBoxes.forEach(editCount);
