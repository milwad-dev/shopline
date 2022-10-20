<li class="product-box-contain">
    <div class="drop-cart">
        <a href="{{ route('products.details', ['sku' => $product['sku'], 'slug' => $product['slug']]) }}" class="drop-image">
            <img src="{{ $product['first-media'] }}"
                 class="blur-up lazyload" alt="product image">
        </a>
        <div class="drop-contain">
            <a href="{{ route('products.details', ['sku' => $product['sku'], 'slug' => $product['slug']]) }}">
                <h5>{{ $product['title'] }}</h5>
            </a>
            <h6><span>{{ $product['quantity'] }} x</span> {{ $product['price'] }}</h6>
            <a class="close-button close_button" href="#"
               onclick="showConfirmMessage('Are you sure to delete?', '{{ route('cart.delete', $product['id']) }}');">
                <i data-feather="x-circle"></i>
            </a>
        </div>
    </div>
</li>
