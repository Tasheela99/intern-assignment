@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header fw-bold fs-1 text-center">{{ __('Products Management System') }}</div>

                    <div class="card-body">
                        <form action="/add-products-action" method="post" class="form" enctype="multipart/form-data">
                            <h2 class="title fs-2 fw-bold py-4">Add Product</h2>
                            @csrf
                            <input type="text" class="form-control mb-3" placeholder="Name" name="name"
                                    required>
                            <textarea type="text" class="form-control mb-3" placeholder="Description" name="description"
                                      rows="4" required>{{ old('description') }}</textarea>

                            <input type="number" class="form-control mb-3" placeholder="Price" name="price"
                                   required>

                            <input type="file" class="form-control mb-3" placeholder="Image" name="image" required>

                            <button type="submit" class="btn btn-primary">Save Product</button>
                            <button type="reset" class="btn btn-danger">Cancel</button>

                        </form>
                    </div>
                </div>
                @if(count($productModal) !== 0)
                    <div class="card">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($productModal as $item)
                                            <tr>
                                                <td><img src="product_image/{{ $item->image}}" width="200"/></td>
                                                <td>{{ $item->name}}</td>
                                                <td>{{ $item->description}}</td>
                                                <td>{{ $item->price}}</td>
                                                <td><a href="/update/{{$item->id}}"
                                                       class="btn btn-success w-100">Update</a>
                                                </td>
                                                <td><a href="/delete/{{$item->id}}"
                                                       class="btn btn-danger w-100">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
