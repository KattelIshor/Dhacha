<div class="modal fade bd-example-modal-lg" id="cartmodal" tabindex="-1" role="dialog" aria-labelledby="cartmodalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-12">
                        <img src="" alt="" id="productImage" style="width: 260px; object-fit: contain;">
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <?php echo e(Form::open(['id' => 'productUrl'])); ?>

                        <input type="hidden" name="qty" value="1">
                        <h6>
                            <a href="#" id="productCategory"></a> |
                            <a href="#" id="productSubcategory"></a>
                        </h6>
                        <h3 class="pt-4" id="productName"></h3>
                        <p class="pb-1">Brand: <span id="productBrand"></span></p>
                        <h4>Rs <span id="productPrice"></span></h4>

                        <select class="my-3 form-control" name="size" id="size">

                        </select>

                        <select class="my-3 form-control" name="color" id="color">

                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add To Cart</button>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>
<?php /**PATH D:\xampp\htdocs\Dhacha\resources\views/components/cart.blade.php ENDPATH**/ ?>