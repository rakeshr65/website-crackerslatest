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
      background-color: #FFFC00;
      text-decoration: none;
      border: 0px;
      color: rgba(14, 2, 2, 0.99);
      font-size: 16px;
      line-height: 24px;
      font-weight: 700;
      text-transform: uppercase;
      place-content: center;
      padding: 2px;
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

    th,td {
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

    .price-container {
      height: 50px;
      margin-top: 10px;
      background-color: #333;
      color: #fff;
      align-items: center;
      text-align: center;

    }

    .label-price {
      background-color: #333;
      color: #fff;
      margin-top: 15px;
      align-items: center;
      text-align: center;
      place-content: center;
      font-size: 18px
    }

    .label-price input {
      background-color: #333;
      color: #fff;
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
  <div class="productbanner">
    <img src="crackersimages/diwaliproductbanner.webp" alt="product banner">
  </div>

  <div class="price-container">
    <label class="label-price">Net Total
      <input type="number" id="nettotal" name="nettotal" value="0" readonly>
    </label>
    <label class="label-price">Saved:
      <input type="number" id="saved" name="saved" value="0" readonly>
    </label>
    <label class="label-price">overall-Total:
      <input type="number" id="overallTotal" name="overallTotal" class="overall-Total" value="0" readonly>
    </label>
  </div>
  <div class="table-container">
    <form id="productForm">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Image</th>
            <th>product name</th>
            <th class="uom">Content</th>
            <th>Actual Price</th>
            <th>price </th>
            <th>Quantity</th>
            <th>total</th>
          </tr>
        </thead>
        <tbody >


          <?php
          // Example product list
          include "productsampleinsert.php";
          // SORT BY ALPHABETICAL ORDER
          usort($products, function ($a, $b) {
            return strcmp($a["batch"] ?? '', $b["batch"] ?? '');
          });
          // Initialize current batch to null
          $currentBatch = null;
          // Loop through products
          foreach ($products as $index => $product):
            // Skip products with no batch
            if (!isset($product["batch"])) {
              continue;
            }
            // Check if batch has changed
            if ($product["batch"] !== $currentBatch):
              // Update current batch
              $currentBatch = $product["batch"];
              // Display batch heading
          ?>
              <tr class="batch-row">
                <td colspan="8" class="batch"><?= htmlspecialchars($currentBatch) ?></td>
              </tr>
            <?php endif; ?>
            <!-- Display product details -->
            <tr>
              <td>
                <input type="text" name="products[<?= $index ?>][id]" class="product-id" value="<?= htmlspecialchars($product['id']) ?>" readonly>
              </td>
              <td><img src="../caddschoolcrackers/admin/uploads/<?php echo htmlspecialchars($product['image']); ?>" alt='crackers images' title="crackers-images" onclick="openImage(this)" width='10px' class='prod-img' height='auto'>
              </td>
              <td>
                <input type="text" name="products[<?= $index ?>][name]" class="product-name" value="<?= htmlspecialchars($product['name']) ?>" readonly>
              </td>
              <td>
                <input type="text" name="products[<?= $index ?>][uom]" class="uom" value="<?= htmlspecialchars($product['uom']) ?>" readonly>
              </td>
              <td>
                <input type="number" name="products[<?= $index ?>][actualprice]" value="<?= htmlspecialchars($product['actualprice']) ?>" oninput="updateprice(this, <?= $index ?>)" class="actualprice" readonly>
              </td>
              <td>
                <input type="number" name="products[<?= $index ?>][price]" class="price" readonly>
              </td>
              <td>
                <input type="number" name="products[<?= $index ?>][quantity]" value="0" min="0" oninput="updateRowTotal(this, <?= $index ?>)">
              </td>
              <td>
                <input type="number" name="products[<?= $index ?>][total-price]" value="0" readonly class="total-price" id="total-<?= $index ?>">
              </td>
            </tr>
          <?php endforeach; ?>


          </tr>

        </tbody>
      </table>
      <button type="button" id="checkorder" class="btn" onclick="checkOrder()">Check Order</button></a>

      <!-- view Full image-->
      <div id="imageModal" class="modal">
        <span class="close" onclick="closeImage()">&times;</span>
        <img id="modalImage" class="modal-content" alt="Zoomed Image">
      </div>


  </div>

  <script>
    const checkorder = document.getElementById('checkorder');
    const placeorder = document.getElementById('placeorder');


    document.addEventListener("DOMContentLoaded", function() {
      // Attach event listener to all quantity inputs
      let quantityInputs = document.querySelector('.quantity');
      quantityInputs.forEach(input => {
        input.addEventListener("input", updateTotals);
      });
    });

    document.addEventListener("DOMContentLoaded", function() {
      updateAllPrices();
    });

    function updateAllPrices() {
      let priceFields = document.querySelectorAll("input[name^='products'][name$='[actualprice]']");
      priceFields.forEach((field, index) => {
        updateprice(field, index);
      });
    }

    function updateprice(element, index){

      let discount = 80; // Set discount percentage
      let actualPrice = parseFloat(element.value) || 0;
      let discountedPrice = actualPrice - (actualPrice * (discount / 100));

      let priceField = document.querySelector(`input[name="products[${index}][price]"]`);
      if (priceField) {
        priceField.value = discountedPrice.toFixed(2); // Update the price column
      }

    }

    checkorder.addEventListener('click', () => {
      placeorder.classList.remove('hidden');
    });

    // Function to update the total price for a single row
    function updateRowTotal(input, index) {

      let row = input.closest("tr");
      let quantity = parseInt(input.value) || 0;
      let price = parseFloat(row.querySelector(".price").value) || 0;
      
      let totalPrice = quantity * price;
    
      row.querySelector(".total-price").value = totalPrice.toFixed(2);
      // Get product details
    
      let product = {
        id: row.querySelector(".product-id").value,
        name: row.querySelector(".product-name").value,
        price: row.querySelector(".price").value,
        quantity: quantity,
        total: totalPrice,
      };

      let selectedProducts = JSON.parse(localStorage.getItem("selectedProducts")) || [];

      // Check if product already exists
      let existingProductIndex = selectedProducts.findIndex(p => p.id === product.id);

      if (quantity > 0) {
        // If product exists, update quantity & total
        if (existingProductIndex !== -1) {
          selectedProducts[existingProductIndex] = product;
        } else {
          selectedProducts.push(product);
        }
      } else {
        // Remove product if quantity is 0
        if (existingProductIndex !== -1) {
          selectedProducts.splice(existingProductIndex, 1);
        }
      }

      // Store updated list in localStorage
      localStorage.setItem("selectedProducts", JSON.stringify(selectedProducts));
      updateTotals();
    }


    function updateTotals() {
    let netTotal = 0;
    let overallTotal = 0;

    // Get all rows with product details
    let rows = document.querySelectorAll("tr"); 

    rows.forEach(row => {
        let actualPriceInput = row.querySelector(".actualprice"); // Select actual price in the same row
        let quantityInput = row.querySelector(".quantity"); // Select quantity input
        let totalPriceInput = row.querySelector(".total-price"); // Select total price field
        if (actualPriceInput && quantityInput && totalPriceInput) {
            let actualPrice = parseFloat(actualPriceInput.value) || 0;
            let quantity = parseFloat(quantityInput.value) || 0;
            let totalPrice = actualPrice * quantity; // Calculate total price
            
            totalPriceInput.value = totalPrice.toFixed(2); // Update total price field
            
            netTotal += (actualPrice * quantity); // Calculate net total
            overallTotal += totalPrice; // Calculate overall total
        }
    });

    let savedValue = netTotal - overallTotal; // Calculate saved amount

    // Update the net total and overall total in the UI
    document.getElementById('nettotal').value = netTotal.toFixed(2);
    document.getElementById('saved').value = savedValue.toFixed(2);
    document.getElementById('overallTotal').value = overallTotal.toFixed(2);
}

// Attach event listener to quantity inputs
document.addEventListener("DOMContentLoaded", function () {
    let quantityInputs = document.querySelectorAll('.quantity');
    
    quantityInputs.forEach(input => {
        input.addEventListener("input", updateTotals);
    });

    updateTotals(); // Initial calculation on page load
});


    function checkOrder() {
      let selectedProducts = JSON.parse(localStorage.getItem("selectedProducts")) || [];

      if (selectedProducts.length === 0) {
        alert("No products selected!!!");

      } else {

        window.location.href = "purchased_product.php";
      }
    }

    function openPopup() {
      document.getElementById('popup').style.display = 'block';
      document.getElementById('overlay').style.display = 'block';
    }


    const closePopupButton = document.getElementById('closePopup');

    closePopupButton.addEventListener('click', () => {
      popup.classList.add('hidden');

      closePopupButton.style.display = 'none';
      //window.location.assign("http://localhost/caddschoolcrackers/product.php")

    });

    // Optional: Close popup when clicking outside the popup content
    popup.addEventListener('click', (event) => {
      if (event.target === popup) {
        popup.classList.add('hidden');

      }
    });

    // Open the modal and display the clicked image
    function openImage(imgElement) {
      const modal = document.getElementById('imageModal');
      const modalImage = document.getElementById('modalImage');

      // Set the modal image source to the clicked image's source
      modalImage.src = imgElement.src;

      // Show the modal
      modal.style.display = 'flex';
    }

    // Close the modal
    function closeImage() {
      const modal = document.getElementById('imageModal');

      // Hide the modal
      modal.style.display = 'none';
    }

    window.addEventListener('load', function() {
      localStorage.clear();
    });

    window.onbeforeunload = function() {
      // localStorage.removeItem("selectedProducts");
      localStorage.clear();
    }
  </script>
  </div>
</body>

</html>


<?php include "footer.php"; ?>