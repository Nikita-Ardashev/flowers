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

const orders = document.querySelectorAll(".order");

const isDelete = (order) => {
  const btn = order.querySelector(".delete input");
  btn.addEventListener("change", () => {
    if (btn.checked) {
      order.classList.add("d");
    } else {
      order.classList.remove("d");
    }
  });
};

const isEdit = (order) => {
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
  isDelete(order);
  isEdit(order);
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

const deleteBtn = document.querySelectorAll(".orders input.delete-order");

const deleteOrder = (btn) => {
  const boxLi = btn.closest("li");
  const orderId = boxLi.dataset.orderId;
  btn.addEventListener("click", async () => {
    const allOrderLength = btn.closest("ul").querySelectorAll("li").length;
    const orderBox = btn.closest(".order");
    await fetch(`/php/deleteOrder.php?id=${orderId}`, {
      method: "get",
    })
      .catch((e) => {
        console.error(e);
      })
      .finally(() => {
        if (allOrderLength <= 1) {
          orderBox.remove();
        } else {
          boxLi.remove();
        }
      });
  });
};

countBoxes.forEach(editCount);
deleteBtn.forEach(deleteOrder);

const filterTime = () => {
  const time = document.querySelector(".filter-time");
  const firstDate = time.querySelector("input.first");
  const lastDate = time.querySelector("input.last");
  const filter = () => {
    const allOrder = Array.from(document.querySelectorAll(".order li"));
    allOrder.filter((o) => {
      const orderDate = new Date(o.dataset.date);
      const first = new Date(firstDate.value);
      const last = new Date(lastDate.value);
      o.style.display = "none";
      if (first < orderDate && orderDate < last) {
        o.style.display = null;
        return o;
      }
    });
  };
  firstDate.addEventListener("change", (e) => {
    const first = new Date(e.target.value);
    if (lastDate.value !== "") {
      const last = new Date(lastDate.value);
      if (first >= last) {
        firstDate.value = new Date(last.getTime() - 86400000)
          .toISOString()
          .substring(0, 10);
      }
    } else {
      lastDate.value = new Date(first.getTime() + 86400000)
        .toISOString()
        .substring(0, 10);
    }
    filter();
  });
  lastDate.addEventListener("change", (e) => {
    const last = new Date(e.target.value);
    if (firstDate.value !== "") {
      const first = new Date(firstDate.value);
      if (last < first) {
        lastDate.value = new Date(first.getTime() + 86400000)
          .toISOString()
          .substring(0, 10);
      }
    } else {
      firstDate.value = new Date(last.getTime() - 86400000)
        .toISOString()
        .substring(0, 10);
    }
    filter();
  });
};

filterTime();

const types = document.querySelectorAll(".filter-type span");

const filterType = (type) => {
  const select = type.closest(".filter-type");
  const typeValue = type.textContent.trim();
  type.addEventListener("click", (e) => {
    const allOrder = Array.from(document.querySelectorAll(".order li"));
    allOrder.filter((o) => {
      const orderType = o.dataset.type;
      o.style.display = "none";
      if (typeValue === orderType) {
        o.style.display = null;
        return o;
      }
    });
  });
};

types.forEach(filterType);

const resetFilter = document.querySelector(".reset-filter");

resetFilter.addEventListener("click", () => {
  const allOrder = Array.from(document.querySelectorAll(".order li"));
  allOrder.forEach((o) => {
    o.style.display = null;
  });
  const type = document.querySelector(".filter-type label input");
  const time = document.querySelector(".filter-time");
  const firstTime = time.querySelector(".first");
  const lastTime = time.querySelector(".last");
  type.value = "По статусу";
  firstTime.value = "";
  lastTime.value = "";
});
