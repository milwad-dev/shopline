@extends('Panel::layouts.master')

@section('title', 'Edit article')

@section('css')
    {{-- Select 2 css --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/vendors/css/forms/select/select2.min.css') }}">

    {{-- Quill editor css --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/vendors/css/editors/quill/katex.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/vendors/css/editors/quill/monokai-sublime.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/vendors/css/editors/quill/quill.snow.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/vendors/css/editors/quill/quill.bubble.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/css/plugins/forms/form-quill-editor.min.css') }}">
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <x-panel-content-header title="Edit {{ $article->title }} article">
                <li class="breadcrumb-item active">
                    Edit article
                </li>
            </x-panel-content-header>
            <div class="content-body">
                <section id="basic-input">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                    <form action="{{ route('articles.update', $article->id) }}" method="POST"
                                        enctype="multipart/form-data" id="article-create">
                                        <div class="row">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="id" value="{{ $article->id }}">
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="title" title="Title" />
                                                    <x-panel-input name="title" id="title" value="{{ $article->title }}"
                                                    placeholder="Enter title" />
                                                    <x-share-error name="title" />
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="keywords" title="Keywords" />
                                                    <x-panel-input name="keywords" id="keywords" value="{{ $article->keywords }}"
                                                    placeholder="Enter keywords" />
                                                    <x-share-error name="keywords" />
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="select2-multiple" title="Status" />
                                                    <x-panel-select name="status" id="select2-multiple"
                                                        class="select2 form-select">
                                                        @foreach (Modules\Article\Enums\ArticleStatusEnum::cases() as $status)
                                                            <option @if ($article->status === $status->value) selected @endif
                                                                value="{{ $status->value }}">{{ $status->value }}
                                                            </option>
                                                        @endforeach
                                                    </x-panel-select>
                                                    <x-share-error name="categories" />
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="select2-multiple" title="Category" />
                                                    <x-panel-select name="categories[]" id="select2-multiple" multiple
                                                        class="select2 form-select">
                                                        @foreach ($categories as $category)
                                                            <option
                                                                @if ($article->checkSelectCategory($category->id)) selected @endif
                                                                value="{{ $category->id }}">{{ $category->title }}
                                                            </option>
                                                        @endforeach
                                                    </x-panel-select>
                                                    <x-share-error name="categories" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-12 col-md-6 col-12">
                                                    <x-panel-label for="description" title="Short description" />
                                                    <x-panel-textarea name="description" id="description" rows="2"
                                                    placeholder="Enter the short description" value="{{ $article->description }}" />
                                                    <x-share-error name="description" />
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-xl-12 col-md-12 col-12">
                                                    <x-panel-label for="image" title="Image" />
                                                    <x-panel-file name="image" id="image" />
                                                    <x-share-error name="image" />
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-12 col-12" style="margin-bottom: 80px">
                                                <x-panel-label for="body" title="Main description" />
                                                <div id="body">{!! $article->body !!}</div>
                                            </div>
                                            {{-- TODO Add tags --}}
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

@section('js')
    {{-- Select 2 JS --}}
    <script src="{{ asset('panel/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('panel/js/scripts/forms/form-select2.min.js') }}"></script>

    {{-- Quill editor JS --}}
    <script src="{{ asset('panel/vendors/js/editors/quill/katex.min.js') }}"></script>
    <script src="{{ asset('panel/vendors/js/editors/quill/highlight.min.js') }}"></script>
    <script src="{{ asset('panel/vendors/js/editors/quill/quill.min.js') }}"></script>
    <script src="{{ asset('panel/js/scripts/forms/form-quill-editor.min.js') }}"></script>
    <script>
        let quill = new Quill('#body', {
            modules: {
                toolbar: [
                    [{ 'font': [] }, { 'size': [] }],
                    [ 'bold', 'italic', 'underline', 'strike' ],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'script': 'super' }, { 'script': 'sub' }],
                    [{ 'header': '1' }, { 'header': '2' }, 'blockquote', 'code-block' ],
                    [{ 'list': 'ordered' }, { 'list': 'bullet'}, { 'indent': '-1' }, { 'indent': '+1' }],
                    [ 'direction', { 'align': [] }],
                    [ 'link', 'image', 'video', 'formula' ],
                    [ 'clean' ]
                ]
            },
            theme: 'snow',
        })
    </script>

    {{-- Editor --}}
    <script>
        let editor = document.querySelector('.ql-editor p');
        let form = document.getElementById('article-create');
        form.onsubmit = function() {
            let bodyInput = document.createElement("input");

            bodyInput.setAttribute("type", "hidden");
            bodyInput.setAttribute("name", "body");
            bodyInput.setAttribute("value", editor.innerHTML);

            form.append(bodyInput);
        };
    </script>
@endsection
