<!-- Modal -->
<div class="modal fade" id="upDateModal" tabindex="-1" aria-labelledby="upDateModalLabel" aria-hidden="true">
    <form action="" method="post" id="upDateProductForm">
        @csrf
        <input type="hidden" id="up_id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="upDateModalLabel">Update product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="errMsgContainer">

                    </div>
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" name="name" id="up_name"
                            placeholder="Product Name">
                    </div>
                    <div class="form-group mt-3">
                        <label for="price">Product price</label>
                        <input type="text" class="form-control" name="price" id="up_price"
                            placeholder="Product price">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_product">Update product</button>
                </div>
            </div>
        </div>
    </form>
</div>
