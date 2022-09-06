@extends('Panel::layouts.master')

@section('title', 'Edit product')

@section('css')
    {{-- Select 2 css --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/vendors/css/forms/select/select2.min.css') }}">

    {{-- Quill editor css --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/vendors/css/editors/quill/katex.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/vendors/css/editors/quill/monokai-sublime.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/vendors/css/editors/quill/quill.snow.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/vendors/css/editors/quill/quill.bubble.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/css/plugins/forms/form-quill-editor.min.css') }}">

    {{-- Touch spin css --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css') }}">

    {{-- Image css --}}
    <style>
        .upload__box {
            padding: 40px;
        }

        .upload__inputfile {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        .upload__btn {
            display: inline-block;
            font-weight: 600;
            color: #fff;
            text-align: center;
            min-width: 116px;
            padding: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid;
            background-color: #4045ba;
            border-color: #4045ba;
            border-radius: 10px;
            line-height: 26px;
            font-size: 14px;
        }

        .upload__btn:hover {
            background-color: unset;
            color: #4045ba;
            transition: all 0.3s ease;
        }

        .upload__btn-box {
            margin-bottom: 10px;
        }

        .upload__img-wrap {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .upload__img-box {
            width: 200px;
            padding: 0 10px;
            margin-bottom: 12px;
        }

        .upload__img-close {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 10px;
            right: 10px;
            text-align: center;
            line-height: 24px;
            z-index: 1;
            cursor: pointer;
        }

        .upload__img-close:after {
            font-size: 14px;
            color: white;
        }

        .img-bg {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            padding-bottom: 100%;
        }

    </style>
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <x-panel-content-header title="Edit {{ $product->title }} product">
                <li class="breadcrumb-item active">
                    Edit product
                </li>
            </x-panel-content-header>
            <div class="content-body">
                <section id="basic-input">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('products.update', $product->id) }}" method="POST"
                                        enctype="multipart/form-data" class="invoice-repeater" id="product-create">
                                        <div class="row">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="title" title="Title" />
                                                    <x-panel-input name="title" id="title" value="{{ $product->title }}"
                                                    placeholder="Enter title" />
                                                    <x-share-error name="title" />
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="type" title="Type" />
                                                    <x-panel-input name="type" id="type" value="{{ $product->type }}"
                                                    placeholder="Enter type" />
                                                    <x-share-error name="type" />
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="price" title="Price" />
                                                    <x-panel-input name="price" id="price" value="{{ $product->price }}"
                                                    class="form-control numeral-mask @error('price') is-invalid @enderror"
                                                    placeholder="Enter price" />
                                                    <x-share-error name="price" />
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="count" title="Count" />
                                                    <div class="demo-inline-spacing">
                                                        <div class="input-group">
                                                            <input type="number" class="touchspin" value="{{ $product->count }}"
                                                            name="count" id="count" />
                                                        </div>
                                                    </div>
                                                    <x-share-error name="count" />
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="select2-multiple" title="Category" />
                                                    <x-panel-select name="categories[]" id="select2-multiple" multiple
                                                        class="select2 form-select">
                                                        @foreach ($categories as $category)
                                                            <option @if ($product->checkSelectedCategoryies($category->id))
                                                                selected @endif
                                                                value="{{ $category->id }}">{{ $category->title }}
                                                            </option>
                                                        @endforeach
                                                    </x-panel-select>
                                                    <x-share-error name="categories" />
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="status" title="Status" />
                                                    <x-panel-select name="status" id="status">
                                                        @foreach (Modules\Product\Enums\ProductStatusEnum::cases() as $status)
                                                            <option @if ($product->status === $status->value) selected @endif
                                                                value="{{ $status->value }}">{{ $status->value }}
                                                            </option>
                                                        @endforeach
                                                    </x-panel-select>
                                                    <x-share-error name="status" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-12 col-md-6 col-12">
                                                    <x-panel-label for="short_description" title="Short description" />
                                                    <x-panel-textarea name="short_description" id="short_description" rows="2"
                                                    placeholder="Enter the short description" value="{{ $product->short_description }}" />
                                                    <x-share-error name="short_description" />
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-xl-12 col-md-12 col-12">
                                                    <x-panel-label for="first_media" title="First photo" />
                                                    <x-panel-file name="first_media" id="first_media" />
                                                    <x-share-error name="first_media" />
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-12 col-12 mb-5">
                                                <x-panel-label for="body" title="Main description" />
                                                <div id="body">{!! $product->body !!}</div>
                                            </div>
                                            <div class="upload__box">
                                                <div class="upload__btn-box">
                                                    <x-panel-label title="Galleries" />
                                                    <br>
                                                    <label class="upload__btn">
                                                        <p>Upload images</p>
                                                        <input type="file" multiple="" name="galleries[]"
                                                        data-max_length="20" class="upload__inputfile">
                                                    </label>
                                                </div>
                                                <div class="upload__img-wrap"></div>
                                            </div>
                                            <div class="row mb-5">
                                                <div class="mb-1">
                                                    <x-panel-label for="is_popular" title="Is popular" />
                                                    <x-panel-input name="is_popular" id="is_popular"
                                                    type="checkbox" class="form-check-input" value="1" />
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

    {{-- Touch spin JS --}}
    <script src="{{ asset('panel/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('panel/js/scripts/forms/form-number-input.min.js') }}"></script>

    {{-- Image service --}}
    <script>
        jQuery(document).ready(function () {
            ImgUpload();
        });
        function ImgUpload() {
            var imgWrap = "";
            var imgArray = [];

            $('.upload__inputfile').each(function () {
                $(this).on('change', function (e) {
                    imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                    var maxLength = $(this).attr('data-max_length');

                    var files = e.target.files;
                    var filesArr = Array.prototype.slice.call(files);
                    var iterator = 0;
                    filesArr.forEach(function (f, index) {

                        if (!f.type.match('image.*')) {
                            return;
                        }

                        if (imgArray.length > maxLength) {
                            return false
                        } else {
                            var len = 0;
                            for (var i = 0; i < imgArray.length; i++) {
                                if (imgArray[i] !== undefined) {
                                    len++;
                                }
                            }
                            if (len > maxLength) {
                                return false;
                            } else {
                                imgArray.push(f);

                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    var html = "<div class='upload__img-box'><div style='width: 80px; background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                    imgWrap.append(html);
                                    iterator++;
                                }
                                reader.readAsDataURL(f);
                            }
                        }
                    });
                });
            });

            $('body').on('click', ".upload__img-close", function (e) {
                var file = $(this).parent().data("file");
                for (var i = 0; i < imgArray.length; i++) {
                    if (imgArray[i].name === file) {
                        imgArray.splice(i, 1);
                        break;
                    }
                }
                $(this).parent().parent().remove();
            });
        }
    </script>

    {{-- Editor --}}
    <script>
        let editor = document.querySelector('.ql-editor p');
        let form = document.getElementById('product-create');
        form.onsubmit = function() {
            let bodyInput = document.createElement("input");

            bodyInput.setAttribute("type", "hidden");
            bodyInput.setAttribute("name", "body");
            bodyInput.setAttribute("value", editor.innerHTML);

            form.append(bodyInput);
        };
    </script>

    {{-- Price formatter JS --}}
    <script src="{{ asset('panel/vendors/js/forms/cleave/cleave.min.js') }}"></script>
    <script src="{{ asset('panel/vendors/js/forms/cleave/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('panel/js/scripts/forms/form-input-mask.min.js') }}"></script>
@endsection
