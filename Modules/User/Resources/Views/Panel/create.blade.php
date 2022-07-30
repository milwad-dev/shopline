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
                                                    <x-pane-label for="name" title="Name" />
                                                    <input class="form-control @error('name') is-invalid @enderror"
                                                    type="text" id="name" name="name" placeholder="Enter name"
                                                    value="{{ old('name') }}">
                                                    <x-share-error name="name" />
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-pane-label for="email" title="Email" />
                                                    <input class="form-control @error('email') is-invalid @enderror"
                                                    type="email" id="email" name="email" placeholder="Enter email"
                                                    value="{{ old('email') }}">
                                                    <x-share-error name="email" />
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-pane-label for="phone" title="Phone" />
                                                    <input class="form-control @error('phone') is-invalid @enderror"
                                                    type="number" id="phone" name="phone" placeholder="Enter phone"
                                                    value="{{ old('phone') }}">
                                                    <x-share-error name="phone" />
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-pane-label for="password" title="Password" />
                                                    <input class="form-control @error('password') is-invalid @enderror"
                                                    type="password" id="password" name="password" placeholder="Enter password"
                                                    value="{{ old('password') }}">
                                                    <x-share-error name="password" />
                                                    <p>
                                                        Password must have a capital & lower letters with number & special character(Milwad123!).
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-pane-label for="type" title="Type" />
                                                    <select class="form-control @error('type') is-invalid @enderror"
                                                        name="type" id="type">
                                                        <option value="" selected>Select type user</option>
                                                        @foreach (Modules\User\Enums\UserTypeEnum::cases() as $type)
                                                            <option value="{{ $type->value }}">{{ $type->value }}</option>
                                                        @endforeach
                                                    </select>
                                                    <x-share-error name="type" />
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <div class="form-check form-check-inline">
                                                        <x-pane-label for="email_verified_at" title="Email verify"
                                                        class="form-label-label" />
                                                        <input class="form-check-input"
                                                        type="checkbox" id="email_verified_at" name="email_verified_at"
                                                        @if (old('email_verified_at')) checked @endif value="1">
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary waves-effect waves-float waves-light" type="submit">
                                                Submit
                                            </button>
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
