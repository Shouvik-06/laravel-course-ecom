@extends('admin.master')


@section('title')
    Product
@endsection

@section('body')
    <style>
        .product-detail-table th {
            background-color: #f0f0f0;
            border: 1px solid #bbb;
        }
        .product-detail-table tr {
            border: 1px solid #bbb;
        }
    </style>

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
                    <h3 class="card-title">Product Details</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table product-detail-table" id="basic-datatable">
                            <tr>
                                <th>Product ID</th>
                                <td>{{$product->id}}</td>
                            </tr>
                            <tr>
                                <th>Product Category</th>
                                <td>{{$product->category->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Sub-Category</th>
                                <td>{{$product->sub_category->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Brand</th>
                                <td>{{$product->brand->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Unit</th>
                                <td>{{$product->unit->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Name</th>
                                <td>{{$product->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Code</th>
                                <td>{{$product->code}}</td>
                            </tr>
                            <tr>
                                <th>Short Description</th>
                                <td>{{$product->short_description}}</td>
                            </tr>
                            <tr>
                                <th>Long Description</th>
                                {{-- <td>{{$product->long_description}}</td> --}}
                                <td>{!! $product->long_description !!}</td>
                            </tr>
                            <tr>
                                <th>Regular Price</th>
                                <td>${{$product->regular_price}}</td>
                            </tr>
                            <tr>
                                <th>Selling Price</th>
                                <td>${{$product->selling_price}}</td>
                            </tr>
                            <tr>
                                <th>Stock Amount</th>
                                <td>{{$product->stock_amount}}</td>
                            </tr>
                            <tr>
                                <th>Meta Title</th>
                                <td>{{$product->meta_title}}</td>
                            </tr>
                            <tr>
                                <th>Meta Description</th>
                                <td>{{$product->meta_description}}</td>
                            </tr>

                            <tr>
                                <th>Product Image</th>
                                <td><img src="{{asset($product->image)}}" alt="#" width="200px"></td>
                            </tr>
                            <tr>
                                <th>Product Other Images</th>
                                <td>
                                    @foreach($product->product_images as $product_image)
                                    <img src="{{asset($product_image->image)}}" alt="#" width="120px">
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Total Views</th>
                                <td>{{$product->hit_count}}</td>
                            </tr>
                            <tr>
                                <th>Total Sales</th>
                                <td>{{$product->sales_count}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{$product->status == 1 ? 'Published' : 'Unpublished'}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
