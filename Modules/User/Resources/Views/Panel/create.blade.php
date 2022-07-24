@extends('Panel::layouts.master')

@section('title', 'New user')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Create new user</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('panel.index') }}">Panel</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="#">Users</a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        Create user
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                                    <label class="form-label" for="name">Name</label>
                                                    <input class="form-control @error('name') is-invalid @enderror"
                                                    type="text" id="name" name="name" placeholder="Enter name"
                                                    value="{{ old('name') }}">
                                                    @error('name')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="email">Email</label>
                                                    <input class="form-control @error('email') is-invalid @enderror"
                                                    type="email" id="email" name="email" placeholder="Enter email"
                                                    value="{{ old('email') }}">
                                                    @error('email')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="phone">Phone</label>
                                                    <input class="form-control @error('phone') is-invalid @enderror"
                                                    type="number" id="phone" name="phone" placeholder="Enter phone"
                                                    value="{{ old('phone') }}">
                                                    @error('phone')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="password">Password</label>
                                                    <input class="form-control @error('password') is-invalid @enderror"
                                                    type="password" id="password" name="password" placeholder="Enter password"
                                                    value="{{ old('password') }}">
                                                    @error('password')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="type">Type</label>
                                                    <select class="form-control @error('type') is-invalid @enderror"
                                                        name="type" id="type">
                                                        <option value="" selected>Select type user</option>
                                                        @foreach (Modules\User\Enums\UserTypeEnum::cases() as $type)
                                                            <option value="{{ $type->value }}">{{ $type->value }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('type')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-label-label" for="email_verified_at">Email verify</label>
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
