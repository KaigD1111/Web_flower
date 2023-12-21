<link rel="stylesheet" href="addproductmanagement.css" /> 
<div class="container">
  <form action="Processing.php" method="post" enctype="multipart/form-data">
    <div class="row">
    <h1 class="modal-title fs-5" id="add-product">Thêm mới sản phẩm</h1>
      <div class="col-25">
        <label for="fname">Tên Sản Phẩm</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="firstname" placeholder="Tên hoa">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="product-price" name="product-price">Giá</label>
      </div>
      <div class="col-75">
        <input type="number" id="product-price" name="product-price" placeholder="bao nhiêu tiền...">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="product-name">Hình ảnh</label>
      </div>
      <div class="col-75">
      <input type="file" id="product-name" name="product-image" class="form-control">
                            <div class="image-box"></div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="Kích thước">Kích thước</label>
      </div>
      <div class="col-75">
        <select id="country" name="country">
          <option value="Vừa">Vừa</option>
          <option value="Nhỏ">Nhỏ</option>
          <option value="Lớn">Lớn</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Mô tả">Mô tả</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="subject" placeholder="Viết gì đó..." style="height:200px"></textarea>
      </div>
    </div>
    
    <div class="row">
      <input type="submit" value="ADD New Product" name="action">
      <input type="submit" class= "Huy" value="Hủy thêm sản Phẩm" name="action">
    </div>
  </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
      // Get the form and the cancel button
      var form = document.querySelector('form');
      var cancelButton = document.querySelector('.Huy');

      // Store the initial values when the page loads
      var initialValues = {
        fname: document.getElementById('fname').value,
        lname: document.getElementById('lname').value,
        country: document.getElementById('country').value,
        subject: document.getElementById('subject').value
      };

      // Function to reset values to their initial state
      function resetForm() {
        document.getElementById('fname').value = initialValues.fname;
        document.getElementById('lname').value = initialValues.lname;
        document.getElementById('country').value = initialValues.country;
        document.getElementById('subject').value = initialValues.subject;
        // You may need to handle the file input separately as browsers have security restrictions for setting its value
        // document.getElementById('product-name').value = '';
      }

      // Attach a click event listener to the cancel button
      cancelButton.addEventListener('click', function (event) {
        event.preventDefault();
        resetForm();
      });

      // Optional: If you want to reset the form when the form is submitted
      form.addEventListener('submit', function () {
        resetForm();
      });
    });
  </script>