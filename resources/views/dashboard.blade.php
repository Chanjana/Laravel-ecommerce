<x-guest-layout>

    <!-- Breadcrumb section start -->
    <section class="breadcrumb-section section-b-space">
        <ul class="circles">
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
                    <h3>User Dashboard</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.php">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">User Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb section end -->

    <!-- user dashboard section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav nav-tabs custome-nav-tabs flex-column category-option" id="myTab">
                        <li class="nav-item mb-2">
                            <button class="nav-link font-light active" id="tab" data-bs-toggle="tab" data-bs-target="#dash" type="button"><i class="fas fa-angle-right"></i>Dashboard</button>
                        </li>

                        <li class="nav-item mb-2">
                            <button class="nav-link font-light" id="1-tab" data-bs-toggle="tab" data-bs-target="#order" type="button"><i class="fas fa-angle-right"></i>Orders</button>
                        </li>

                        <li class="nav-item mb-2">
                            <button class="nav-link font-light" id="5-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"><i class="fas fa-angle-right"></i>Profile</button>
                        </li>

                    </ul>
                </div>

                <div class="col-lg-9">
                    <div class="filter-button dash-filter dashboard">
                        <button class="btn btn-solid-default btn-sm fw-bold filter-btn">Show Menu</button>
                    </div>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="dash">
                            <div class="dashboard-right">
                                <div class="dashboard">
                                    <div class="page-title title title1 title-effect">
                                        <h2>My Dashboard</h2>
                                    </div>
                                    <div class="welcome-msg">
                                        <h6 class="font-light">Hello, <span class="text-uppercase">{{ auth()->user()->name }} !</span></h6>
                                        <p class="font-light">From your My Account Dashboard you have the ability to
                                            view a snapshot of your recent account activity and update your account
                                            information. Select a link below to view or edit information.</p>
                                    </div>

                                    <div class="order-box-contain my-4">
                                        <div class="row g-4">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="order-box">
                                                    <div class="order-box-image">
                                                        <img src="assets/images/svg/box.png" class="img-fluid blur-up lazyload" alt="">
                                                    </div>
                                                    <div class="order-box-contain">
                                                        <img src="assets/images/svg/box1.png" class="img-fluid blur-up lazyload" alt="">
                                                        <div>
                                                            <h5 class="font-light">total orders</h5>
                                                            <h3>{{ $total_orders ?? "--" }}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade table-dashboard dashboard wish-list-section" id="order">
                            <div class="box-head mb-3">
                                <h3>My Orders</h3>
                            </div>


                            @forelse($orders->groupBy("seller_id") as $groups)

                                @forelse($groups as $order)

                                    <div id="accordion">

                                        <div class="card">
                                            <div class="card-header">
                                                Order No: #{{$order->id}}
                                                <a class="btn" data-bs-toggle="collapse" href="#collapse{{$loop->iteration + 5}}">
                                                    Click to expand order details
                                                </a>
                                            </div>
                                            <div id="collapse{{$loop->iteration + 5}}" class="collapse" data-bs-parent="#accordion">
                                                <div class="card-body">

                                                    <p class="mb-3">
                                                        Tracking number: <span class="fw-bold">{{ $order->order_id }}</span>
                                                        <br>
                                                        Shipping address: {{ $order->shipping_details["name"] }} - {{ $order->shipping_details["phone"] }}, {{$order->shipping_details["street_line_1"]}}, {{ $order->shipping_details["street_line_2"] !== null ? $order->shipping_details["street_line_2"] . ' ,' : " " }} {{$order->shipping_details["city"]}}, {{ $order->shipping_details["state"] }} - {{ $order->shipping_details["zip"] }}
                                                        <br>
                                                        Placed on: {{ \Carbon\Carbon::parse($order->created_at)->toDateTimeString() }}
                                                    </p>

                                                    <p class="py-3">
                                                        Sold by: {{ $order->item->seller->name }} - {{ $order->item->seller->email }}
                                                    </p>

                                                    <div class="my-5">
                                                        <ol class="progtrckr">
                                                            <li class="@if($order->status == "processing" || $order->status == "shipped" || $order->status == "delivered" || $order->status == "cancelled") progtrckr-done @else progtrckr-todo @endif">
                                                                <h5>Order Processing</h5>
                                                                <h6>{{ \Carbon\Carbon::parse($order->created_at)->toDateTimeString() }}</h6>
                                                            </li>
                                                            @if($order->status == "cancelled")
                                                                <li class="progtrckr-cancelled">
                                                                    <h5>Cancelled</h5>
                                                                </li>
                                                            @endif
                                                            <li class="@if($order->status == "shipped" || $order->status == "delivered") progtrckr-done @else progtrckr-todo @endif">
                                                                <h5>Shipped</h5>
                                                            </li>
                                                            <li class="@if($order->status == "delivered") progtrckr-done @else progtrckr-todo @endif">
                                                                <h5>Delivered</h5>
                                                            </li>

                                                        </ol>
                                                    </div>

                                                    <div class="table-responsive">
                                                        <table class="table cart-table">
                                                            <thead>
                                                            <tr class="table-head">
                                                                <th scope="col">image</th>
                                                                <th scope="col">Product Details</th>
                                                                <th scope="col">Status</th>
                                                                <th scope="col">Price</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>


                                                                <tr>
                                                                    <td>
                                                                        <img src="{{ Storage::disk("public")->url($order->item->images[0]) }}" class="blur-up lazyload" alt="" style="height: 150px;">

                                                                    </td>
                                                                    <td>
                                                                        <p class="fs-6 m-0">{{$order->item->title}}</p>
                                                                    </td>
                                                                    <td>
                                                                        @if($order->status == "processing")
                                                                            <p class="success-button bg-warning btn btn-sm" >Processing</p>
                                                                        @elseif($order->status == "shipped")
                                                                            <p class="success-button btn btn-sm">Shipped</p>
                                                                        @elseif($order->status == "delivered")
                                                                            <p class="success-button btn btn-sm">Complete</p>
                                                                        @elseif($order->status == "cancelled")
                                                                            <p class="btn btn-sm btn-danger text-white">Cancelled</p>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <p class="theme-color fs-6">LKR {{$order->item->price}}</p>
                                                                    </td>
                                                                </tr>


                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <p class="mt-3">
                                                        Shipping Fee: {{ array_key_exists("shipping_fee",$order->shipping_details) ? "LKR " . number_format($order->shipping_details["shipping_fee"],2) : "" }}
                                                        <br>
                                                        Order subtotal: {{ number_format($order->item->price, 2)  }}
                                                        <br>
                                                        Order total: <b>LKR {{ number_format($order->item->price + $order->shipping_details["shipping_fee"], 2) }}</b> <br>
                                                        Payment method: {{ $order->payment_method == "cod" ? "Cash on Delivery" : "Card payment" }}
                                                        <br>
                                                        @if($order->payment_method == "card")
                                                            Paid using: {{ Str::mask($order->card_details["card_number"], "X", 0, -4) }}
                                                        @endif
                                                    </p>

                                                    @if($order->status == "shipped")
                                                        <div class="my-4">
                                                            @livewire("mark-item-delivered", ["order_id" => $order->id])
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                @empty

                                    <h6> No Orders to show</h6>
                                @endforelse


                             @empty

                            @endforelse



                        </div>

                        <div class="tab-pane fade dashboard-profile dashboard" id="profile">

                            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                                @livewire('profile.update-profile-information-form')

                                <x-section-border />
                            @endif

                            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                                <div class="mt-10 sm:mt-0">
                                    @livewire('profile.update-password-form')
                                </div>

                                <x-section-border />
                            @endif

                                @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                                    <div class="mt-10 sm:mt-0">
                                        @livewire('profile.two-factor-authentication-form')
                                    </div>

                                    <x-section-border />
                                @endif

                                <div class="mt-10 sm:mt-0">
                                    @livewire('profile.logout-other-browser-sessions-form')
                                </div>

                                @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                                    <x-section-border />

                                    <div class="mt-10 sm:mt-0">
                                        @livewire('profile.delete-user-form')
                                    </div>
                                @endif


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- user dashboard section end -->

</x-guest-layout>
