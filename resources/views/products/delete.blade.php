<div class="modal" tabindex="-1" id="deleteProductModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center">Are you sure want to delete <span id="productName"></span>?</p>
            </div>
            <input type="hidden" name="product_id" id="product_id">
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="deleteProductData">Delete</button>
            </div>
        </div>
    </div>
</div>
