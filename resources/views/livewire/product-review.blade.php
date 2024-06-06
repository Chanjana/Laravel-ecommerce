<div>

    @push("styles")
        <style>
            .rating {
                /*float:left;*/
                border:none;
            }
            .rating:not(:checked) > input {
                position:absolute;
                top:-9999px;
                clip:rect(0, 0, 0, 0);
            }
            .rating:not(:checked) > label {
                float:right;
                width:1em;
                padding:0 .1em;
                overflow:hidden;
                white-space:nowrap;
                cursor:pointer;
                font-size:200%;
                line-height:1.2;
                color:#ddd;
            }
            .rating:not(:checked) > label:before {
                content:'★ ';
            }
            .rating > input:checked ~ label {
                color: #f70;
            }
            .rating:not(:checked) > label:hover, .rating:not(:checked) > label:hover ~ label {
                color: gold;
            }
            .rating > input:checked + label:hover, .rating > input:checked + label:hover ~ label, .rating > input:checked ~ label:hover, .rating > input:checked ~ label:hover ~ label, .rating > label:hover ~ input:checked ~ label {
                color: #ea0;
            }
            .rating > label:active {
                position:relative;
            }
        </style>
    @endpush

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="customer-rating">
                <h2>Customer reviews</h2>

                @if($reviews->count() > 0)
                <div class="global-rating">
                    <h5 class="font-light">{{$reviews->count()}} Ratings</h5>
                </div>

                <ul class="rating-progess">
                    <li>
                        <h5 class="me-3">5 Star</h5>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{$reviews->where('rating', 5)->count()/$reviews->count()*100}}%"
                                 aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                        <h5 class="ms-3">{{$reviews->where('rating', 5)->count()/$reviews->count()*100}}%</h5>
                    </li>
                    <li>
                        <h5 class="me-3">4 Star</h5>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{$reviews->where('rating', 4)->count()/$reviews->count()*100}}%"
                                 aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                        <h5 class="ms-3">{{$reviews->where('rating', 4)->count()/$reviews->count()*100}}%</h5>
                    </li>
                    <li>
                        <h5 class="me-3">3 Star</h5>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{$reviews->where('rating', 3)->count()/$reviews->count()*100}}%"
                                 aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                        <h5 class="ms-3">{{$reviews->where('rating', 3)->count()/$reviews->count()*100}}%</h5>
                    </li>
                    <li>
                        <h5 class="me-3">2 Star</h5>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{$reviews->where('rating', 2)->count()/$reviews->count()*100}}%"
                                 aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                        <h5 class="ms-3">{{$reviews->where('rating', 2)->count()/$reviews->count()*100}}%</h5>
                    </li>
                    <li>
                        <h5 class="me-3">1 Star</h5>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{$reviews->where('rating', 1)->count()/$reviews->count()*100}}%"
                                 aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                        <h5 class="ms-3">{{$reviews->where('rating', 1)->count()/$reviews->count()*100}}%</h5>
                    </li>
                </ul>
                @else
                    Nothing to Show
                @endif
            </div>
        </div>

        @if($item_check_if_delivered && !$review_existence)
            <div class="col-lg-8">
                <h5 class="mb-3">You are reviewing as {{ auth()->user()->name }}</h5>

            
                <p class="d-inline-block me-2">Rating</p>

                <div class="review-box">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {{$error}} <br>
                            @endforeach
                        </div>

                    @endif

                    <form class="row g-4" wire:submit.prevent="save">

                        <div class="col-lg-12">
                            <fieldset class="rating d-inline-block">
                                <input type="radio" id="star5" wire:model.defer="rating" value="5" />
                                <label for="star5">5 stars</label>
                                <input type="radio" id="star4" wire:model.defer="rating" value="4" />
                                <label for="star4">4 stars</label>
                                <input type="radio" id="star3" wire:model.defer="rating" value="3" />
                                <label for="star3">3 stars</label>
                                <input type="radio" id="star2" wire:model.defer="rating" value="2" />
                                <label for="star2">2 stars</label>
                                <input type="radio" id="star1" wire:model.defer="rating" value="1" />
                                <label for="star1">1 star</label>
                            </fieldset>
                        </div>

                        <div class="col-12">
                            <label class="mb-1" for="comments">Comments</label>
                            <textarea class="form-control" placeholder="Leave a comment here" wire:model.defer="comment"
                                      id="comments" style="height: 100px" required=""></textarea>
                        </div>

                        <div class="col-12">
                            <button type="submit"
                                    class="btn default-light-theme default-theme default-theme-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif


        <div class="col-12 mt-4">
            <div class="customer-review-box">
                <h4>Customer Reviews</h4>
                @forelse($reviews as $review)
                    <div class="customer-section">
                        <div class="customer-details">
                            <h5>{{ Str::mask($review->user->name, "*", 1 , -2) }} @if($review->user->id == auth()->id()) (You) @endif</h5>
                            <ul class="rating my-2 d-inline-block">
                                @for($i=1; $i<=$review->rating; $i++)
                                    <li>
                                        <i class="fas fa-star theme-color"></i>
                                    </li>
                                @endfor
                            </ul>
                            <p class="font-light">{{$review->comment}}</p>

                            <p class="date-custo font-light">- {{ \Carbon\Carbon::parse($review->created_at)->toFormattedDateString() }}</p>
                        </div>
                    </div>
                @empty

                @endforelse

                {{ $reviews->links() }}



            </div>
        </div>
    </div>
</div>
