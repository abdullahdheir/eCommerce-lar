<div class="container">
    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="{{ route('index') }}" class="link">home</a></li>
            <li class="item-link"><span>Dashboard</span></li>
            <li class="item-link"><span>Product</span></li>
        </ul>
    </div>

    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading" style="padding: 10px 15px;">
            <div class="" style="display:  flex; justify-content:space-between;align-items: center;">
                <span class="panel-title">All Products</span>
                <div class="search-input row" style="display: flex; align-items:center;">
                    <label for="search" style="padding-right: 5px; margin:0;">Search</label>
                    <input type="text" name="search" id="search" class="form-control"
                        placeholder="name, regular_price" wire:keyup wire:model='search'>
                </div>
                <div class="pull-right">
                    <select name="page" class="form-control" style="width: 50px; display:inline-block; padding:0;"
                        id="page" wire:model='pagation'>
                        <option value="10" selected>10</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="250">250</option>
                        <option value="500">500</option>
                    </select>
                    <a href="{{ route('productPDF') }}" target="_blank" class="btn btn-success">Print</a>
                    <a href="{{ route('admin.product.add') }}" class="btn btn-primary ">
                        New Product</a>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th wire:click.prevent='sortTable("id")' class="sort-parent">ID <i
                                    class="fa fa-angle-down sort-cross" aria-hidden="true"></i>
                                </thc>
                            <th wire:click.prevent='sortTable("name")' class="sort-parent">Name <i
                                    class="fa fa-angle-down sort-cross" aria-hidden="true"></i></th>
                            <th wire:click.prevent='sortTable("regular_price")' class="sort-parent">Regular Price <i
                                    class="fa fa-angle-down sort-cross" aria-hidden="true"></i></th>
                            <th wire:click.prevent='sortTable("sale_price")' class="sort-parent">Sale Price <i
                                    class="fa fa-angle-down sort-cross" aria-hidden="true"></i></th>
                            <th wire:click.prevent='sortTable("quantity")' class="sort-parent">Quantity <i
                                    class="fa fa-angle-down sort-cross" aria-hidden="true"></i></th>
                            <th wire:click.prevent='sortTable("veiws")' class="sort-parent">Veiws <i
                                    class="fa fa-angle-down sort-cross" aria-hidden="true"></i></th>
                            <th>Category Name </th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr style="vertical-align: middle;">
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->regular_price }}</td>
                                <td>{{ $product->sale_price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->veiws }}</td>
                                <td>{{ $productName[$product->id] }}</td>
                                <td style="display: flex; justify-content:center; font-size:1.5em;">
                                    <a href="{{ route('details', ['slug' => $product->slug]) }}" title="View Product"
                                        style="margin: 0 10px;" class="text-success"><i class="fa fa-eye"
                                            aria-hidden="true"></i></a>
                                    <a href="{{ route('admin.product.edit', ['header_slug' => $product->slug]) }}"
                                        title="Edit Product" style="margin: 0 10px;" class="text-info"><i
                                            class="fa fa-edit" aria-hidden="true"></i> </a>
                                    <a href="#" wire:click.prevent="deleteProduct('{{ $product->id }}')"
                                        title="Delete Product" style="margin: 0 10px;" class="text-danger"><i
                                            class="fa fa-times" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        {{-- <div class="row"> --}}

                        {{-- </div> --}}
                    </tfoot>
                </table>
            </div>
            <div style="margin: 0;    width: 100%;">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
