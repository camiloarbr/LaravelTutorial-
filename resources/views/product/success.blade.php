@extends('layouts.app')

@section('title', 'Product Created Successfully')

@section('subtitle', 'Success')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        Product Created Successfully
                    </div>
                    <div class="card-body text-center">
                        <h4 class="text-success mb-3">
                            <i class="fas fa-check-circle"></i> Product created
                        </h4>
                        <p class="mb-4">Your product has been created successfully!</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('product.create') }}" class="btn btn-primary">
                                Create Another Product
                            </a>
                            <a href="{{ route('product.index') }}" class="btn btn-secondary">
                                View All Products
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
