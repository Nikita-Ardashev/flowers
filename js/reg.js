const form = document.querySelector(".form");
const fields = form.querySelectorAll(".field input");
const email = form.querySelector('.field input[name="email"]');
const phone = form.querySelector('.field input[name="tel"]');
const password = form.querySelector('.field input[name="password"]');
const error = form.querySelector(".error");

const submit = form.querySelector('input[type="submit"]');

function toSendValidation() {
  const filetrEmail = /^[\w\d-.]+@([\w\d-]+\.)+[\w\d]+$/;
  const filetrPhone = /^(\+)?\d{1,3}\d{7,10}$/;
  const filterPassword = /^\S{6}$/;
  function validation(field, filter) {
    if (field.value.trim() !== "") {
      let validBoolean = filter.test(String(field.value).toLowerCase().trim());
      field.classList.remove("error-validation");
      field.classList.remove("void-field");
      if (!validBoolean) {
        setTimeout(() => {
          field.classList.add("error-validation");
        }, 1);
      }
      return validBoolean;
    } else {
      return false;
    }
  }

  let success = true;

  fields.forEach((field) => {
    if (field.value.trim() === "") {
      field.classList.remove("void-field");
      setTimeout(() => {
        field.classList.add("void-field");
      }, 1);
      success = false;
    }
  });
  const isValidEmail = validation(email, filetrEmail);
  const isValidPhone = validation(phone, filetrPhone);
  const isValidPassword = validation(password, filterPassword);
  if (!isValidEmail || !isValidPhone || !isValidPassword) {
    success = false;
  }
  return success;
}

const register = async (e) => {
  e.preventDefault();
  if (toSendValidation()) {
    const formData = new FormData();
    formData.append("email", email.value);
    formData.append("tel", phone.value);
    formData.append("password", password.value);
    await fetch("/php/reg.php", {
      method: "post",
      body: formData,
    })
      .then((res) => res.text())
      .then((r) => {
        if (r.trim() === "") {
          window.location.replace("/");
        }
        error.style.opacity = 1;
        error.textContent = r;
      })
      .catch((e) => {
        console.error(e);
        return;
      });
    return;
  }
};

submit.addEventListener("click", register);
