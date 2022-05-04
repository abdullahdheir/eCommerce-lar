<div class="container tm-mt-big tm-mb-big">
    <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Add Product</h2>
                    </div>
                </div>
                <div class="row tm-edit-product-row">
                    <form wire:submit.prevent='store' class="tm-edit-product-form" enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="name">Product Name
                                </label>
                                <input id="name" name="name" type="text" class="form-control " wire:model='name'
                                    wire:keyup='generateSlug' />

                            </div>
                            <div class="form-group mb-3">
                                <label for="Slug">Product Slug
                                </label>
                                <input id="slug" name="slug" type="text" class="form-control" wire:model='slug' />
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control validate" rows="3" required wire:model='description'></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="category">Category</label>
                                <select class="custom-select tm-select-accounts" id="category" wire:model='category_id'>
                                    <option selected>Select category</option>
                                    @foreach ($cats as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3 col-xs-12 col-sm-6">
                                    <label for="regular_price">Regular Price
                                    </label>
                                    <input id="regular_price" name="regular_price" type="text"
                                        class="form-control validate" data-large-mode="true"
                                        wire:model='regular_price' />
                                </div>
                                <div class="form-group mb-3 col-xs-12 col-sm-6">
                                    <label for="sale_price">Sale Price
                                    </label>
                                    <input id="sale_price" name="sale_price" type="text" class="form-control validate"
                                        required wire:model='sale_price' />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3 col-xs-12 col-sm-6">
                                    <label for="quantity">Quantity
                                    </label>
                                    <input id="quantity" name="quantity" type="text" class="form-control validate"
                                        data-large-mode="true" wire:model='quantity' />
                                </div>
                                <div class="form-group mb-3 col-xs-12 col-sm-6">
                                    <label for="stock_status">Units In Stock
                                    </label>
                                    <select class="custom-select tm-select-accounts" name="stock_status"
                                        id="stock_status" wire:model='stock_status'>
                                        <option selected>Select Stock</option>
                                        <option value="1">InStock</option>
                                        <option value="0">OutStock</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                            <div class="tm-product-img-dummy mx-auto">
                                <i class="fa fa-cloud-upload tm-upload-icon" aria-hidden="true"
                                    onclick="document.getElementById('fileInput').click();"></i>
                            </div>
                            <div class="custom-file mt-3 mb-3">
                                <input id="fileInput" type="file" style="display:none;" wire:model='image' />
                                <input type="button" class="btn btn-primary btn-block mx-auto"
                                    value="UPLOAD PRODUCT IMAGE"
                                    onclick="document.getElementById('fileInput').click();" />
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block text-uppercase">Add Product
                                Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
