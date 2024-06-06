<x-guest-layout>
<!-- banner section start -->
<section class="ratio2_1 banner-style-2 pt-0">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6">
                <div class="collection-banner p-bottom p-center text-center">
                    <div class="banner-img">
                        <img src="assets/images/fashion/banner/1.jpg" class="bg-img blur-up lazyload" alt="">
                    </div>
                    <div class="contain-banner">
                        <div class="banner-content with-big ">
                            <h2 class="mb-2">::STYLE::</h2>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-md-6">
                <div class="collection-banner p-bottom p-center text-center">
                    <div class="banner-img">
                        <img src="assets/images/fashion/banner/2.jpg" class="bg-img blur-up lazyload" alt="">
                    </div>

                    <div class="contain-banner">
                        <div class="banner-content with-big ">
                            <h2 class="mb-2">::TRIFT::</h2>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="collection-banner p-bottom p-center text-center">
                    <div class="banner-img">
                        <img src="assets/images/fashion/banner/3.jpg" class="bg-img blur-up lazyload" alt="">
                    </div>
                    <div class="contain-banner">
                        <div class="banner-content with-big ">
                            <h2 class="mb-2">::SUSTAIN::</h2>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- banner section end -->

<!-- category section start -->
<section class="category-section ratio_40">
    <div class="container-fluid">

        <div class="row gy-3">
            <div class="col-xxl-2 col-lg-3">
                <div class="category-wrap category-padding category-block theme-bg-color">
                    <div>
                        <h2 class="light-text">Top</h2>
                        <h2 class="top-spacing">Our Top</h2>
                        <span>Categories</span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-10 col-lg-9">
                <div class="category-wrapper category-slider1 white-arrow category-arrow">

                    @forelse($categories as $category)
                        <div>
                            <a href="shop-left-sidebar.html" class="category-wrap category-padding">
                                <img src="{{ is_null($category->category_image) ? : Storage::disk("public")->url($category->category_image) }}" class="bg-img blur-up lazyload"
                                     alt="category image">
                                <div class="category-content category-text-1">
                                    <h3 class="theme-color">{{$category->name}}</h3>
                                    <span class="text-dark">Fashion</span>
                                </div>
                            </a>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
<!-- category section end -->

<section class="ratio_asos overflow-hidden mb-2">
    <div class="container p-sm-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="title-3 text-center">
                    <h2>Latest Arrival</h2>
                </div>
            </div>
        </div>
        <style>
        .r-price {
            display: flex;
            flex-direction: row;
            gap: 20px;
        }

        .r-price .main-price {
            width: 100%;
        }

        .r-price .rating {
            padding-left: auto;
        }

        .product-style-3.product-style-chair .product-title {
            text-align: left;
            width: 100%;
        }

        @media (max-width:600px) {

            .product-box p,
            .product-box a {
                text-align: left;
            }

            .product-style-3.product-style-chair .main-price {
                text-align: right !important;
            }
        }
        </style>
        <div class="row g-sm-4 g-3">

            @forelse($items as $item)
                <div class="col-xl-2 col-lg-2 col-6">
                    <div class="product-box">
                        <div class="img-wrapper">
                            <div class="front">
                                <a href="{{ route('item-details',["slug" => $item->slug]) }}">
                                    <img src="{{ Storage::disk("public")->url($item->images[0]) }}"
                                         class="bg-img blur-up lazyload" alt="">
                                </a>
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
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse



        </div>
    </div>
</section>





<style>
.products-c .bg-size {
    background-position: center 0 !important;
}
</style>

{{--<section class="ratio_asos overflow-hidden pb-5">--}}
{{--    <div class="px-0 container-fluid p-sm-0">--}}
{{--        <div class="row m-0">--}}
{{--            <div class="col-12 p-0">--}}
{{--                <div class="title-3 text-center">--}}
{{--                    <h2>Top Deals</h2>--}}
{{--                    <h5 class="theme-color">Our Collection</h5>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="our-product products-c">--}}
{{--                <div>--}}
{{--                    <div class="product-box">--}}
{{--                        <div class="img-wrapper">--}}
{{--                            <a href="product/details.html">--}}
{{--                                <img src="assets/images/fashion/product/front/25.jpg"--}}
{{--                                    class="w-100 bg-img blur-up lazyload" alt="">--}}
{{--                            </a>--}}
{{--                            <div class="circle-shape"></div>--}}
{{--                            <span class="background-text">Fashion</span>--}}
{{--                            <div class="label-block">--}}
{{--                                <span class="label label-theme">30% Off</span>--}}
{{--                            </div>--}}
{{--                            <div class="cart-wrap">--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:void(0)" class="addtocart-btn" data-bs-toggle="modal"--}}
{{--                                            data-bs-target="#addtocart">--}}
{{--                                            <i data-feather="shopping-cart"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:void(0)" data-bs-toggle="modal"--}}
{{--                                            data-bs-target="#quick-view">--}}
{{--                                            <i data-feather="eye"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="wishlist.php" class="wishlist">--}}
{{--                                            <i data-feather="heart"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-style-3 product-style-chair">--}}
{{--                            <div class="product-title d-block mb-0">--}}
{{--                                <div class="r-price">--}}
{{--                                    <div class="theme-color">2000 LKR</div>--}}
{{--                                    <div class="main-price">--}}
{{--                                        <ul class="rating mb-1 mt-0">--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star theme-color"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star theme-color"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <p class="font-light mb-sm-2 mb-0">Seller name</p>--}}
{{--                                <a href="product/details.html" class="font-default">--}}
{{--                                    <h5>Dress</h5>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <div class="product-box">--}}
{{--                        <div class="img-wrapper">--}}
{{--                            <a href="product/details.html">--}}
{{--                                <img src="assets/images/fashion/product/front/26.jpg"--}}
{{--                                    class="w-100 bg-img blur-up lazyload" alt="">--}}
{{--                            </a>--}}
{{--                            <div class="circle-shape"></div>--}}
{{--                            <span class="background-text">Fashion</span>--}}
{{--                            <div class="label-block">--}}
{{--                                <span class="label label-theme">30% Off</span>--}}
{{--                            </div>--}}
{{--                            <div class="cart-wrap">--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:void(0)" class="addtocart-btn" data-bs-toggle="modal"--}}
{{--                                            data-bs-target="#addtocart">--}}
{{--                                            <i data-feather="shopping-cart"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:void(0)" data-bs-toggle="modal"--}}
{{--                                            data-bs-target="#quick-view">--}}
{{--                                            <i data-feather="eye"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="wishlist.php" class="wishlist">--}}
{{--                                            <i data-feather="heart"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-style-3 product-style-chair">--}}
{{--                            <div class="product-title d-block mb-0">--}}
{{--                                <div class="r-price">--}}
{{--                                    <div class="theme-color">2000 LKR</div>--}}
{{--                                    <div class="main-price">--}}
{{--                                        <ul class="rating mb-1 mt-0">--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star theme-color"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star theme-color"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <p class="font-light mb-sm-2 mb-0">Seller name</p>--}}
{{--                                <a href="product/details.html" class="font-default">--}}
{{--                                    <h5>Dress</h5>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <div class="product-box">--}}
{{--                        <div class="img-wrapper">--}}
{{--                            <a href="product/details.html">--}}
{{--                                <img src="assets/images/fashion/product/front/27.jpg"--}}
{{--                                    class="w-100 bg-img blur-up lazyload" alt="">--}}
{{--                            </a>--}}
{{--                            <div class="circle-shape"></div>--}}
{{--                            <span class="background-text">Fashion</span>--}}
{{--                            <div class="label-block">--}}
{{--                                <span class="label label-theme">30% Off</span>--}}
{{--                            </div>--}}
{{--                            <div class="cart-wrap">--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:void(0)" class="addtocart-btn" data-bs-toggle="modal"--}}
{{--                                            data-bs-target="#addtocart">--}}
{{--                                            <i data-feather="shopping-cart"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:void(0)" data-bs-toggle="modal"--}}
{{--                                            data-bs-target="#quick-view">--}}
{{--                                            <i data-feather="eye"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="wishlist.php" class="wishlist">--}}
{{--                                            <i data-feather="heart"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-style-3 product-style-chair">--}}
{{--                            <div class="product-title d-block mb-0">--}}
{{--                                <div class="r-price">--}}
{{--                                    <div class="theme-color">2000 LKR</div>--}}
{{--                                    <div class="main-price">--}}
{{--                                        <ul class="rating mb-1 mt-0">--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star theme-color"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star theme-color"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <p class="font-light mb-sm-2 mb-0">Seller name</p>--}}
{{--                                <a href="product/details.html" class="font-default">--}}
{{--                                    <h5>Dress</h5>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <div class="product-box">--}}
{{--                        <div class="img-wrapper">--}}
{{--                            <a href="product/details.html">--}}
{{--                                <img src="assets/images/fashion/product/front/28.jpg"--}}
{{--                                    class="w-100 bg-img blur-up lazyload" alt="">--}}
{{--                            </a>--}}
{{--                            <div class="circle-shape"></div>--}}
{{--                            <span class="background-text">Fashion</span>--}}
{{--                            <div class="label-block">--}}
{{--                                <span class="label label-theme">30% Off</span>--}}
{{--                            </div>--}}
{{--                            <div class="cart-wrap">--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:void(0)" class="addtocart-btn" data-bs-toggle="modal"--}}
{{--                                            data-bs-target="#addtocart">--}}
{{--                                            <i data-feather="shopping-cart"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:void(0)" data-bs-toggle="modal"--}}
{{--                                            data-bs-target="#quick-view">--}}
{{--                                            <i data-feather="eye"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="wishlist.php" class="wishlist">--}}
{{--                                            <i data-feather="heart"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-style-3 product-style-chair">--}}
{{--                            <div class="product-title d-block mb-0">--}}
{{--                                <div class="r-price">--}}
{{--                                    <div class="theme-color">2000 LKR</div>--}}
{{--                                    <div class="main-price">--}}
{{--                                        <ul class="rating mb-1 mt-0">--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star theme-color"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star theme-color"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <p class="font-light mb-sm-2 mb-0">Seller name</p>--}}
{{--                                <a href="product/details.html" class="font-default">--}}
{{--                                    <h5>Dress</h5>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <div class="product-box">--}}
{{--                        <div class="img-wrapper">--}}
{{--                            <a href="product/details.html">--}}
{{--                                <img src="assets/images/fashion/product/front/29.jpg"--}}
{{--                                    class="w-100 bg-img blur-up lazyload" alt="">--}}
{{--                            </a>--}}
{{--                            <div class="circle-shape"></div>--}}
{{--                            <span class="background-text">Fashion</span>--}}
{{--                            <div class="label-block">--}}
{{--                                <span class="label label-theme">30% Off</span>--}}
{{--                            </div>--}}
{{--                            <div class="cart-wrap">--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:void(0)" class="addtocart-btn" data-bs-toggle="modal"--}}
{{--                                            data-bs-target="#addtocart">--}}
{{--                                            <i data-feather="shopping-cart"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:void(0)" data-bs-toggle="modal"--}}
{{--                                            data-bs-target="#quick-view">--}}
{{--                                            <i data-feather="eye"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="wishlist.php" class="wishlist">--}}
{{--                                            <i data-feather="heart"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-style-3 product-style-chair">--}}
{{--                            <div class="product-title d-block mb-0">--}}
{{--                                <div class="r-price">--}}
{{--                                    <div class="theme-color">2000 LKR</div>--}}
{{--                                    <div class="main-price">--}}
{{--                                        <ul class="rating mb-1 mt-0">--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star theme-color"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star theme-color"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <p class="font-light mb-sm-2 mb-0">Seller name</p>--}}
{{--                                <a href="product/details.html" class="font-default">--}}
{{--                                    <h5>Dress</h5>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <div class="product-box">--}}
{{--                        <div class="img-wrapper">--}}
{{--                            <a href="product/details.html">--}}
{{--                                <img src="assets/images/fashion/product/front/30.jpg"--}}
{{--                                    class="w-100 bg-img blur-up lazyload" alt="">--}}
{{--                            </a>--}}
{{--                            <div class="circle-shape"></div>--}}
{{--                            <span class="background-text">Fashion</span>--}}
{{--                            <div class="label-block">--}}
{{--                                <span class="label label-theme">30% Off</span>--}}
{{--                            </div>--}}
{{--                            <div class="cart-wrap">--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:void(0)" class="addtocart-btn" data-bs-toggle="modal"--}}
{{--                                            data-bs-target="#addtocart">--}}
{{--                                            <i data-feather="shopping-cart"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:void(0)" data-bs-toggle="modal"--}}
{{--                                            data-bs-target="#quick-view">--}}
{{--                                            <i data-feather="eye"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="wishlist.php" class="wishlist">--}}
{{--                                            <i data-feather="heart"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-style-3 product-style-chair">--}}
{{--                            <div class="product-title d-block mb-0">--}}
{{--                                <div class="r-price">--}}
{{--                                    <div class="theme-color">2000 LKR</div>--}}
{{--                                    <div class="main-price">--}}
{{--                                        <ul class="rating mb-1 mt-0">--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star theme-color"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star theme-color"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <p class="font-light mb-sm-2 mb-0">Seller name</p>--}}
{{--                                <a href="product/details.html" class="font-default">--}}
{{--                                    <h5>Dress</h5>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <div class="product-box">--}}
{{--                        <div class="img-wrapper">--}}
{{--                            <a href="product/details.html">--}}
{{--                                <img src="assets/images/fashion/product/front/31.jpg"--}}
{{--                                    class="w-100 bg-img blur-up lazyload" alt="">--}}
{{--                            </a>--}}
{{--                            <div class="circle-shape"></div>--}}
{{--                            <span class="background-text">Fashion</span>--}}
{{--                            <div class="label-block">--}}
{{--                                <span class="label label-theme">30% Off</span>--}}
{{--                            </div>--}}
{{--                            <div class="cart-wrap">--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:void(0)" class="addtocart-btn" data-bs-toggle="modal"--}}
{{--                                            data-bs-target="#addtocart">--}}
{{--                                            <i data-feather="shopping-cart"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:void(0)" data-bs-toggle="modal"--}}
{{--                                            data-bs-target="#quick-view">--}}
{{--                                            <i data-feather="eye"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="wishlist.php" class="wishlist">--}}
{{--                                            <i data-feather="heart"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-style-3 product-style-chair">--}}
{{--                            <div class="product-title d-block mb-0">--}}
{{--                                <div class="r-price">--}}
{{--                                    <div class="theme-color">2000 LKR</div>--}}
{{--                                    <div class="main-price">--}}
{{--                                        <ul class="rating mb-1 mt-0">--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star theme-color"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star theme-color"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <p class="font-light mb-sm-2 mb-0">Seller name</p>--}}
{{--                                <a href="product/details.html" class="font-default">--}}
{{--                                    <h5>Dress</h5>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <div class="product-box">--}}
{{--                        <div class="img-wrapper">--}}
{{--                            <a href="product/details.html">--}}
{{--                                <img src="assets/images/fashion/product/front/32.jpg"--}}
{{--                                    class="w-100 bg-img blur-up lazyload" alt="">--}}
{{--                            </a>--}}
{{--                            <div class="circle-shape"></div>--}}
{{--                            <span class="background-text">Fashion</span>--}}
{{--                            <div class="label-block">--}}
{{--                                <span class="label label-theme">30% Off</span>--}}
{{--                            </div>--}}
{{--                            <div class="cart-wrap">--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:void(0)" class="addtocart-btn" data-bs-toggle="modal"--}}
{{--                                            data-bs-target="#addtocart">--}}
{{--                                            <i data-feather="shopping-cart"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:void(0)" data-bs-toggle="modal"--}}
{{--                                            data-bs-target="#quick-view">--}}
{{--                                            <i data-feather="eye"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="wishlist.php" class="wishlist">--}}
{{--                                            <i data-feather="heart"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="product-style-3 product-style-chair">--}}
{{--                            <div class="product-title d-block mb-0">--}}
{{--                                <div class="r-price">--}}
{{--                                    <div class="theme-color">2000 LKR</div>--}}
{{--                                    <div class="main-price">--}}
{{--                                        <ul class="rating mb-1 mt-0">--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star theme-color"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star theme-color"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <p class="font-light mb-sm-2 mb-0">Seller name</p>--}}
{{--                                <a href="product/details.html" class="font-default">--}}
{{--                                    <h5>Dress</h5>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

</x-guest-layout>
