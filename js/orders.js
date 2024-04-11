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
