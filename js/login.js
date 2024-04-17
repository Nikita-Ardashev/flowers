const form = document.querySelector(".form");
const submit = form.querySelector('input[type="submit"]');
const errorBox = form.querySelector(".error");
const login = async (e) => {
  e.preventDefault();
  const email = form.querySelector('.field input[name="email"]').value;
  const password = form.querySelector('.field input[name="password"]').value;
  const formData = new FormData();
  formData.append("email", email);
  formData.append("password", password);
  await fetch("/php/login.php", {
    method: "post",
    body: formData,
  })
    .then((res) => {
      return res.text();
    })
    .then((r) => {
      if (!!!r) {
        errorBox.style.opacity = 1;
      } else {
        errorBox.style.opacity = null;
        window.location.replace("/");
      }
    })
    .catch((e) => {
      errorBox.style.opacity = 1;
      console.error(e);
    });
};

submit.addEventListener("click", login);
