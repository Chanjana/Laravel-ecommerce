<div>
    <div class="product-buttons">

        @if (!$existence_check || $existence_check->count() == 0)
        <button wire:click.debounce="addToCart"
                id="cartEffect" class="btn btn-solid hover-solid btn-animation">
            <i class="fa fa-shopping-cart"></i>
            <span>Add To Cart</span>
        </button>
        @else
            <button disabled
                    id="cartEffectf" class="btn btn-solid hover-solid btn-animation">
                <i class="fa fa-shopping-cart"></i>
                <span>Already Added To Cart</span>
            </button>
        @endif

    </div>
</div>
