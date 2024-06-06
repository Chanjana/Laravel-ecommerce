<x-guest-layout>

    <section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
        <ul class="circles">
        </ul>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>{{Str::title($item->title)}}</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="../index.htm">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{Str::title($item->title)}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section> <!-- Shop Section start -->

    <section>
        <div class="container">
            <div class="row gx-4 gy-5">
                <div class="col-lg-12 col-12">
                    <div class="details-items">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="details-image-vertical black-slide rounded">
                                            @foreach($item->images as $image)
                                               <img src="{{ Storage::disk("public")->url($image) }}"
                                                         class="img-fluid blur-up lazyload" alt="">

                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="details-image-1 ratio_asos">
                                            @foreach($item->images as $image_main)
                                                <img src="{{ Storage::disk("public")->url($image_main) }}"
                                                     class="img-fluid w-100 image_zoom_cls-0 blur-up lazyload" alt="">
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="cloth-details-size">

                                    <div class="details-image-concept">
                                        <h2>{{ $item->title }}</h2>
                                        <span class="text-muted"><small>by {{ $item->seller->name }}</small></span>
                                    </div>

                                    <div class="label-section">
                                        <span class="badge badge-grey-color">#1 Best seller</span>
                                        <span class="label-text">in {{ $item->category->name }}</span>
                                    </div>

                                    <h3 class="price-detail">Rs. {{$item->price}} </h3>

                                    @if($item->availability == true)
                                        @if(auth()->id() !== $item->user_id)
                                            @livewire("addto-cart", ["item_id" => $item->id])
                                        @endif
                                    @else
                                        <p class="text-danger">Item Not Available</p>
                                    @endif


                                    <ul class="product-count shipping-order">
                                        <li>
                                            <img src="../assets/images/gif/truck.png" class="img-fluid blur-up lazyload"
                                                 alt="image">
                                            <span class="lang">Free shipping for orders above Rs. 10,000</span>
                                        </li>
                                    </ul>


                                    <div class="border-product">
                                        <h6 class="product-title d-block">share it</h6>
                                        <div class="product-icon">
                                            <ul class="product-social">
                                                <li>
                                                    <a href="https://www.facebook.com/">
                                                        <i class="fab fa-facebook-f"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.google.com/">
                                                        <i class="fab fa-google-plus-g"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://twitter.com/">
                                                        <i class="fab fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.instagram.com/">
                                                        <i class="fab fa-instagram"></i>
                                                    </a>
                                                </li>
                                                <li class="pe-0">
                                                    <a href="https://www.google.com/">
                                                        <i class="fas fa-rss"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="cloth-review">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                        data-bs-target="#desc" type="button">Description</button>

                                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#review" type="button">Review</button>
                            </div>
                        </nav>

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="desc">
                                <div class="shipping-chart">
                                    <div class="font-light">
                                        {!! $item->description !!}
                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane fade" id="review">

                                @livewire("product-review",["item_id" => $item->id])

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section end -->

</x-guest-layout>
