<div class="vendor-box">
    <div class="verndor-contain">
        <div class="vendor-image">
            <img src="{{ $vendor->getAvatar() }}" class="blur-up lazyload" alt="">
        </div>
        <div class="vendor-name">
            <h5 class="fw-500">{{ $vendor->name }}</h5>
        </div>
    </div>
    <p class="vendor-detail">Noodles & Company is an American fast-casual
        restaurant that offers international and American noodle dishes and pasta.
        {{-- TODO ADD FIELDS --}}
    </p>
    <div class="vendor-list">
        <ul>
            <li>
                <div class="address-contact">
                    <i data-feather="map-pin"></i>
                    <h5>Address: <span class="text-content">1288 Franklin Avenue</span></h5>
                </div>
            </li>
            <li>
                <div class="address-contact">
                    <i data-feather="headphones"></i>
                    <h5>Contact Seller:
                        <span class="text-content">
                            <a href="tel:{{ $vendor->phone }}">
                                {{ $vendor->phone }}
                            </a>
                        </span>
                    </h5>
                </div>
            </li>
        </ul>
    </div>
</div>
