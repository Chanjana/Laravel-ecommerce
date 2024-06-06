<div>
    <section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
        <ul class="circles">
        </ul>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Checkout</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Cart Section Start -->
    <section class="section-b-space">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8" x-data="{btnDisabled: @entangle('billing'), cardPayment: @entangle('payment_method')}">
                    <form class="needs-validation" wire:submit.prevent="save">

                        @if($errors->any())
                            <div class="alert-danger alert" role="alert">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li> <br>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <div id="billingAddress" class="row g-4">
                            <h3 class="mb-3 theme-color">Billing address</h3>
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" wire:model.defer="billing_details.name"
                                       placeholder="Enter Full Name">
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" wire:model.defer="billing_details.phone"
                                       placeholder="Enter Phone Number">
                            </div>

                            <div class="col-md-12">
                                <label for="address" class="form-label">Street Line 1</label>
                                <input type="text" class="form-control" id="address" wire:model.defer="billing_details.street_line_1"
                                       placeholder="Enter Street Address Line 1">
                            </div>

                            <div class="col-md-12">
                                <label for="address2" class="form-label">Street Line 2 <span class="text-muted">(optional)</span></label>
                                <input type="text" class="form-control" id="address2" wire:model.defer="billing_details.street_line_2"
                                       placeholder="Enter Street Address Line 2">
                            </div>

                            <div class="col-md-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city"  wire:model.defer="billing_details.city" placeholder="City">

                            </div>

                            <div class="col-md-3">
                                <label for="country" class="form-label">Country</label>
                                <select class="form-select custome-form-select" id="country"  wire:model.live="billing_details.country">
                                    <option selected>Sri Lanka</option>
                                    <option>United Kingdom</option>
                                    <option>United States of America</option>
                                    <option>Germany</option>
                                    <option>Australia</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="state" class="form-label">State/Province</label>
                                <input type="text" class="form-control" id="city"  wire:model.defer="billing_details.state" placeholder="State/Province">
                            </div>
                            <div class="col-md-3">
                                <label for="zip" class="form-label">Zip</label>
                                <input type="text" class="form-control" id="zip" name="zip" placeholder="123456" wire:model.defer="billing_details.zip">
                            </div>

                            <div class="col-md-12 form-check ps-0 mt-3 custome-form-check"
                                 style="padding-left:15px !important;">
                                <input class="checkbox_animated check-it " type="checkbox" name="sameAsBilling" id="sameAsBilling" wire:model.live="billing" >
                                <label class="form-check-label checkout-label" for="sameAsBilling">Shipping address is
                                    same as Billing Address</label>
                            </div>
                        </div>

                        <div id="shippingAddress" class="row g-4 mt-5">
                            <h3 class="mb-3 theme-color">Shipping address</h3>
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" wire:model.defer="shipping_details.name"
                                       placeholder="Enter Full Name">
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" wire:model.defer="shipping_details.phone"
                                       placeholder="Enter Phone Number">
                            </div>

                            <div class="col-md-12">
                                <label for="address" class="form-label">Street Line 1</label>
                                <input type="text" class="form-control" id="address" wire:model.defer="shipping_details.street_line_1"
                                       placeholder="Enter Street Address Line 1" :disabled="btnDisabled">
                            </div>

                            <div class="col-md-12">
                                <label for="address2" class="form-label">Street Line 2 <span class="text-muted">(optional)</span></label>
                                <input type="text" class="form-control" id="address2" wire:model.defer="shipping_details.street_line_2"
                                       placeholder="Enter Street Address Line 2" :disabled="btnDisabled">
                            </div>

                            <div class="col-md-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city"  wire:model.defer="shipping_details.city" placeholder="City" :disabled="btnDisabled">

                            </div>

                            <div class="col-md-3">
                                <label for="country" class="form-label">Country</label>
                                <select class="form-select custome-form-select" id="country"  wire:model.live="shipping_details.country" :disabled="btnDisabled">
                                    <option selected>Sri Lanka</option>
                                    <option>United Kingdom</option>
                                    <option>United States of America</option>
                                    <option>Germany</option>
                                    <option>Australia</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="state" class="form-label">State/Province</label>
                                <input type="text" class="form-control" id="city"  wire:model.defer="shipping_details.state" placeholder="State/Province" :disabled="btnDisabled">
                            </div>
                            <div class="col-md-3">
                                <label for="zip" class="form-label">Zip</label>
                                <input type="text" class="form-control" id="zip" name="zip" placeholder="123456" wire:model.defer="shipping_details.zip" :disabled="btnDisabled">
                            </div>
                        </div>

                        <hr class="my-lg-5 my-4">

                        <h3 class="mb-3">Payment</h3>

                        <div class="d-block my-3">
                            <div class="form-check custome-radio-box">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" checked=""
                                       id="cod" x-model="cardPayment" value="cod">
                                <label class="form-check-label" for="cod">COD</label>
                            </div>
                            <div class="form-check custome-radio-box">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="debit" x-model="cardPayment" value="card">
                                <label class="form-check-label" for="debit" >Debit card</label>
                            </div>

                        </div>
                        <div class="row g-4" x-show="cardPayment == 'card'">
                            <div class="col-md-6">
                                <label for="cc-name" class="form-label">Name on card</label>
                                <input type="text" class="form-control" id="cc-name" wire:model.defer="card_details.name">
                                <div id="emailHelp" class="form-text">Full name as displayed on card</div>
                            </div>
                            <div class="col-md-6">
                                <label for="cc-number" class="form-label">Credit card number</label>
                                <input type="text" class="form-control" id="cc-number" maxlength="16" max="16" wire:model.defer="card_details.card_number">
                                <div class="invalid-feedback">Credit card number is required</div>
                            </div>
                            <div class="col-md-3">
                                <label for="expiration" class="form-label">Expiration</label>
                                <input type="text" class="form-control" id="expiration" placeholder="MM/YY" wire:model.defer="card_details.expiration_date">
                            </div>
                            <div class="col-md-3">
                                <label for="cc-cvv" class="form-label">CVV</label>
                                <input type="text" class="form-control" id="cc-cvv" maxlength="3" wire:model.defer="card_details.cvv">
                            </div>
                        </div>
                        <button class="btn btn-solid-default mt-4" type="submit">Place Order</button>
                    </form>
                </div>

                <div class="col-lg-4">
                    <div class="your-cart-box">
                        <h3 class="mb-3 d-flex text-capitalize">Your cart<span
                                class="badge bg-theme new-badge rounded-pill ms-auto bg-dark">0</span>
                        </h3>
                        <ul class="list-group mb-3">



                            <li class="list-group-item d-flex justify-content-between lh-condensed active">
                                <div class="text-dark">
                                    <h6 class="my-0">Shipping & Handling</h6>
                                        <small>2-5 Days (Local)</small><br>
                                        <small>20 Days (Overseas)</small>
                                </div>
                                <span>Rs. {{ number_format($shipping_fee, 2, ".", ",") }}</span>
                            </li>
                            <li class="list-group-item d-flex lh-condensed justify-content-between">
                                <span >Subtotal (LKR)</span>
                                <strong>Rs. {{ number_format($cart_subtotal, 2, ".", ",") }}</strong>
                            </li>
                            <li class="list-group-item d-flex lh-condensed justify-content-between">
                                <span class="fw-bold">Total (LKR)</span>
                                <strong>Rs. {{ number_format($cart_total, 2, ".", ",") }}</strong>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cart Section End -->
</div>
