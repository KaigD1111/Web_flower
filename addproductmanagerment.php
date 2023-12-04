<!-- Not have Form validate, alert event. Modified 10/23/2023 by Quyen -->

<!-- start of Modal of Add new elements-->
<!-- Modified 10/22/2023 by Quyen -->


<div class="modal fade modal-lg add-new-container" id="add-new" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="#add-product" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="add-product">Thêm mới sản phẩm</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <!-- form --------------------------------------->
                <form action="processing_add_product_admin.php" method="post" enctype="multipart/form-data">
                    <div class="row g-2">
                        <!-- start of 1st column -->
                        
                            <label for="product-name" class="form-label">Tên Sản Phẩm</label>
                            <input type="text" id="product-name" name="product-name" class="form-control">


                            <label for="product-price" class="form-label">Giá</label>
                            <input type="number" id="product-price" name="price" class="form-control" min="0" step="1">

                           
                                <div class="col">
                                    <label for="product-size" class="form-label">Kích thước</label>
                                    <select id="product-size" class="form-select">
                                        <option value="" disabled selected hidden></option>
                                        <option value="Vừa">Vừa</option>
                                        <option value="Nhỏ">Nhỏ/option>
                                        <option value="Lớn">Lớn</option>
                                    </select>
                                </div>
                                
                                    <label for="product-quantity" class="form-label">Số lượng</label>
                                    <input type="number" id="product-quantity" class="form-control" min="0" step="1">
                                
                            </div>

                            <label for="product-image" class="form-label">Hình ảnh</label>
                            <input type="file" id="product-image" name="product-image" class="form-control">
                            <div class="image-box"></div>
                        </div>
                        <!-- end of 1st column -->
                        
                        <!-- start of 2nd column -->
                        <div class="col">                            
                           
                            <label for="product-description" class="form-label">Mô tả</label>
                            <textarea id="product-description" class="form-control"></textarea>

                        </div>
                        <!-- end of 2nd column -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-cancel admin" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit " class="btn btn-confirm admin">Thêm mới</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- end of Modal of Add new elements-->
