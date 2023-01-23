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
