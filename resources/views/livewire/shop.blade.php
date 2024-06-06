<div>
    <section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Shop</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Shop</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 category-side col-md-4">
                    <div class="category-option">
                        <div class="button-close mb-3">
                            <button class="btn p-0"><i data-feather="arrow-left"></i> Close</button>
                        </div>
                        <form wire:change.debounce="filter" >
                            <div class="accordion category-name" id="accordionExample">
                                <div class="accordion-item category-rating">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseTwo">
                                            Category
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse show"
                                         data-bs-parent="#accordionExample">
                                        <div class="accordion-body category-scroll">
                                            <ul class="category-list">

                                                @foreach($product_categories as $category)
                                                    <li>
                                                        <div class="form-check ps-0 custome-form-check">
                                                            <input class="checkbox_animated check-it" id="br{{ $loop->index }}" name="categories" wire:model.debounce="categories"
                                                                   value="{{$category->id}}" type="checkbox" >
                                                            <label class="form-check-label" for="br{{ $loop->index }}">{{ $category->name }}</label>
                                                            @if($category->items()->count() <= 0)
                                                            @else
                                                                <p class="font-light">({{ $category->items()->count() }})</p>
                                                            @endif

                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>


                                <div class="accordion-item category-rating">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseSix">
                                            Condition
                                        </button>
                                    </h2>
                                    <div id="collapseSix" class="accordion-collapse collapse show"
                                         aria-labelledby="headingOne">
                                        <div class="accordion-body category-scroll">
                                            <ul class="category-list">

                                                <li>
                                                    <div class="form-check ps-0 custome-form-check">
                                                        <input class="checkbox_animated check-it" id="ct1" wire:model.debounce="conditions"
                                                               type="checkbox" value="new" name="conditions">
                                                        <label class="form-check-label" for="ct1">New</label>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="form-check ps-0 custome-form-check">
                                                        <input class="checkbox_animated check-it" id="ct2" name="conditions" wire:model.debounce="conditions"
                                                               type="checkbox" value="used">
                                                        <label class="form-check-label" for="ct2">Used</label>
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingSeven">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseSeven">
                                            Price
                                        </button>
                                    </h2>
                                    <div id="collapseSeven" class="accordion-collapse collapse show"
                                         aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <ul class="category-list">
                                                <li>
                                                    <div class="form-check ps-0 custome-form-check">
                                                        <input class="checkbox_animated check-it" type="checkbox"
                                                               id="flexCheckDefault19" value="2500" wire:model.debounce="prices">
                                                        <label class="form-check-label" for="flexCheckDefault19">Below 2500</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check ps-0 custome-form-check">
                                                        <input class="checkbox_animated check-it" type="checkbox"
                                                               id="flexCheckDefault20" value="7500" wire:model.debounce="prices">
                                                        <label class="form-check-label" for="flexCheckDefault20">2500 to 7500</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check ps-0 custome-form-check">
                                                        <input class="checkbox_animated check-it" type="checkbox"
                                                               id="flexCheckDefault21" value="7500+" wire:model.debounce="prices">
                                                        <label class="form-check-label" for="flexCheckDefault21">7500 and
                                                            above</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="category-product col-lg-9 col-12 ratio_30">

                    <div class="row g-4">
                        <!-- label and featured section -->
                        <div class="col-md-12">
                            <ul class="short-name">


                            </ul>
                        </div>

                        <div class="col-12">
                            <div class="filter-options">
                                <div class="select-options">
                                    <div class="dropdown select-featured">
                                        <select class="form-select" name="size" id="pagesize" wire:model.debounce="pagination_no" wire:change.debounce="filter">
                                            <option value="12" selected>12 Products Per Page</option>
                                            <option value="24">24 Products Per Page</option>
                                            <option value="52">52 Products Per Page</option>
                                            <option value="100">100 Products Per Page</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- label and featured section -->

                    <!-- Prodcut setion -->
                    <div
                        class="row g-sm-4 g-3 row-cols-lg-4 row-cols-md-3 row-cols-2 mt-1 custom-gy-5 product-style-2 ratio_asos product-list-section">

                        @foreach($items as $item)
                            <div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="front">
                                            <a href="{{ route('item-details',["slug" => $item->slug]) }}">
                                                <img src="{{ Storage::disk("public")->url($item->images[0]) }}"
                                                     class="bg-img blur-up lazyload" alt="">
                                            </a>
                                        </div>

                                        <div class="cart-wrap">
                                            <ul>
                                                @if($item->availability == true)
                                                <li>
                                                    <a href="javascript:void(0)" class="addtocart-btn" wire:click.debounce="addToCart('{{ $item->id }}')">
                                                        <i data-feather="shopping-cart"></i>
                                                    </a>
                                                </li>
                                                @endif
                                                <li>
                                                    <a href="{{ route('item-details',["slug" => $item->slug]) }}">
                                                        <i data-feather="eye"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-details">
                                        <div class="rating-details">
                                            <span class="font-light grid-content">{{ $item->category->name }}</span>
                                        </div>
                                        <div class="main-price">
                                            <a href="{{ route('item-details',["slug" => $item->slug]) }}" class="font-default">
                                                <h5 class="ms-0">{{Str::title($item->title) }}</h5>
                                            </a>
                                            <h3 class="theme-color">Rs. {{ number_format($item->price, 2) }}</h3>
                                            <button class="btn listing-content">Add To Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach





                    </div>

                    {{ $items->links() }}


                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section end -->
</div>

