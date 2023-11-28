"use strict";

const platformFeesInput = document.querySelector("#platformFees");
const gstInput = document.querySelector("#gst");

fetch("../operations.php?action=getPlatformFees")
  .then((response) => response.text())
  .then((data) => {
    platformFeesInput.value = data;
  });

fetch("../operations.php?action=getGst")
  .then((response) => response.text())
  .then((data) => {
    gstInput.value = data;
  });
