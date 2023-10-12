@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header fs-1 fw-bold text-center">{{ __('Product Management System') }}</div>

                <div class="card-body">
                    <form action="/add-products-action" method="post" class="form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <h2 class="title fs-2 fw-bold py-4">Update Product</h2>
                            <div class="col-12 col-lg-6">
                                <label for="id">Id</label>
                                <input type="text" id="id" disabled class="form-control mb-3" value="{{ $productModal->id }}">
                                <input type="hidden" id="id"  class="form-control mb-3" placeholder="Name" name="id" value="{{ $productModal->id }}">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control mb-3" placeholder="Name" name="name" value="{{ $productModal->name }}">
                                <label for="description">Description</label>
                                <textarea class="form-control"  id="description" name="description" rows="4">{{ $productModal->description }}</textarea>
                                <label for="price">Price</label>
                                <input type="number" id="price" class="form-control mb-3" placeholder="Price" name="price" value="{{ $productModal->price }}">
                            </div>
                            <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center">

                                <img src="/product_image/{{ $productModal->image  }}"  width="200"/>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Product</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
