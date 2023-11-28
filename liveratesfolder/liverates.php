<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Currency Live Rates | SubuWorks</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>

    <div class="container">
      <h1>Choose Your Currency To Check the Live Rates</h1>
      <form action="" method="GET">
        <!-- <label for="quantity">Choose a Quantity : </label>
        <input
          type="number"
          class="curinput"
          name="quantity"
          min="1"
          max="10"
        /> -->
        <label for="currency">Choose a Currency : </label>
        <select name="currency">
          <option value="INR">Indian Rupees</option>
          <option value="USD">US Dollar</option>
        </select>
        <button type="submit" class="btn">Submit</button>

        <!-- Show Data in Table -->
      </form>
      <div class="output">
        <h2>Here is your Converted values in different values</h2>
        <table>
          <thead>
            <tr>
              <th>Currency Code</th>
              <th>Currency Value</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
    <script src="script.js"></script>
  </body>
</html>
