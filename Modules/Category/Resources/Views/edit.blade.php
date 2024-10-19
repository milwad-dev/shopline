@extends('Panel::layouts.master')

@section('title', 'Edit ' . $category->title . ' Category')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <x-panel-content-header title="Edit {{ $category->title }} Category">
                <li class="breadcrumb-item active">Edit</li>
            </x-panel-content-header>
            <div class="content-body">
                <section id="basic-input">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="id" value="{{ $category->id }}">
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="title" title="Title" />
                                                    <x-panel-input
                                                        name="title"
                                                        id="title"
                                                        value="{{ $category->title }}"
                                                        placeholder="Enter title"
                                                    />
                                                    <x-share-error name="title" />
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="keywords" title="Keywords" nullable />
                                                    <x-panel-input
                                                        name="keywords"
                                                        id="keywords"
                                                        value="{{ $category->keywords }}"
                                                        placeholder="Enter keywords"
                                                    />
                                                    <x-share-error name="keywords" />
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="parent_id" title="Parent" nullable />
                                                    <x-panel-select
                                                        name="parent_id"
                                                        id="parent_id"
                                                        selectedText="Select parent category">
                                                        @foreach ($parents as $parent)
                                                            <option @selected($category->parent_id === $parent->id)
                                                                value="{{ $parent->id }}">{{ $parent->title }}
                                                            </option>
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
                                                            <option @selected($category->status === $status->value)
                                                                value="{{ $status->value }}">{{ $status->value }}
                                                            </option>
                                                        @endforeach
                                                    </x-panel-select>
                                                    <x-share-error name="status" />
                                                </div>
                                            </div>
                                            <div class="row mb-5">
                                                <div class="col-xl-12 col-md-6 col-12">
                                                    <x-panel-label for="description" title="Description" nullable />
                                                    <x-panel-textarea
                                                        name="description"
                                                        id="description"
                                                        placeholder="Enter the description"
                                                        value="{{ $category->description }}"
                                                    />
                                                    <x-share-error name="description" />
                                                </div>
                                            </div>
                                            <div class="upload__box">
                                                <div class="upload__btn-box">
                                                    <x-panel-label title="Image" nullable />
                                                    <br>
                                                    <label class="upload__btn">
                                                        <p>Upload Image</p>
                                                        <input
                                                            type="file"
                                                            name="image"
                                                            class="upload__inputfile"
                                                        >
                                                    </label>
                                                </div>
                                                <div class="upload__img-wrap"></div>
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
