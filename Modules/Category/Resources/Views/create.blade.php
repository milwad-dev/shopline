@extends('Panel::layouts.master')

@section('title', 'New category')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <x-panel-content-header title="Create new category">
                <li class="breadcrumb-item active">
                    Create category
                </li>
            </x-panel-content-header>
            <div class="content-body">
                <section id="basic-input">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('categories.store') }}" method="POST">
                                        <div class="row">
                                            @csrf
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="title" title="Title" />
                                                    <x-panel-input name="title" id="title" value="{{ old('title') }}"
                                                    placeholder="Enter title" />
                                                    <x-share-error name="title" />
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="keywords" title="Keywords" nullable />
                                                    <x-panel-input name="keywords" id="keywords" value="{{ old('keywords') }}"
                                                    placeholder="Enter keywords" />
                                                    <x-share-error name="keywords" />
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="parent_id" title="Parent" nullable />
                                                    <x-panel-select name="parent_id" id="parent_id"
                                                        selectedText="Select parent category">
                                                        @foreach ($parents as $parent)
                                                            <option value="{{ $parent->id }}">{{ $parent->title }}</option>
                                                        @endforeach
                                                    </x-panel-select>
                                                    <x-share-error name="type" />
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="status" title="Status" />
                                                    <x-panel-select name="status" id="status" selectedText="Select status category">
                                                        @foreach (Modules\Category\Enums\CategoryStatusEnum::cases() as $status)
                                                            <option value="{{ $status->value }}">{{ $status->value }}</option>
                                                        @endforeach
                                                    </x-panel-select>
                                                    <x-share-error name="status" />
                                                </div>
                                            </div>
                                            <div class="row mb-5">
                                                <div class="col-xl-12 col-md-6 col-12">
                                                    <x-panel-label for="description" title="Description" nullable />
                                                    <x-panel-textarea name="description" id="description"
                                                    placeholder="Enter the description" value="{{ old('description') }}" />
                                                    <x-share-error name="description" />
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
