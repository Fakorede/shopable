@extends('admin.layout')

@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Shopable</a>
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Admin Dashboard</a>
        <span class="breadcrumb-item active">Newsletter Subscribers</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
        <h5>Newsletter Subscribers</h5>
        </div>

        <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">
            Subscribers List
            {{-- <a href="#" class="btn btn-warning btn-sm" style="float:right;" data-toggle="modal" data-target="#modal">Add New</a> --}}
        </h6>

        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
            <thead>
                <tr>
                <th class="wd-15p">ID</th>
                <th class="wd-15p">Email</th>
                <th class="wd-15p">Subscription Date</th>
                <th class="wd-20p">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($newsletters as $key => $newsletter)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $newsletter->email }}</td>
                        <td>{{ \Carbon\Carbon::parse($newsletter->created_at)->diffForHumans() }}</td>
                        <td>
                            <a href="{{ URL::to('admin/newsletters/delete/' . $newsletter->id) }}" class="btn btn-danger btn-sm" id="delete">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div><!-- table-wrapper -->
        </div><!-- card -->

    </div><!-- sl-pagebody -->
</div>


<!-- modal -->
<div id="modal" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add New newsletter</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.coupon.store') }}" method="POST">
                @csrf
                <div class="modal-body pd-20">
                        <div class="form-group">
                            <label for="code">Coupon Code</label>
                            <input type="text" class="form-control" id="code" aria-describedby="code" placeholder="Enter Coupon Name" name="code">
                        </div>
                        <div class="form-group">
                            <label for="discount">Coupon Discount(%)</label>
                            <input type="text" class="form-control" id="discount" aria-describedby="discount" placeholder="Enter Percentage ex 5, 10" name="discount">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div>
@endsection