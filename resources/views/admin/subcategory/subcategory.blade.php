@extends('admin.layout')

@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Shopable</a>
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Admin Dashboard</a>
        <span class="breadcrumb-item active">SubCategory</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
        <h5>Subcategories</h5>
        </div>

        <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">
            SubCategory List
            <a href="#" class="btn btn-warning btn-sm" style="float:right;" data-toggle="modal" data-target="#modal">Add New</a>
        </h6>

        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
            <thead>
                <tr>
                <th class="wd-15p">ID</th>
                <th class="wd-15p">SubCategory</th>
                <th class="wd-15p">Category</th>
                <th class="wd-20p">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subcategories as $key => $subcategory)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $subcategory->name }}</td>
                        <td>{{ $subcategory->cname }}</td>
                        <td>
                            <a href="{{ route('admin.subcategory.edit', $subcategory->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <a href="{{ URL::to('admin/subcategories/delete/' . $subcategory->id) }}" class="btn btn-danger btn-sm" id="delete">Delete</a>
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
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Sub Category</h6>
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

            <form action="{{ route('admin.subcategory.store') }}" method="POST">
                @csrf
                <div class="modal-body pd-20">
                    <div class="form-group">
                        <label for="subcategory">SubCategory</label>
                        <input type="text" class="form-control" id="subcategory" aria-describedby="subcategory" placeholder="Enter SubCategory" name="subcategory">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" name="category_id">
                            <option value="" disabled selected>-Select Category-</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
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