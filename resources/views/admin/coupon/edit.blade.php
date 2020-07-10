@extends('admin.layout')

@section('content')

 <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Shopable</a>
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Admin Dashboard</a>
        <a class="breadcrumb-item" href="{{ route('admin.coupon.index') }}">Coupons</a>
        <span class="breadcrumb-item active">Update Coupon</span>
    </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Update Coupon</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Coupon Update
   
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

            <form method="post" action="{{ route('admin.coupon.update', $coupon->id) }}">
                @csrf

                <div class="modal-body pd-20"> 
                    <div class="form-group">
                        <label for="code">Coupon Code</label>
                        <input type="text" class="form-control" id="code" aria-describedby="code" value="{{ $coupon->code }}" name="code" placeholder="Enter Coupon Code">   
                    </div>
                </div>
                <div class="modal-body pd-20"> 
                    <div class="form-group">
                        <label for="discount">Coupon Discount</label>
                        <input type="text" class="form-control" id="discount" aria-describedby="discount" value="{{ $coupon->discount }}" name="discount" placeholder="Enter Coupon Discount ex 5, 10, 15">   
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