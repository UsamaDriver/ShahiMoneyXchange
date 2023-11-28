const viewTransaction = [
  {
    userName: "Subu",
    receiverName: "Sahid Midda",
    userEmail: "subu.chhat@gmail.com",
    receiverEmail: "sahid.midda@gmail.com",
    amountSend: "300.00 AED",
    amountReceived: "6756.00 INR",
    transacDate: "2023-10-13 20:44:45",
    platformFees: 9,
    gst: 36,
    totalFees: 45,
  },
  {
    userName: "Sahid Midda",
    receiverName: "Subu",
    userEmail: "sahid.midda@gmail.com",
    receiverEmail: "subu.chhat@gmail.com",
    amountSend: "300.00 AED",
    amountReceived: "6756.00 INR",
    transacDate: "2023-10-13 20:44:45",
    platformFees: 9,
    gst: 36,
    totalFees: 45,
  },
  {
    userName: "Usama",
    receiverName: "Subu",
    userEmail: "usama.driver@gmail.com",
    receiverEmail: "subu.chhat@gmail.com",
    amountSend: "300.00 AED",
    amountReceived: "6756.00 INR",
    transacDate: "2023-10-13 20:44:45",
    platformFees: 9,
    gst: 36,
    totalFees: 45,
  },
  {
    userName: "Usama",
    receiverName: "Sahid Midda",
    userEmail: "usama.driver@gmail.com",
    receiverEmail: "sahid.midda@gmail.com",
    amountSend: "300.00 AED",
    amountReceived: "6756.00 INR",
    transacDate: "2023-10-13 20:44:45",
    platformFees: 9,
    gst: 36,
    totalFees: 45,
  },
];

let tableRowCount = document.getElementsByClassName("table-row-count");
tableRowCount[0].innerHTML = `(${viewTransaction.length} Peoples)`;

let tableBody = document.getElementById("table-rows");

const mappedRecords = viewTransaction.map((transactions) => {
  return `<tr>
            <td class='stock sticky-left'>
                <div class='stock-wrapper'>
                    <div class="stock-info">
                        <span class="stock-info__name">
                            ${transactions.userName}
                        </span>
                    </div>
                </div>
            </td>
            <td>${transactions.receiverName}</td>
            <td>
            ${transactions.userEmail}
            </td>
            <td>
            ${transactions.receiverEmail}
            </td>
            <td>
            ${transactions.amountSend}
            </td>
            <td>
            ${transactions.amountReceived}
            </td>
            <td>
            ${transactions.transacDate}
            </td>
            <td style='text-align: center;'>
            ${transactions.platformFees}
            </td>
            <td style='text-align: center;'>
            ${transactions.gst}
            </td>
            <td style='text-align: center;' class="sticky-right">
            ${transactions.totalFees}
            </td>
        </tr>`;
});

const tableWrapper = document.querySelector(".table-wrapper");

tableWrapper.innerHTML = `
        <table>
            <thead>
                <tr>
                    <th class="sticky-left"Ticker>Sender Name</th>
                    <th>Receiver Name</th>
                    <th>Sender Email</th>
                    <th>Receiver Email</th>
                    <th>Amount Send</th>
                    <th>Amount Received</th>
                    <th>Transaction Date</th>
                    <th>Platform Fees(after convertion)</th>
                    <th>GST(after convertion)</th>
                    <th class="sticky-right">Total Fees</th>
                </tr>
            </thead>
            <tbody id="table-row">
                ${mappedRecords.join("")}
            </tbody>
        </table>
    `;
