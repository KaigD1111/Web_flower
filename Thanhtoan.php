    <!-- Add particular css link to file: start -->
    <link rel="stylesheet" href="stylethanhtoan.css" />
    <!-- Add particular css link to file: start -->

    <!-- BODY HEADER: Start -->
    <?php 
      $title = "Thanh toán";
      include('header.php');
    ?>
    <!-- BODY HEADER: End -->

    <!-- CHECKOUT'S MAIN CONTENT: Start -->
    <div class="checkout">
      <!-- CHECKOUT HEADER: Start -->
      <div class="checkout-header">
        <h2>Thanh toán</h2>
        <a href="#" onclick="location.href='./Giohang.php'">
          <span class="material-symbols-outlined"> keyboard_backspace </span
          >Quay về giỏ hàng
        </a>
      </div>
      <!-- CHECKOUT's HEADER: End -->

      <!-- CHECKOUT BODY: Start -->
      <form action="Processing_Info_Or_Delete.php" method="POST">
        <div class="checkout-body flex">
          <!-- INFOR FORM: Start -->
          <div class="left-col" style="width: 50%;">
            <div class="infor-form flex flex-col">
              <!-- GENDER: Start -->
              <div class="gender flex">
                <div>
                  <input
                    class="square-radio" type="radio" name="gender" id="nam" required/>
                  <label for="nam">Nam</label>
                </div>

                <div>
                  <input
                    class="square-radio" type="radio" name="gender" id="nu" />
                  <label for="nu">Nữ</label>
                </div>
              </div>
              <!-- GENDER: End -->

              <!-- NAME: Start -->
              <input
                type="text" name="name"
                placeholder="Họ tên*"
                required
                class="input-char" 
                aria-required="true"/>
              <!-- NAME: End -->

              <!-- PHONE NUMBER: Start -->
              <input
                type="text"
                name="sdt"
                placeholder="SĐT*"
                aria-required="true"
                required
                class="input-char" 
                pattern="(\+84|0)\d{7,10}"/>
              <!-- PHONE NUMBER: End -->

              <!-- ADDRESS: Start -->
              <div class="address width-50-30">
                <!-- City -->
                <select
                  class="input-char"
                  id="city"
                  aria-label=".form-select-sm"
                  data-live-search="true">
                  <option value="" selected disabled>Chọn tỉnh thành</option>
                </select>

                <select
                  class="input-char"
                  id="district"
                  aria-label=".form-select-sm"
                  data-live-search="true">
                  <option value="" selected disabled>Chọn quận huyện</option>
                </select>
              </div>

              <div class="address width-50-50">
              <select
                class="input-char"
                id="ward"
                aria-label=".form-select-sm"
                data-live-search="true">
                <option value="" selected disabled>Chọn phường xã</option>
              </select>
              <input
                type="text"
                name="address"
                placeholder="Ấp, Hẻm, số nhà,...*"
                required
                class="input-char" />
              </div>             
              <!-- ADDRESS: End -->

              <!-- Required field: start -->
              <small class="gray-text">*Required field</small>
              <!-- Required field: End -->
            </div>
            <!-- OTHER ADDRESS: End -->
              <!-- master card -->
        
              <!-- buy -->
              <input type="submit" name="action" value="Mua giỏ hàng">
              <input class="buy-btn btn" type="submit" name="action" value="Mua giỏ hàng" />
              <!-- accept rule -->
              <input type="checkbox" id="accept-rule" required/>
              <label for="accept-rule" class="gray-text"
                ><small>
                  Tôi đồng ý chính sách bảo mật của cửa hàng.</small
                ></label
              >
            </div>
            <!-- BUY SECTION: Start -->
          </div>
        </div>
      </form>
      <!-- CHECKOUT BODY: End -->
    </div>
    <!-- CHECKOUT'S MAIN CONTENT: End -->
    <!-- js: start -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="../../../js/store/cart-checkout/checkout/checkout.js"></script>
    <!-- js: end -->
    <?php include('footer.php');?>
  </body>
</html>