<x-guest-layout>

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
                    <h3>About Us</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.htm">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- team leader section Start -->
    <section class="overflow-hidden">
        <div class="container">
            <div class="row g-5">
                <div class="col-xl-5 offset-xl-1">


                            <img src="{{ asset('assets/images/logo.png') }}"
                                 class="img-fluid rounded-3 about-image" alt="">

                    <
                </div>

                <div class="col-xl-5">
                    <div class="about-details">
                        <div>
                            <h2>WHO WE ARE</h2>
                            <h3>largest Online Thrifting Store</h3>
                            <p>TRIF is a user-friendly online marketplace that facilitates the purchasing and selling of low-cost used things. TRIF, which was inspired by the concept of thrifting, unites vendors eager to sell their pre-loved items with buyers looking for unique and budget-friendly treasures. </p>
                            <p>Through TRIF, sellers can effortlessly list items, such as a pair of gently worn shoes, alleviating the guilt of underutilized possessions. Sellers, upon successful transactions, are entrusted with the careful packaging and delivery of items to the designated address.</p>
                            <button onclick="location.href = '{{  route('shop') }}';" type="button"
                                    class="btn btn-solid-default">Shop Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- team leader section End -->


</x-guest-layout>
