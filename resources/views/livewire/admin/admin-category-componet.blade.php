<div class="container">
    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="{{ route('index') }}" class="link">home</a></li>
            <li class="item-link"><span>Dashboard</span></li>
            <li class="item-link"><span>Category</span></li>
        </ul>
    </div>
    <div style="display: flex; justify-content:center; margin: 10px 0;">
        <a href="{{ route('admin.cat.add') }}" class="btn btn-primary "><i class="fa fa-plus"
                aria-hidden="true"></i>
            Add
            New Category</a>
    </div>
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="panel-title">All Category</span>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Product Count</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cats as $cat)
                            <tr class="text-center">
                                <th>{{ $cat->id }}</th>
                                <td>{{ $cat->name }}</td>
                                <td>{{ $products_count[intval($cat->id)] }}</td>
                                <td style="display: flex; justify-content:center; font-size:1.5em;">
                                    <a href="{{ route('cateories', ['slug' => $cat->slug]) }}" style="margin: 0 10px;"
                                        class="text-success"><i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('admin.cat.edit', ['header_slug' => $cat->slug]) }}"
                                        style="margin: 0 10px;" class="text-info"><i class="fa fa-edit"
                                            aria-hidden="true"></i> </a>
                                    <a href="#" wire:click.prevent="deleteCat('{{ $cat->id }}')"
                                        style="margin: 0 10px;" class="text-danger"><i class="fa fa-times"
                                            aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        {{ $cats->links() }}
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>
