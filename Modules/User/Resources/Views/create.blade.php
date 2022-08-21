@extends('Panel::layouts.master')

@section('title', 'New user')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <x-panel-content-header title="Create new user">
                <li class="breadcrumb-item active">
                    Create user
                </li>
            </x-panel-content-header>
            <div class="content-body">
                <section id="basic-input">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('users.store') }}" method="POST">
                                        <div class="row">
                                            @csrf
                                            <div class="col-xl-4 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="name" title="Name" />
                                                    <x-panel-input name="name" id="name" value="{{ old('name') }}"
                                                    placeholder="Enter name" />
                                                    <x-share-error name="name" />
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="email" title="Email" />
                                                    <x-panel-input name="email" id="email" value="{{ old('email') }}"
                                                    type="email" placeholder="Enter email" />
                                                    <x-share-error name="email" />
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="phone" title="Phone" />
                                                    <x-panel-input name="phone" id="phone" value="{{ old('phone') }}"
                                                    type="number" placeholder="Enter phone" />
                                                    <x-share-error name="phone" />
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="password" title="Password" />
                                                    <x-panel-input name="password" id="password" value="{{ old('password') }}"
                                                    type="password" placeholder="Enter password" />
                                                    <x-share-error name="password" />
                                                    @include('Share::password-rules')
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="type" title="Type" />
                                                    <x-panel-select name="type" id="type" selectedText="Select type user">
                                                        @foreach (Modules\User\Enums\UserTypeEnum::cases() as $type)
                                                            <option value="{{ $type->value }}">{{ $type->value }}</option>
                                                        @endforeach
                                                    </x-panel-select>
                                                    <x-share-error name="type" />
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <div class="form-check form-check-inline">
                                                        <x-panel-label for="email_verified_at" title="Email verify"
                                                        class="form-label-label" />
                                                        <x-panel-input name="email_verified_at" id="email_verified_at"
                                                        type="checkbox" class="form-check-input" value="1"
                                                        @if (old('email_verified_at')) checked @endif />
                                                    </div>
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
