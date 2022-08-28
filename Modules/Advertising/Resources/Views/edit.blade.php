@extends('Panel::layouts.master')

@section('title', 'Edit advertising')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <x-panel-content-header title="Edit {{ $advertising->title }} advertising">
                <li class="breadcrumb-item active">
                    Edit advertising
                </li>
            </x-panel-content-header>
            <div class="content-body">
                <section id="basic-input">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('advertisings.update', $advertising->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="row">
                                            @csrf
                                            @method('PATCH')
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="title" title="Title" nullable />
                                                    <x-panel-input name="title" id="title" value="{{ $advertising->title }}"
                                                    placeholder="Enter title" />
                                                    <x-share-error name="title" />
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="link" title="Link" nullable />
                                                    <x-panel-input name="link" id="link" value="{{ $advertising->link }}"
                                                    placeholder="Enter link" />
                                                    <x-share-error name="link" />
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="status" title="Status" />
                                                    <x-panel-select name="status" id="status" selectedText="Select status advertising">
                                                        @foreach (Modules\Advertising\Enums\AdvertisingStatusEnum::cases() as $status)
                                                            <option @if ($advertising->status === $status->value) selected @endif
                                                                value="{{ $status->value }}">{{ $status->value }}
                                                            </option>
                                                        @endforeach
                                                    </x-panel-select>
                                                    <x-share-error name="status" />
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="location" title="Location" />
                                                    <x-panel-select name="location" id="location"
                                                        selectedText="Select location advertising">
                                                        @foreach (Modules\Advertising\Enums\AdvertisingLocationEnum::cases() as $location)
                                                            <option @if ($advertising->location === $location->value) selected @endif
                                                                value="{{ $location->value }}">{{ $location->value }}
                                                            </option>
                                                        @endforeach
                                                    </x-panel-select>
                                                    <x-share-error name="location" />
                                                </div>
                                            </div>
                                            <div class="row mb-5">
                                                <div class="col-xl-12 col-md-6 col-12">
                                                    <x-panel-label for="image" title="Image" />
                                                    <x-panel-file name="image" id="image" />
                                                    <x-share-error name="image" />
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
