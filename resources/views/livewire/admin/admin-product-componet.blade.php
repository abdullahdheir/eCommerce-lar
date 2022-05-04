<div class="container">
    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="{{ route('index') }}" class="link">home</a></li>
            <li class="item-link"><span>Dashboard</span></li>
            <li class="item-link"><span>Product</span></li>
        </ul>
    </div>
    <div style="display: flex; justify-content:center; margin: 10px 0;">
        <a href="{{ route('admin.product.add') }}" class="btn btn-primary "><i class="fa fa-plus"
                aria-hidden="true"></i>
            Add
            New Product</a>
    </div>
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    <livewire:product-datatables searchable="name, regular_price" exportable />
</div>
