@extends('admin.layout')

@section('content')

 <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Shopable</a>
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Admin Dashboard</a>
        <a class="breadcrumb-item" href="{{ route('admin.brand.index') }}">Brands</a>
        <span class="breadcrumb-item active">Update Brand</span>
    </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Update Brand</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Brand Update
   
          </h6>
           

        <div class="table-wrapper">
         
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ route('admin.brand.update', $brand->id) }}" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="old_logo" value="{{ $brand->logo }}">

                <div class="modal-body pd-20"> 
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" aria-describedby="name" value="{{ $brand->name }}" name="name">   
                    </div>
                </div>

                <div class="modal-body pd-20"> 
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" class="form-control" id="logo" aria-describedby="logo" name="logo"><br>
                        <img src="{{ URL::to($brand->logo) }}" width="70px" height="70px">
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">Update</button> 
                </div>

            </form>


        </div><!-- table-wrapper -->
    </div><!-- card -->

</div><!-- sl-mainpanel -->

@endsection