const basket = document.querySelector("header .buy span");
function getCookie(name) {
  let matches = document.cookie.match(
    new RegExp(
      "(?:^|; )" +
        name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, "\\$1") +
        "=([^;]*)"
    )
  );
  return matches ? decodeURIComponent(matches[1]) : undefined;
}
function setCookie(name, value, options = {}) {
  options = {
    path: "/",
    ...options,
  };
  if (options.expires instanceof Date) {
    options.expires = options.expires.toUTCString();
  }
  let updatedCookie =
    encodeURIComponent(name) + "=" + encodeURIComponent(value);
  for (let optionKey in options) {
    updatedCookie += "; " + optionKey;
    let optionValue = options[optionKey];
    if (optionValue !== true) {
      updatedCookie += "=" + optionValue;
    }
  }
  document.cookie = updatedCookie;
}

function deleteCookie(name) {
  setCookie(name, "", {
    "max-age": -1,
  });
}

const deleteItem = (b) => {
  const flower = b.closest(".card-flower") ?? b;
  const cost = Number(flower.querySelector(".info .cost span").textContent);
  const flowerId = flower.dataset.flowerId;
  basket.textContent = Number(basket.textContent) - 1;
  const price = document.querySelector("main .buy p b span");
  const fullprice = Number(price.textContent) - cost;
  price.textContent = fullprice;
  flower.remove();
  deleteCookie(flowerId);
};

const searchItem = async (box) => {
  const input = box.querySelector('input[type="text"]');
  const btn = box.querySelector("button");
  const search = () => {
    const value = input.value.trim();
    if (value === "") return;
    window.location.href =
      window.location.origin + "/views/catalog.php?search=" + value;
  };
  btn.onclick = search;
  document.addEventListener("keypress", (e) => {
    if (e.code === "Enter") {
      search();
    }
  });
};

document.addEventListener("DOMContentLoaded", () => {
  const searchBox = document.querySelector("header .search");
  searchItem(searchBox);
  const arrCookie = document.cookie.split(";");
  const arrFlowers = arrCookie.filter(
    (f) => f.split("-")[0].trim() === "flower"
  );
  basket.textContent = arrFlowers.length;
  const trashs = document.querySelectorAll(".items .trash");

  trashs.forEach((t) => {
    t.onclick = () => {
      deleteItem(t);
    };
  });
});

const postBuy = async () => {
  await fetch("/php/buy.php", {
    method: "get",
  });
  const flowers = document.querySelectorAll(".card-flower");
  flowers.forEach((f) => {
    deleteItem(f);
  });
};
