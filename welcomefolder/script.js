const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu_btn");
const closeBtn = document.querySelector("#close-btn");
const themetoggler = document.querySelector(".theme-toggler");

// Show SideMenu
menuBtn.addEventListener("click", () => {
  sideMenu.style.display = "block";
});

// Close SideMenu
closeBtn.addEventListener("click", () => {
  sideMenu.style.display = "none";
});

// Change Theme

themetoggler.addEventListener("click", () => {
  document.body.classList.toggle("dark-theme-variables");

  // themetoggler.querySelector('i').classList.toggle('active');
  themetoggler.querySelector("i:nth-child(1)").classList.toggle("active");
  themetoggler.querySelector("i:nth-child(2)").classList.toggle("active");
});

// FIll Orders in Tables
Orders.forEach((order) => {
  const tr = document.createElement("tr");
  const trContent = `
                        <td>${order.productName}</td>
                        <td>${order.productNumber}</td>
                        <td>${order.paymentStatus}</td>
                        <td class="${
                          order.shipping === "Declined"
                            ? "danger"
                            : order.shipping === "Pending"
                            ? "warning"
                            : "success"
                        }">${order.shipping}</td>
                        <td class="primary">Details</td>
                    `;
  tr.innerHTML = trContent;
  document.querySelector("table tbody").appendChild(tr);
});
