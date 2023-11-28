<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Currency Converter | SubuWorks</title>
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <div class="wrapper">
      <div class="blue-bg"></div>
      <div class="white-bg"></div>
      <div class="converter-wrapper">
        <h2>Currency Converter</h2>

        <div class="converter-input">
          <form action="#">
            <div class="amount">
              <p>Enter Amount</p>
              <input type="text" value="1" />
            </div>
            <div class="drop-list">
              <div class="from">
                <p>From</p>
                <div class="select-box">
                  <img src="https://flagsapi.com/US/flat/64.png" alt="flag" />
                  <select>
                    <!-- <option value="USD">USD</option> -->
                  </select>
                </div>
              </div>
              <div class="icon"><i class="fas fa-exchange-alt"></i></div>
              <div class="to">
                <p>To</p>
                <div class="select-box">
                  <img src="https://flagsapi.com/IN/flat/64.png" alt="flag" />
                  <select>
                    <!-- <option value="USD">USD</option> -->
                  </select>
                </div>
              </div>
            </div>
            <div class="exchange-rate">Getting exchange rate...</div>
            <button>Get Exchange Rate</button>
          </form>
        </div>
      </div>
    </div>
    <script src="country-list.js"></script>
    <script src="script2.js"></script>
  </body>
</html>
