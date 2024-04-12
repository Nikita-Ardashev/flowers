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
