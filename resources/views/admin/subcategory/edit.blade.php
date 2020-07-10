@extends('admin.layout')

@section('content')

 <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Shopable</a>
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Admin Dashboard</a>
        <a class="breadcrumb-item" href="{{ route('admin.subcategory.index') }}">SubCategories</a>
        <span class="breadcrumb-item active">Update SubCategory</span>
    </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Update SubCategory</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">SubCategory Update
   
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

            <form method="post" action="{{ route('admin.subcategory.update', $subcategory->id) }}">
                @csrf

                <div class="modal-body pd-20"> 
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" aria-describedby="name" value="{{ $subcategory->name }}" name="name">   
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" name="category_id">
                            <option value="" disabled selected>-Select Category-</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $subcategory->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
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