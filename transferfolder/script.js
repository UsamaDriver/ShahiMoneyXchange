"use strict";
const amountSent = document.querySelector("#amountSent");
const transferBtn = document.querySelector("#transferMoney");
const inputContainer = document.querySelector("#convertedAmount");

const convertBtn = document.querySelector("#convertMoney");

// fetching receiver email's
const receiverEmail = document.querySelector("#receiverEmail");

let amountToSend;
let fromCurrency;
let toCurrency;

let convertedAmount;

convertBtn.addEventListener("click", async function (e) {
  e.preventDefault();
  await fetch("../operations.php?action=getSendCurrency")
    .then((response) => response.text())
    .then((data) => {
      fromCurrency = data.slice(-3);
    });

  await fetch(
    `../operations.php?action=getReceiveCurrency&receiverEmail=${receiverEmail.value}`
  )
    .then((response) => response.text())
    .then((data) => {
      toCurrency = data.slice(-3);
    });

  // conversion code here.... (replace 1 with converted value)
  const apiKey = "36dd510a6e303f89878e226a";
  let amountValue = amountSent.value;
  let url = `https://v6.exchangerate-api.com/v6/${apiKey}/latest/${fromCurrency}`;
  let exchangeRate;
  await fetch(url)
    .then((response) => response.json())
    .then((result) => {
      exchangeRate = result.conversion_rates[toCurrency];

      amountToSend = +amountSent.value * exchangeRate;
      inputContainer.value = amountToSend;
    })
    .catch(() => {
      // if user is offline or any other error occured while fetching data then catch function will run
      //   exchangeRateTxt.innerHTML = "Something Went Wrong";
    });
});
