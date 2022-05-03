<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="{{ route('index') }}" class="link">home</a></li>
            <li class="item-link"><span>Dashboard</span></li>
            <li class="item-link"><a href="{{ route('admin.cat') }}" class="link">Category</a></li>
            <li class="item-link"><span>Add New Category</span></li>
        </ul>
    </div>
    @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif
    <div class=" main-content-area">
        <div class="panel panel-default">
            <div class="panel-heading">New Category</div>
            <div class="panel-body">
                <form class="form-horizontal" wire:submit.prevent='storeCategory'>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Category Name </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name" wire:model='name' id="name"
                                placeholder="Category Name ..." wire:keyup='generateSlug'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slug" class="col-sm-2 control-label">Category Slug</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="slug" wire:model='slug' id="slug"
                                placeholder="Category Slug ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--end main content area-->
    </div>
    <!--end container-->
