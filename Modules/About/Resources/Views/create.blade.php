@extends('Panel::layouts.master')

@section('title', 'New category')

@section('css')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

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
                                    @if (count($errors) > 1)
                                        @foreach ($errors->all() as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    @endif
                                    <form action="{{ route('abouts.store') }}" method="POST" id="form-container">
                                        <div class="row">
                                            @csrf
                                            <div class="row mb-5">
                                                <div class="col-xl-12 col-md-12 col-12">
                                                    <x-panel-label for="body" title="Body" />
                                                    <input type="hidden" name="body">
                                                    <div id="editor"></div>
                                                </div>
                                            </div>
                                            <div style="margin-top: 25px">
                                                <x-panel-button style="width: 100%" />
                                            </div>
                                        </div>
                                    </form>-
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
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js" type="text/javascript"></script>
    <script>
        const toolbar = [
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote', 'code-block'],
            [{ 'header': 1 }, { 'header': 2 }],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'script': 'sub'}, { 'script': 'super' }],
            [{ 'indent': '-1'}, { 'indent': '+1' }],
            [{ 'direction': 'rtl' }],
            [{ 'size': ['small', false, 'large', 'huge'] }],
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'font': [] }],
            [{ 'align': [] }],
            ['clean']
        ];

        let quill = new Quill('#editor', {
            modules: {toolbar},
            theme: 'snow'
        });

        let form = document.getElementById('form-container');
        form.onsubmit = function() {
            let body = document.querySelector('input[name=body]');
            body.value = JSON.stringify(quill.root.innerHTML.trim());
        };
    </script>
@endsection
