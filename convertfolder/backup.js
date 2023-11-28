const dropList = document.querySelectorAll(".drop-list select"),
  fromCurrency = document.querySelector(".from select"),
  toCurrency = document.querySelector(".to select"),
  getButton = document.querySelector("form button");
const apiKey = "36dd510a6e303f89878e226a";

for (let i = 0; i < dropList.length; i++) {
  for (currency_code in country_code) {
    // Selecting USD by default as FROM currency and INR as TO currency
    let selected;
    if (i == 0) {
      selected = currency_code == "USD" ? "selected" : "";
    } else if (i == 1) {
      selected = currency_code == "INR" ? "selected" : "";
    }
    // console.log(currency_code);
    // creating option tag with passing currency code as a text and value
    let optionTag = `<option value="${currency_code}" ${selected}>${currency_code}</option>`;
    // inserting options tag inside select tag
    dropList[i].insertAdjacentHTML("beforeend", optionTag);
  }
  dropList[i].addEventListener("change", (e) => {
    loadFlag(e.target); // calling loadFlag with passing target element as an argument
  });
}

function loadFlag(element) {
  for (code in country_code) {
    if (code == element.value) {
      // if country code of country is equals to option value
      let imgTag = element.parentElement.querySelector("img"); // selecting img tag of particular drop list
      //   passing country code of a selected currency code in a img url
      imgTag.src = `https://flagsapi.com/${country_code[code]}/flat/64.png`;
    }
  }
}

window.addEventListener("load", () => {
  getExchangeRate();
});

getButton.addEventListener("click", (e) => {
  e.preventDefault(); // preventing form from submitting
  getExchangeRate();
});

const exchangeIcon = document.querySelector(".drop-list .icon");
exchangeIcon.addEventListener("click", () => {
  let tempCode = fromCurrency.value; // temporary currency code of FROM drop list
  fromCurrency.value = toCurrency.value; // passing TO currency code to FROM currency code
  toCurrency.value = tempCode; // passing temporary currency code to TO currency code
  getExchangeRate();
  loadFlag(fromCurrency); // calling loadFlag with passing select element (fromCurrency) of FROM)
  loadFlag(toCurrency); // calling loadFlag with passing select element (fromCurrency) of TO
});

function getExchangeRate() {
  const amount = document.querySelector(".amount input"),
    exchangeRateTxt = document.querySelector(".exchange-rate");
  let amountValue = amount.value;
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
