<div class="modal" tabindex="-1" id="addToCartModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add to Cart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="btnClose"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col align-items-center">
                                <form method="post" id="createProductForm" autocapitalize="off">
                                    <div class="mb-3">
                                        <label for="product_name" class="form-label">Product Name</label>
                                        <p class="form-control form-control-lg" name="product_name" id="product_name">
                                        </p>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="productPrice" class="form-label">Price</label>
                                                <p class="form-control form-control-lg" name="productPrice"
                                                    id="productPrice">
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="productQuantity" class="form-label">Quantity</label>
                                                <input type="number" class="form-control form-control-lg"
                                                    name="productQuantity" id="productQuantity">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Status</label>
                                                <p name="my_status" id="my_status" class="form-control form-control-lg">
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Total Price</label>
                                                <p name="total_price" id="total_price"
                                                    class="form-control form-control-lg">

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="buyProductButton" type="submit" class="btn btn-success btn-block"
                        style="background-color: #35C496">Add</button>
                </div>
            </div>
        </div>
    </div>
</div>
