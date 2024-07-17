@extends('admin.master')


@section('title')
    Sub-Category
@endsection

@section('body')
    <div class="page-header">
        <div>
            <h1 class="page-title">Create Sub-Category</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Create Sub-Category Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('sub-category.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <select class="form-control" name="category_id">
                                    <option value="">-- Select Category Name --</option>
                                    {{-- <option value="">Category Name</option> --}}
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Sub-Category Name</label>
                            <div class="col-md-9">
                                <input class="form-control" name="name" id="firstName" placeholder="Enter sub-category name" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Sub-Category Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="description" id="lastName" placeholder="Enter description" type="text"></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Sub-Category Image</label>
                            <div class="col-md-9">
                                <input class="form-control" name="image" id="email" type="file">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9">
                                <label><input name="status" type="radio" value="1" checked> Published</label>
                                <label><input  name="status" type="radio" value="0"> Unpublished</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Create New Sub-Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
