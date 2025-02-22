<?php
include "head.php";

?>
<?php
$loc = $_SERVER['PHP_SELF'];

$locat = basename($_SERVER['PHP_SELF']);



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crackers website</title>

  <style>
    /* Global Styles */

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      /* font-family: Georgia, 'Times New Roman', Times, serif; */
      /* font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"; */

      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji" !important;
    }

    body {
      line-height: 1.6;
      color: #333;
      background-color: rgb(255, 255, 255);
    }

    .table-container {
      width: 100%;
      overflow-x: auto;
      /* Horizontal scrolling for small screens */
      margin: 10px 0;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: #FFFFFF;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      font-size: 16px;
    }

    thead th {
      background-color: #ED3237;
      color: #fff;

    }

    .batch {
      background-color: #04AA6D;
      text-decoration: none;
      border: 0px;
      color: #fff;
      font-size: 16px;
      line-height: 24px;
      font-weight: 700;
      text-transform: uppercase;
      padding: 10px;
      text-align: center;
      justify-content: center;
    }

    th {
      font-size: 16px;
      line-height: 24px;
      font-weight: 700;
      text-transform: capitalize;
      padding: 10px;
      text-align: center;
      justify-content: center;
      align-items: space-evenly;
      white-space: nowrap;
      /* Prevent header text from wrapping */

    }

    tbody tr:last-child td {
      border-bottom: 3px solid #333;

    }


    .prod-img {
      width: 70px;
      height: auto;
      margin: auto;
    }

    .productbanner {
      width: 100%;
    }

    .productbanner img {
      width: 1000px;
      height: auto;
      margin-top: -10px;
      margin-bottom: 10px;
    }

    .productbanner img:hover {
      cursor: pointer;
      -ms-transform: scale(1.0);
      /* IE 9 */
      -webkit-transform: scale(1.1);
      /* Safari 3-8 */
      transform: scale(1.1);
      transition: transform 0.5s ease, box-shadow 0.5s ease;
    }

    h2,
    h3 {
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    th,
    td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
      text-transform: uppercase;
    }

    td {
      font-size: 18px;
      font-weight: 400;
      line-height: 24px;
      color: rgb(64, 0, 0);
    }

    input {
      border-radius: 5px solid;
      text-align: center;

    }

    input[type="number"] {
      border: 8px;
      width: 90px;

      text-align: center;
    }

    .popup button {
      width: 200px;
      height: 40px;
      margin: auto;
    }

    .btn {
      display: block;
      width: 200px;
      margin: 20px auto;
      padding: 10px 20px;
      background-color: #DC4950;
      color: white;
      text-align: center;
      text-decoration: none;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
    }

    .btn:hover {
      color: #fff;
      background-color: #D2151E;
    }

    .product-name {
      width: 100%;
      font-size: 16px;
      text-transform: capitalize;
      text-decoration: none;
      border: 0px;
    }

    th .product-id {
      width: 12%;
    }

    .product-id {
      width: 100px;
      font-size: 16px;
      text-transform: capitalize;
      text-decoration: none;
      border: 0px;
    }

    #grandTotalDisplay {
      font-size: 18px;

    }

    .total-display {
      font-size: 16px;

    }

    .total-display,
    .order-summary {
      text-align: center;
      font-size: 1.2rem;
      font-weight: bold;
      margin-top: 20px;
    }

    .hidden {
      display: none;
      height: 100%;
      width: 30%;
    }

    .popup.hidden {
      display: none;
    }

    .close {
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 20px;
      font-weight: bold;
      color: #333;
      cursor: pointer;
    }

    .close:hover {
      color: #FF0000;
    }

    .popup {
      width: 600px;
      height: auto;
      display: none;
      position: fixed;
      top: 50%;
      left: 35%;
      transform: translate(-50%, -50%);
      background: rgb(255, 252, 252);
      padding: 20px;
      border-radius: 8px;
      /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); */

    }

    #oderForm input {
      background-color: #ddd !important;
    }

    .popup h3 {
      margin-top: 0;
    }

    .popup input,
    .popup textarea {
      width: 100%;
      background-color: #ddd !important;
      margin-bottom: 10px;
      padding: 10px;
      text-align: left;
      border: 1px solid #ddd;
      border-radius: 4px;
      color: black;
      font-size: 16px;
      font-weight: 400;
    }

    .overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 1000px;
      height: 100%;
      /* background-color: rgba(0, 0, 0, 0.5);
  z-index: 999; */
    }

    .actualprice {
      text-decoration: line-through;
      text-decoration-thickness: 2px;
      text-decoration-color: #333;

    }

    .modal {
      display: none;
      /* Hidden by default */
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.8);
      /* Black with transparency */
      justify-content: center;
      align-items: center;
    }

    /* Modal content (zoomed image) */
    .modal-content {
      max-width: 90%;
      max-height: 90%;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
    }

    /* Close button */
    .close {
      position: absolute;
      top: 20px;
      right: 20px;
      font-size: 30px;
      color: white;
      font-weight: bold;
      cursor: pointer;
    }

    .close:hover {
      color: red;
    }

    th.uom {
      width: 12%;
    }

    .uom {
      width: 100%;
      text-decoration: none;
      border: 0px;
    }

    .hidden {
      height: 100%;
      width: 30%;
    }

    .price {
      width: 12%;

    }

    .overall-Total {
      font-size: 32px;

      font-family: 'Times New Roman', Times, serif;
    }

    .total-display,
    .order-summary {
      text-align: center;
      font-size: 1.2rem;
      font-weight: bold;
      margin-top: 20px;
    }

    @media only screen and (max-width: 768px) {

      /* For tablets and smaller screens */
      .productbanner img {
        width: 90%;
      }
    }

    @media only screen and (max-width: 480px) {

      /* For mobile phones and smaller screens */
      .productbanner img {
        width: 80%;
      }
    }

    @media only screen and (max-width: 320px) {

      /* For very small mobile screens */
      .productbanner img {
        width: 70%;
      }
    }

    @media only screen and (max-width: 768px) {
      /* For tablets and smaller screens */

    }

    @media only screen and (max-width: 480px) {
      /* For mobile phones and smaller screens */

    }

    @media only screen and (max-width: 320px) {
      /* For very small mobile screens */
    }
  </style>
</head>

<body>

  <!-- Check the purchased crackers details  -->

  <div id="price-container">
    <label class="label-price">Net Total
      <input type="number" id="nettotal" name="nettotal" value="0" readonly>
    </label>
    <label class="label-price">Saved:
      <input type="number" id="saved" name="saved" value="0" readonly>
    </label>
    <label class="label-price">overall-Total:
      <input type="number" id="overallTotal" name="overallTotal" class="overallTotal" value="0" readonly>
    </label>
  </div>


  <div id="orderSummary">
    <h3>Order Summary</h3>
    <table border=2px; id=selectedProducts>
      <thead>
        <tr>
          <th>ID</th>
          <th>cracker's Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total Price</th>
        </tr>
      </thead>
      <tbody id="productList">



      </tbody>

    </table>
    <div class="total-display" id="grandTotalDisplay">
    </div>

    <div class="overall-Total" id="overall-Total">

    </div>

    <button class="btn" onclick="openPopup()" id="placeorder">Place Order</button>

    <!-- Popup for user details -->
    <div class="overlay" id="overlay"></div>
    <div class="popup" id="popup">
      <span id="closePopup" class="close" onclick="closePopup()">&times;</span>
      <h3>Enter Your Details</h3>
      <form id="orderForm" onsubmit="submitOrder(event)">
        <input type="text" id="userName" name="userName" placeholder="Name" maxlength="50" autofocus required>
        <input type="email" id="userEmail" name="userEmail" placeholder="E-mail" maxlength="100" required
          autocomplete=".com">
        <input type="tel" id="userPhone" name="userPhone" placeholder="Phone No." maxlength="10" required>
        <textarea id="userAddress1" name="userAddress1" placeholder="Ex. Doorno / Building No." rows="1" maxlength="15"
          required></textarea>
        <textarea id="userAddress2" name="userAddress2" placeholder="Street Name / Area Name" rows="1" maxlength="30"
          required></textarea>
        <textarea id="userAddress3" name="userAddress3" placeholder="Town / District" rows="1" maxlength="30"
          required></textarea>
        <input type="tel" id="userPincode" name="userPincode" maxlength="6" placeholder="Pincode" required>


        <button type="submit" name="submitorder" class="btn">Submit Order</button>
      </form>
    </div>

  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {

      let selectedProducts = JSON.parse(localStorage.getItem("selectedProducts")) || [];
      // let priceContainer = document.getElementById("price-container");
      let productList = document.getElementById("productList");


      console.log("Selected Products:", selectedProducts);

      // alert(selectedProducts);
      if (selectedProducts.length === 0) {
        productList.innerHTML = "<tr><td colspan='5'>No products selected</td></tr>";
      } else {
        selectedProducts.forEach((product, index) => {

          let row = document.createElement('tr');
          row.innerHTML = `
                            <td>${product.id}</td>
                            <td>${product.name}</td>
                            <td class="price">
                            <input type="number" value="${product.price}" class="price1" readonly>
                             </td>
                            <td>
                            <input type="number" value="${product.quantity}" min="0" class="quantity"  > 
                            </td>
                            <td >
                            <input type="number" value="${(product.price * product.quantity).toFixed(2)}" class="rate" id="rate-${index}" readonly>
                            </td>
                    `;
          productList.appendChild(row);
        });
      }
    });


    // Function to update the quantity in local storage
    function updateQuantity(element, index) {


      let selectedProducts = JSON.parse(localStorage.getItem("selectedProducts")) || [];

      if (selectedProducts[index]) {
        let newQuantity = parseInt(element.value) || 0; // Get the new quantity
        selectedProducts[index].quantity = newQuantity; // Update quantity
        selectedProducts[index].total = (selectedProducts[index].price * newQuantity).toFixed(2); // Update total price

        // alert(selectedProducts[index].total)
        let totalElement = document.getElementById(`rate-${index}`);


        if (totalElement) {
          totalElement.value = selectedProducts[index].total;
        }
        localStorage.setItem("selectedProducts", JSON.stringify(selectedProducts)); // Save back to local storage

        // Function to update displayed total values
      }
    }

    // Function to update the total values displayed on the page
    function updateTotalDisplay() {

      // alert("lkjl");
      let selectedProducts = JSON.parse(localStorage.getItem("selectedProducts")) || [];

      let netTotal = selectedProducts.reduce((sum, product) => sum + parseFloat(product.total || 0), 0);


      let overallTotal = selectedProducts.reduce((sum, product) => sum + parseFloat(product.total || 0), 0);
      document.getElementById('overall-Total').textContent = `Total Price: RS.${overallTotal.toFixed(2)}`;
      document.getElementById("overallTotal").value = overallTotal.toFixed(2); // Update UI
    }

    // Event Listener for quantity input fields
    document.addEventListener("DOMContentLoaded", function () {
      let quantityInputs = document.querySelectorAll(".quantity");

      quantityInputs.forEach((input, index) => {
        input.addEventListener("input", function () {
          updateQuantity(this, index);
          updateTotalDisplay();
        });
      });
    });

    function openPopup() {
      document.getElementById('popup').style.display = 'block';
      document.getElementById('overlay').style.display = 'block';

    }


    function closePopup() {
      popup.style.display = 'none';
      overlay.style.display = 'none';
    }

    overlay.addEventListener("click", function () {
      closePopup();
    });

    // Close the popup when clicking the "X" button
    closePopupBtn.addEventListener("click", function () {
      closePopup();
    });

    function submitOrder(event) {


      let selectedProducts = JSON.parse(localStorage.getItem("selectedProducts")) || [];
      let formData = new FormData(document.getElementById("orderForm"));


      formData.append("products", JSON.stringify(selectedProducts)); // Send products as JSON

      fetch("process_order.php", {
        method: "POST",
        body: formData
      })
      // .then(response => response.text())

     
        .then(data => {
        alert('order placed successfully..!!!');
        localStorage.clear();
        window.location.href = 'order_confirmation.php';

        // alert(data);
      });
    }

    window.onbeforeunload = function () {
      localStorage.removeItem("selectedProducts");

      localStorage.clear();
    }


    window.addEventListener('load', function () {
      localstorage.removeItem("selectedProducts");
    });
  </script>
  </div>
</body>

</html>


<?php include "footer.php"; ?>