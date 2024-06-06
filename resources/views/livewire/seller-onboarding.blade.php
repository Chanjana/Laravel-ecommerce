<div>
    <style>
        [type="text"]:focus,
        [type="email"]:focus,
        [type="url"]:focus,
        [type="password"]:focus,
        [type="number"]:focus,
        [type="date"]:focus,
        [type="datetime-local"]:focus,
        [type="month"]:focus,
        [type="search"]:focus,
        [type="tel"]:focus,
        [type="time"]:focus,
        [type="week"]:focus,
        [multiple]:focus,
        textarea:focus,
        select:focus {

            box-shadow: none !important;
            border-color: transparent !important;
        }
    </style>
    <!-- Sign Up Section Start -->
    <div class="login-section">
        <div class="materialContainer">
            <div class="box">
                <form wire:submit.prevent="save">

                    <div class="login-title">
                        <h2>Become a Seller on TF</h2>
                    </div>

                    @if($errors->any())
                        <div class="alert-danger alert">
                            @foreach($errors->all() as $error)
                                {{ $error }} <br>
                            @endforeach
                        </div>
                    @endif

                    @if(session()->has("success"))
                        <div class="alert-success alert">{{ session()->get("success") }}</div>
                    @endif

                    <div class="input">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="block mt-1 w-full" type="text" wire:model.defer="name"
                               :value="old('name')" required="" autofocus="" autocomplete="name">
                    </div>

                    <div class="input">
                        <label for="emailname">Email Address</label>
                        <input type="email" id="emailname" class="block mt-1 w-full" type="email" wire:model.defer="email"
                               :value="old('email')" required="" autocomplete="username">
                    </div>

                    <div class="input">
                        <label for="pass">Password</label>
                        <input type="password" id="pass" class="block mt-1 w-full" wire:model.defer="password" required=""
                               autocomplete="new-password">
                    </div>

                    <div class="input">
                        <label for="compass">Confirm Password</label>
                        <input type="password" id="compass" class="block mt-1 w-full" wire:model.defer="password_confirmation"
                               required="" autocomplete="new-password">
                    </div>

                    <div class="button login">
                        <button type="submit">
                            <span>Sign Up</span>
                            <i class="fa fa-check"></i>
                        </button>
                    </div>
                </form>
            </div>
            <p><a href="{{ route('login') }}" class="theme-color">Already have an account?</a></p>
        </div>
    </div>

    <!-- Sign Up Section End -->
</div>
