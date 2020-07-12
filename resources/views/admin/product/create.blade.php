@extends('admin.layout')

@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Shopable</a>
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Admin Dashboard</a>
        <span class="breadcrumb-item active">Add Product</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
        <h5>Add New Product</h5>
        <a href="{{ route('admin.products.index') }}" class="btn btn-info btn-sm pull-right">All Products</a><br>
        </div>

        <div class="card pd-20 pd-sm-40">
  
            <form method="post" action="{{ route('admin.products.store')}}" enctype="multipart/form-data">    
                @csrf
        
                  <div class="form-layout">
                    <div class="row mg-b-25">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                          <input class="form-control" type="text" name="name" required placeholder="Enter Product Name">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                          <input class="form-control" type="text" name="code" required placeholder="Enter Product Code">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                          <input class="form-control" type="text" name="quantity" required placeholder="Product Quantity">
                        </div>
                      </div>
                       <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Discount Price:</label>
                          <input class="form-control" type="text" name="discount_price" placeholder="Discount Price">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                          <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" required data-placeholder="Choose Category" name="category_id">
                            <option disabled selected label="Choose Category">--- choose category ---</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                          <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" required data-placeholder="Choose SubCategory" name="subcategory_id">
                            <option disabled selected label="Choose Sub Category">--- Choose Sub Category ---</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                          <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" required data-placeholder="Choose Brand" name="brand_id">
                            <option disabled selected label="Choose Brand">--- choose brand ---</option>
                            @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                             @endforeach
                          </select>
                        </div>
                      </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                          <input class="form-control" type="text" required name="size" id="size" data-role="tagsinput" placeholder="Product Size" >
                        </div>
                      </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
                          <input class="form-control" type="text" required name="color" id="color" data-role="tagsinput" placeholder="Product Color" >
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label">Product Price: <span class="tx-danger">*</span></label>
                          <input class="form-control" type="text" required name="price" placeholder="Product Price" >
                        </div>
                      </div>
                       <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label">Product Description: <span class="tx-danger">*</span></label>
                            <textarea class="form-control" id="summernote" required name="description" placeholder="Product Description"></textarea>     
                        </div>
                      </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label">Video Link:</label>
                          <input class="form-control" name="video_link" required placeholder="Link to Promo Video" >
                        </div>
                      </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Image One ( Main Thumbnali): <span class="tx-danger">*</span>
                            </label>
                            <label class="custom-file">
                                <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL(this);" required><br>
                                <span class="custom-file-control"></span>
                                <img src="#" id="one">
                            </label>
                        </div>
                    </div><!-- col-4 -->
        
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
                            <label class="custom-file">
                                <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL2(this);" required>
                                <span class="custom-file-control"></span>
                                <img src="#" id="two">
                            </label>
                        </div>
                      </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label>
                            <label class="custom-file">
                                <input type="file" id="file" class="custom-file-input" name="image_three" onchange="readURL3(this);" required><br>
                                <span class="custom-file-control"></span>
                                <img src="#" id="three">
                            </label>
                        </div>
                    </div><!-- col-4 --> 
        
                </div><!-- row -->
        
                <hr>
                <br><br>
        
                <div class="row">
        
                <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="main_slider" value="1">
                  <span>Main Slider</span>
                </label>
        
                </div> <!-- col-4 --> 
        
                 <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="hot_deal" value="1">
                  <span>Hot Deal</span>
                </label>
        
                </div> <!-- col-4 --> 
        
        
        
                 <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="best_rated" value="1">
                  <span>Best Rated</span>
                </label>
        
                </div> <!-- col-4 --> 
        
        
                 <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="trending" value="1">
                  <span>Trend Product </span>
                </label>
        
                </div> <!-- col-4 --> 
        
         <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="mid_slider" value="1">
                  <span>Mid Slider</span>
                </label>
        
                </div> <!-- col-4 --> 
        
        <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="hot_new" value="1">
                  <span>Hot New </span>
                </label>
        
                </div> <!-- col-4 --> 
        
        
                <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="buyone_getone" value="1">
                  <span>Buyone Getone</span>
                </label>
        
                </div> <!-- col-4 --> 
         
        
                  </div><!-- end row --> 
        <br><br>
        
        
                    <div class="form-layout-footer">
                      <button class="btn btn-info mg-r-5">Submit Form</button>
                      <button class="btn btn-secondary">Cancel</button>
                    </div><!-- form-layout-footer -->
                  </div><!-- form-layout -->
                </div><!-- card -->
        
                </form> 
           
          </div><!-- card -->

    </div><!-- sl-pagebody -->
</div>


@endsection

