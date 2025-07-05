@extends('Panel::layouts.master')

@section('title', 'Products')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <x-panel-content-header title="Latest products" createRoute="{{ route('products.create') }}"
            createTitle="Create product" />
            <div class="content-body">
                <div class="row" id="table-hover-row">
                    <div class="col-12">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>First image</th>
                                            <th>Title</th>
                                            <th>Sku</th>
                                            <th>Price</th>
                                            <th>Count</th>
                                            <th>Status</th>
                                            <th>Vendor</th>
                                            <th>Tags</th>
                                            <th>Categories</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr class="text-center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img src="{{ $product->first_media->thumb }}" class="me-75"
                                                    height="20" width="20">
                                                </td>
                                                <td>
                                                    {{ $product->title }}
                                                </td>
                                                <td>
                                                    <span class="badge badge-light-dark me-1">
                                                        {{ $product->sku }}
                                                    </span>
                                                </td>
                                                <td>
                                                    ${{ number_format($product->price) }}
                                                </td>
                                                <td>
                                                    {{ $product->count }}
                                                </td>
                                                <td>
                                                    <span class="badge rounded-pill badge-light-{{ $product->getCssClassStatus() }} me-1">
                                                        {{ $product->status }}
                                                    </span>
                                                </td>
                                                <td>
                                                    {{ $product->vendor->name }}
                                                </td>
                                                <td>
                                                    @foreach ($product->tags as $tag)
                                                        <span class="badge badge-light-primary">
                                                            {{ $tag->name }}
                                                        </span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($product->categories as $category)
                                                        <span class="badge badge-light-secondary">
                                                            {{ $category->title }}
                                                        </span>
                                                    @endforeach
                                                </td>
                                                <td>{{ Carbon\Carbon::make($product->created_at)->format('Y-m-d') }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0 waves-effect waves-float waves-light" data-bs-toggle="dropdown">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="{{ route('products.edit', $product->id) }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 me-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                                <span>Edit</span>
                                                            </a>
                                                            <a class="dropdown-item"
                                                               onclick="deleteItem(event, '{{ route('products.destroy', $product->id) }}')">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash me-50"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                                                <span>Delete</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
