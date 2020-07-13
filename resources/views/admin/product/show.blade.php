@extends('admin.layout')

@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Shopable</a>
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Admin Dashboard</a>
        <a class="breadcrumb-item" href="{{ route('admin.products.index') }}">Products</a>
        <span class="breadcrumb-item active">View Product</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Product Details</h5>
            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-info btn-sm" style="float:right;">Edit</a><br>
        </div>

        <div class="card pd-20 pd-sm-40">
  
                  <div class="form-layout">
                    <div class="row mg-b-25">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Product Name:</label><br>
                          <strong>{{ $product->name }}</strong>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Product Code:</label><br>
                          <strong>{{ $product->code }}</strong>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Quantity:</label><br>
                          <strong>{{ $product->quantity }}</strong>
                        </div>
                      </div>
                       <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Discount Price:</label><br>
                          <strong>{{ $product->discount_price }}</strong>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                          <label class="form-control-label">Category</label><br>
                          <strong>{{ $product->cname }}</strong>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                          <label class="form-control-label">Sub Category</label><br>
                          <strong>{{ $product->sname }}</strong>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                          <label class="form-control-label">Brand:</label><br>
                          <strong>{{ $product->bname }}</strong>
                        </div>
                      </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label">Product Size:</label><br>
                          <strong>{{ $product->size }}</strong>
                        </div>
                      </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label">Product Color:</label><br>
                          <strong>{{ $product->color }}</strong>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label">Product Price:</label><br>
                          <strong>{{ $product->price }}</strong>
                        </div>
                      </div>
                       <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label">Product Description:</label><br>
                          <p>{!! $product->description !!}</p>
                        </div>
                      </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label">Video Link:</label><br>
                          <strong>{{ $product->video_link }}</strong>
                        </div>
                      </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Image One ( Main Thumbnali): 
                            </label><br>
                            <img src="{{ URL::to($product->image_one) }}" style="height:80px;width:80px;">
                        </div>
                    </div><!-- col-4 -->
        
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Image Two:</label><br>
                            <img src="{{ URL::to($product->image_two) }}" style="height:80px;width:80px;">
                        </div>
                      </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Image Three: </label><br>
                            <img src="{{ URL::to($product->image_three) }}" style="height:80px;width:80px;">
                        </div>
                    </div><!-- col-4 --> 
        
                </div><!-- row -->
        
                <hr>
                <br><br>
        
                <div class="row">
        
                    <div class="col-lg-4">
                        <label>
                            <span>Main Slider</span>
                            @if ($product->main_slider == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </label>
                    </div> <!-- col-4 --> 
        
                    <div class="col-lg-4">
                        <label>
                            <span>Hot Deal</span>
                            @if ($product->hot_deal == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </label>
                    </div> <!-- col-4 --> 

                    <div class="col-lg-4">
                        <label>
                            <span>Best Rated</span>
                            @if ($product->best_rated == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </label>
                    </div> <!-- col-4 --> 

                    <div class="col-lg-4">
                        <label>
                            <span>Trending</span>
                            @if ($product->trending == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </label>
                    </div> <!-- col-4 --> 
        
                    <div class="col-lg-4">
                        <label>
                            <span>Mid Slider</span>
                            @if ($product->mid_slider == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </label>
                    </div> <!-- col-4 --> 
        
                    <div class="col-lg-4">
                        <label>
                            <span>Hot New</span>
                            @if ($product->hot_new == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </label>
                    </div> <!-- col-4 --> 
        
                    <div class="col-lg-4">
                        <label>
                            <span>Buyone Getone</span>
                            @if ($product->buyone_getone == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </label>
                    </div> <!-- col-4 --> 
         
        
                </div><!-- end row --> 
                <br><br>
        
            </div><!-- form-layout -->

        {{-- </div><!-- card --> --}}
        
        </div><!-- card -->

    </div><!-- sl-pagebody -->
</div>


@endsection

