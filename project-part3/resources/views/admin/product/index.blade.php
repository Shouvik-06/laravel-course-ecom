@extends('admin.master')


@section('title')
    Product
@endsection

@section('body')
    <div class="page-header">
        <div>
            <h1 class="page-title">Manage Product</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>
    </div>
    <p>{{session('message')}}</p>

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All Product Information</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">SL. No</th>
                                <th class="wd-15p border-bottom-0">Category</th>
                                <th class="wd-15p border-bottom-0">Name</th>
                                <th class="wd-20p border-bottom-0">Selling Price</th>
                                <th class="wd-15p border-bottom-0">Image</th>
                                <th class="wd-10p border-bottom-0">Status</th>
                                <th class="wd-25p border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                           @foreach($products as $product)
                               <tr>
                                   <td>{{$loop->iteration}}</td>
                                   <td>{{$product->category->name}}</td>
                                   <td>{{$product->name}}</td>
                                   <td>${{$product->selling_price}}</td>
                                   <td><img src="{{asset($product->image)}}" alt="image" width="120px"></td>
                                   <td>{{$product->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                   <td>
                                    <a href="{{route('product.detail', ['id' => $product->id])}}" class="btn btn-info btn-sm" title="details">
                                        <i class="fa fa-book"></i>
                                    </a>
                                       <a href="{{route('product.edit', ['id' => $product->id])}}" class="btn btn-success btn-sm" title="edit">
                                           <i class="fa fa-edit"></i>
                                       </a>
                                       <a href="{{route('product.destroy', ['id' => $product->id])}}" class="btn btn-danger btn-sm" title="delete">
                                           <i class="fa fa-trash"></i>
                                       </a>
                                   </td>
                               </tr>
                           @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
