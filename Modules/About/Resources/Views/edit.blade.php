@extends('Panel::layouts.master')

@section('title', 'Update about')

@section('css')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <x-panel-content-header title="Update about">
                <li class="breadcrumb-item active">
                    Update about
                </li>
            </x-panel-content-header>
            <div class="content-body">
                <section id="basic-input">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <x-panel-all-error />
                                    <form action="{{ route('abouts.update', $about->id) }}" method="POST" id="form-container">
                                        <div class="row">
                                            @csrf
                                            @method('PATCH')
                                            <div class="row mb-5">
                                                <div class="col-xl-12 col-md-12 col-12">
                                                    <x-panel-label for="body" title="Body" />
                                                    <input type="hidden" name="body">
                                                    <div id="editor">
                                                        {!! $about->body !!}
                                                    </div>
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
    <script src="{{ asset('panel/js/scripts/quill-config.js') }}" type="text/javascript"></script>
@endsection
