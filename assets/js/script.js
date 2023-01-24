const params = new URLSearchParams(window.location.search);
const filterId = params.get("f");

function removeParamsFromUrlAndRedirect() {
  let newUrl = window.location.href.replace("max_price", "");
  newUrl = newUrl.replace("min_price", "");
  newUrl = newUrl.replace("f", "");

  window.location.href = newUrl;
}

if (filterId) {
  const filter = document.getElementById(`filtro${filterId}`);
  filter.classList.add("active");
  filter.addEventListener("click", removeParamsFromUrlAndRedirect);
}

// ----------------------

function watchAddCartBtn([{ isIntersecting }]) {
  const floatingBtn = document.querySelector(".floating-btn");

  if (!isIntersecting) floatingBtn.classList.remove("d-none");
  else floatingBtn.classList.add("d-none");
}

const btn = document.querySelector(".single_add_to_cart_button");
if (btn) {
  const observer = new IntersectionObserver(watchAddCartBtn);
  observer.observe(btn);
}
