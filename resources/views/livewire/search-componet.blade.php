  <div class="wrap-search center-section">
      <div class="wrap-search-form">
          <form action="{{ route('search') }}" id="form-search-top" name="form-search-top">
              <input type="text" wire:model='product_name' name="search" id="search-input" placeholder="Search here..."
                  autocomplete="off">
              <button form="form-search-top" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
              <div class="wrap-list-cate">
                  {{-- <input type="hidden" name="product-cat" value="{{ $product_cat }}" id="product-cate"> --}}
                  <input type="hidden" disabled name="product-cat_id" value="{{ $product_cat_id }}" id="product-id">
                  <a href="#" class="link-control">{{ str_split($product_cat, 12)[0] }}</a>
                  <ul class="list-cate">
                      <li class="level-0">All Category</li>
                      @foreach ($cats as $cat)
                          <li data-id="{{ $cat->id }}" class="level-1">{{ $cat->name }}</li>
                      @endforeach
                  </ul>
              </div>
          </form>
          @isset($products)
              <div class="search-result">
                  <ul id="search-result">
                      @foreach ($products as $product)
                          <li class="list-search" data-id="{{ $product->id }}">{{ $product->name }}</li>
                      @endforeach
                  </ul>
              </div>
          @endisset
      </div>
  </div>
