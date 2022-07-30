<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">{{ $title }}</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('panel.index') }}">Panel</a>
                        </li>
                        <li class="breadcrumb-item active">
                            {{ $title }}
                        </li>
                        {{ $slot }}
                    </ol>
                </div>
                @if (! is_null($createTitle))
                    <a href="{{ $createRoute }}" class="btn btn-info">{{ $createTitle }}</a>
                @endif
            </div>
        </div>
    </div>
</div>
