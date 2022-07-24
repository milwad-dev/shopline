@extends('Panel::layouts.master')

@section('title', "Update $user->name user")

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Update {{ $user->name }} user</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('panel.index') }}">Panel</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="#">Users</a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        Update user
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
                                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                                        <div class="row">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                            <div class="col-xl-4 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="name">Name</label>
                                                    <input class="form-control @error('name') is-invalid @enderror"
                                                    type="text" id="name" name="name" placeholder="Enter name"
                                                    value="{{ $user->name }}">
                                                    <x-share-error name="name" />
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="email">Email</label>
                                                    <input class="form-control @error('email') is-invalid @enderror"
                                                    type="email" id="email" name="email" placeholder="Enter email"
                                                    value="{{ $user->email }}">
                                                    <x-share-error name="email" />
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="phone">Phone</label>
                                                    <input class="form-control @error('phone') is-invalid @enderror"
                                                    type="number" id="phone" name="phone" placeholder="Enter phone"
                                                    value="{{ $user->phone }}">
                                                    <x-share-error name="phone" />
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="password">Password</label>
                                                    <input class="form-control @error('password') is-invalid @enderror"
                                                    type="password" id="password" name="password" placeholder="Enter password"
                                                    value="{{ $user->password }}">
                                                    <x-share-error name="password" />
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="type">Type</label>
                                                    <select class="form-control @error('type') is-invalid @enderror"
                                                        name="type" id="type">
                                                        @foreach (Modules\User\Enums\UserTypeEnum::cases() as $type)
                                                            <option @if ($user->type === $type->value) selected @endif
                                                                value="{{ $type->value }}">{{ $type->value }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <x-share-error name="type" />
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
