<div>
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form action="{{ route('product.search') }}" class="search-model-form">
                <input type="text" name='search' id="search-input" value="{{$search}}" placeholder="Search products here.....">
            </form>
        </div>
    </div>
</div>
