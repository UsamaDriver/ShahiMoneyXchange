const api_key = "36dd510a6e303f89878e226a";

const populate = async (currency) => {
  let myStr = "";
  const api_url = `https://v6.exchangerate-api.com/v6/${api_key}/latest/${currency}`;
  let response = await fetch(api_url);
  let rJson = await response.json();
  // console.log(rJson["conversion_rates"]);
  document.querySelector(".output").style.display = "block";

  let counter = 1;

  for (let key of Object.keys(rJson["conversion_rates"])) {
    myStr += `
                    <tr>
                        <td>${key}</td>
                        <td>${rJson["conversion_rates"][key]}</td>
                    </tr>
            `;
  }

  const tableBody = document.querySelector("tbody");
  tableBody.innerHTML = myStr;
};

const btn = document.querySelector(".btn");
btn.addEventListener("click", (e) => {
  e.preventDefault();
  //   console.log("Button is Clicked");
  const Currency = document.querySelector('select[name="currency"]').value;
  console.log(Currency);
  populate(Currency);
});
