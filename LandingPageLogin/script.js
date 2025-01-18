// TOGGLE ACCOUNT
const accountBox = document.querySelector(".account-box");
const accountButton = document.querySelector(".user");

accountButton.onclick = (e) => {
  accountBox.classList.toggle("active");
  e.preventDefault();
};

document.addEventListener("click", function (e) {
  if (!accountButton.contains(e.target) && !accountBox.contains(e.target)) {
    accountBox.classList.remove("active");
  }
});
