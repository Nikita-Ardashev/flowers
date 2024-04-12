const enTypes = [
  "birthday",
  "mothersDay",
  "MarchDay",
  "roses",
  "gypsophila",
  "pions",
  "hydrangeas",
  "tulips",
  "upTo1500",
  "upTo3000",
  "postcards",
  "heliumBaloons",
  "candies",
  "bouquetsBoxes",
  "pottedFlower",
  "boxesAndBaskets",
];

const ruTypes = [
  "День рождения",
  "День Матери",
  "8 марта",
  "Розы",
  "Гипсофила",
  "Пионы",
  "Гортензии",
  "Тюльпаны",
  "Букеты до 1500 руб",
  "Букеты от 1500 до 3000 руб",
  "Открытки",
  "Гелиевые шары",
  "Сладкие наборы/конфеты",
  "Букеты в коробках",
  "Горшечный цветок",
  "Ящики и корзины",
];

const url = new URL(window.location.href);
if (url.searchParams.has("type")) {
  const type = url.searchParams.get("type");
  const title = document.querySelector("main h1");
  const iType = enTypes.indexOf(type);
  title.textContent += ` - ${ruTypes[iType]}`;
}
