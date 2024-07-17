@extends('admin.master')


@section('title')
    Brand
@endsection

@section('body')
    <div class="page-header">
        <div>
            <h1 class="page-title">Update Brand</h1>
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
                    <h3 class="card-title">Update Brand Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('brand.update', ['id' => $brand->id])}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Brand Name</label>
                            <div class="col-md-9">
                                <input class="form-control" name="name" id="firstName" placeholder="Enter name" type="text" value="{{$brand->name}}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Brand Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="description" id="lastName" placeholder="Enter description" type="text">{{$brand->description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Brand Image</label>
                            <div class="col-md-9">
                                <input class="form-control" name="image" id="email" type="file">
                                <img src="{{asset($brand->image)}}" width="120px">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9">
                                <label><input name="status" type="radio" value="1" {{$brand->status == 1 ? 'checked' : ''}}> Published</label>
                                <label><input  name="status" type="radio" value="0" {{$brand->status != 1 ? 'checked' : ''}}> Unpublished</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update Brand</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
