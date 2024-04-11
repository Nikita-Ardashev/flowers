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

document.addEventListener("DOMContentLoaded", () => {
  const arrCookie = document.cookie.split(";");
  const arrFlowers = arrCookie.filter(
    (f) => f.split("-")[0].trim() === "flower"
  );
  basket.textContent = arrFlowers.length;
  const trashs = document.querySelectorAll(".items .trash");
  const deleteItem = (t) => {
    t.onclick = () => {
      const flower = t.closest(".card-flower");
      const flowerId = flower.dataset.flowerId;
      flower.remove();
      deleteCookie(flowerId);
      basket.textContent = Number(basket.textContent) - 1;
    };
  };

  trashs.forEach(deleteItem);
});

const postBuy = async () => {
  await fetch("/php/buy.php", {
    method: "post",
  });
};
