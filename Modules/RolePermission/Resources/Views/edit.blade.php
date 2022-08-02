@extends('Panel::layouts.master')

@section('title', 'Edit role')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <x-panel-content-header title="Edit {{ $role->name }} role">
                <li class="breadcrumb-item active">
                    Edit role
                </li>
            </x-panel-content-header>
            <div class="content-body">
                <section id="basic-input">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('role-permissions.update', $role->id) }}" method="POST">
                                        <div class="row">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="id" value="{{ $role->id }}">
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="name" title="Name" />
                                                    <x-panel-input name="name" id="name" value="{{ $role->name }}"
                                                    placeholder="Enter name" />
                                                    <x-share-error name="name" />
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <x-panel-label for="permissions" title="Permissions" />
                                                    <br>
                                                    @foreach ($permissions as $permission)
                                                        <label class="form-check-label" for="permissions[{{ $permission->name }}]">
                                                            <input class="form-check-input"
                                                                   type="checkbox"
                                                                   id="permissions[{{ $permission->name }}]"
                                                                   name="permissions[{{ $permission->name }}]"
                                                                   value="{{ $permission->name }}"
                                                                   @if($role->hasPermissionTo($permission->name)) checked @endif>
                                                            {{ $permission->name }}
                                                        </label>
                                                    @endforeach
                                                    <x-share-error name="permissions" />
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
