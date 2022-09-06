<div class="top-selling-contain wow fadeInUp">
    <a href="{{ $path }}" class="top-selling-image">
        <img src="{{ $imagePath }}" class="img-fluid blur-up lazyload" alt="product image">
    </a>
    <div class="top-selling-detail">
        <a href="{{ $path }}">
            <h5>{{ $title }}</h5>
        </a>
        <div class="product-rating">
            <ul class="rating">
                @if ((int) $rates === 0)
                    <li>
                        <i data-feather="star" class="fill"></i>
                    </li>
                @else
                    @for ($i = 0; $i < $rates; $i++)
                        <li>
                            <i data-feather="star" class="fill"></i>
                        </li>
                    @endfor
                @endif
            </ul>
            <span>({{ $rates }})</span>
        </div>
        <h6>$ {{ $price }}</h6>
    </div>
</div>
