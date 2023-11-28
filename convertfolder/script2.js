const fromCurrency = document.querySelector(".from select"),
  dropList = document.querySelector(".drop-list select"),
  toCurrency = document.querySelector(".to select"),
  getButton = document.querySelector("form button"),
  exchangeIcon = document.querySelector(".drop-list .icon"),
  fromAmount = document.querySelector(".amount input");
apiKey = "36dd510a6e303f89878e226a";

//   Fetching currency symbols from api

async function loadCountrySymbols() {
  const api_url = `https://v6.exchangerate-api.com/v6/${apiKey}/codes`;
  const result = await fetch(api_url);
  const data = await result.json();
  //   console.log(data.supported_codes);
  let symbolList = data.supported_codes;
  showData(symbolList);
}

document.addEventListener("DOMContentLoaded", () => {
  loadCountrySymbols();
});

function showData(symbols) {
  let symbolsOnly = Object.values(symbols);
  //   console.log(symbolsOnly);
  let html = "";
  symbolsOnly.forEach((symbol) => {
    // console.log(symbol[0]);
    html += `<option data-id="${symbol[0].slice(0, 2)}">${symbol[0]}</option>`;
  });
  fromCurrency.innerHTML = html;
  fromCurrency.querySelectorAll("option").forEach((option) => {
    if (option.dataset.id == "US") option.selected = "selected";
  });

  fromCurrency.addEventListener("change", (e) => {
    loadFlag(e.target);
  });

  toCurrency.innerHTML = html;
  toCurrency.querySelectorAll("option").forEach((option) => {
    if (option.dataset.id == "IN") option.selected = "selected";
  });

  toCurrency,
    addEventListener("change", (e) => {
      loadFlag(e.target);
    });
}

function loadFlag(element) {
  for (code in country_flags) {
    // console.log(flags);
    if (code == element.value) {
      let imgTag = element.parentElement.querySelector("img");
      imgTag.src = `https://flagsapi.com/${country_flags[code]}/flat/64.png`;
    }
  }
}

// Validate the amount to be converted
fromAmount.addEventListener("keyup", function () {
  let amount = Number(this.value);
  if (!amount) fromAmount.style.borderColor = "#de3f44";
  else fromAmount.style.borderColor = "#675afe";
});

// Convert 'from country currency' to 'to country currency'
getButton.addEventListener("click", (e) => {
  e.preventDefault();
  getExchangeRate();
});

exchangeIcon.addEventListener("click", () => {
  let tempCode = fromCurrency.value;
  fromCurrency.value = toCurrency.value;
  toCurrency.value = tempCode;
  getExchangeRate();
  loadFlag(fromCurrency);
  loadFlag(toCurrency);
});

// get the converted data from the API
function getExchangeRate() {
  const exchangeRateTxt = document.querySelector(".exchange-rate");
  let amountValue = fromAmount.value;
  //    if user don't enter any value or enter 0 than we'll put value 1 by default in the input field
  if (amountValue == "" || amountValue == 0) {
    amount.value = "1";
    amountValue = 1;
  }
  exchangeRateTxt.innerHTML = "Getting exchange rate...";
  let url = `https://v6.exchangerate-api.com/v6/${apiKey}/latest/${fromCurrency.value}`;
  //   fetching api response and returning it with passing into js obj and in another then method receiving that obj
  fetch(url)
    .then((response) => response.json())
    .then((resut) => {
      let exchangeRate = resut.conversion_rates[toCurrency.value];
      //   console.log(exchangeRate);
      let totalExchangeRate = (amountValue * exchangeRate).toFixed(2);
      //   console.log(totalExchangeRate);
      exchangeRateTxt.innerHTML = `${amountValue} ${fromCurrency.value} = ${totalExchangeRate} ${toCurrency.value}`;
    })
    .catch(() => {
      // if user is offline or any other error occured while fetching data then catch function will run
      exchangeRateTxt.innerHTML = "Something Went Wrong";
    });
}
