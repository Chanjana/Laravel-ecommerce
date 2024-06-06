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
                    <h3>Cart</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="../index.htm">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Cart Section Start -->
    <section class="cart-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <table class="table cart-table">
                        <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                            <th scope="col">action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($cart_content as $item)
                            <tr>
                                <td>
                                    <a href="{{ route('item-details', ['slug' => $item->id->slug]) }}">
                                        <img src="{{ Storage::disk("public")->url($item->id->images[0]) }}" class="blur-up lazyloaded"
                                             alt="">
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('item-details', ['slug' => $item->id->slug]) }}">{{ $item->name }}</a>
                                    <div class="mobile-cart-content row">
                                        <div class="col">
                                            <h2>Rs. {{ $item->price }}</h2>
                                        </div>
                                        <div class="col">
                                            <h2 class="td-color">
                                                <a href="javascript:void(0)">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </h2>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h2 class="td-color">Rs. {{ $item->price }}</h2>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" wire:click.debounce="removeItem('{{$item->rowId}}')">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <span class="text-muted">Cart is empty</span>
                                </td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="col-12 mt-md-5 mt-4">
                    <div class="row">
                        @if($cart_content->count() > 0)
                            <div class="col-sm-7 col-5 order-1">
                                <div class="left-side-button text-end d-flex d-block justify-content-end">
                                    <a href="javascript:void(0)" wire:click.prevent="clearCart"
                                       class="text-decoration-underline theme-color d-block text-capitalize">clear
                                        all items</a>
                                </div>
                            </div>
                        @endif

                        <div class="col-sm-5 col-7">
                            <div class="left-side-button float-start">
                                <a href="{{route('shop')}}" class="btn btn-solid-default btn fw-bold mb-0 ms-0">
                                    <i class="fas fa-arrow-left"></i> Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cart-checkout-section">
                    <div class="row g-4">
                        <div class="col-lg-4 col-sm-6">

                        </div>

                        <div class="col-lg-4 col-sm-6 ">

                        </div>

                        @if($cart_content->count() > 0)
                        <div class="col-lg-4">
                            <div class="cart-box">
                                <div class="cart-box-details">
                                    <div class="total-details">
                                        <div class="top-details">
                                            <h3>Cart Total</h3>
                                            <h6>Total <span>Rs. {{ $total }}</span></h6>
                                        </div>
                                        <div class="bottom-details">
                                            <a href="{{ route('checkout') }}">Proceed to Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
