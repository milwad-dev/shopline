@extends('Panel::layouts.master')

@section('title', 'New slider')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <x-panel-content-header title="Create new slider">
                <li class="breadcrumb-item active">
                    Create slider
                </li>
            </x-panel-content-header>
            <div class="content-body">
                <section id="basic-input">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            @csrf
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="link" title="link" />
                                                    <x-panel-input name="link" id="link" value="{{ old('link') }}"
                                                    placeholder="Enter link" />
                                                    <x-share-error name="link" />
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="status" title="Status" />
                                                    <x-panel-select name="status" id="status" selectedText="Select status slider">
                                                        @foreach (Modules\Category\Enums\CategoryStatusEnum::cases() as $status)
                                                            <option value="{{ $status->value }}">{{ $status->value }}</option>
                                                        @endforeach
                                                    </x-panel-select>
                                                    <x-share-error name="status" />
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="title" title="title" />
                                                    <x-panel-input name="title" id="title" value="{{ old('title') }}"
                                                    placeholder="Enter title" />
                                                    <x-share-error name="title" />
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="title_color" title="Title color" />
                                                    <x-panel-input name="title_color" id="title_color" type="color"
                                                    value="{{ old('title_color') }}" placeholder="Enter title color" />
                                                    <x-share-error name="title_color" />
                                                </div>
                                            </div>
                                            <div class="row mb-5">
                                                <div class="col-xl-12 col-md-6 col-12">
                                                    <x-panel-label for="image" title="Image" />
                                                    <x-panel-input name="image" id="image" type="file" />
                                                    @if ($errors->has('image'))
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $errors->first('image') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <x-panel-button />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
