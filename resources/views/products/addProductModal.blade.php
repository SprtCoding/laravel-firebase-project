<!-- Vertically centered modal -->
<div class="modal" tabindex="-1" id="addProductModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Items</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="btnAdd"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col align-items-center">
                                <form method="post" id="createProductForm" autocapitalize="off">
                                    <div class="row">
                                        <div class="col mb-4">
                                            <label for="product_name" class="form-label">Product Name</label>
                                            <input type="text" class="form-control form-control-md" name="product_name"
                                                placeholder="Product Name" id="product_name">
                                        </div>
                                        <div class="col mb-4">
                                            <label for="product_name" class="form-label">Item Code</label>
                                            <input type="text" class="form-control form-control-md" name="item_code"
                                                placeholder="Item Code" id="item_code">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-4">
                                            <label for="productPrice" class="form-label">Price (Box)</label>
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" class="form-control form-control-md"
                                                        placeholder="100.00" name="productPrice" id="productPrice">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-4">
                                            <label for="productQuantity" class="form-label">Quantity</label>
                                            <input type="number" class="form-control form-control-md"
                                                placeholder="Quantity" name="productQuantity" id="productQuantity">
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Status</label>
                                        <select name="my_status" id="my_status" class="form-control form-control-md">
                                            <option value="">Select</option>
                                            <option value="Available">Available</option>
                                            <option value="Not-Available">Not-Available</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="createProductButton" type="submit" class="btn btn-success btn-block"
                        style="background-color: #35C496">Add</button>
                    <div class="row">
                        <div class="col-md-6">
                            <button id="updateProductButton" type="submit" class="btn btn-primary btn-block"
                                style="display: none; width: 125px;">Update</button>
                        </div>
                        <div class="col">
                            <button id="cancelProductButton" type="submit" class="btn btn-default btn-block"
                                style="display: none; width: 125px;">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
