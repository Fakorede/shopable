@extends('admin.layout')

@section('content')
<div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="{{ route('admin.home') }}">Shopable</a>
          <a class="breadcrumb-item" href="{{ route('admin.home') }}">Admin Dashboard</a>
          <span class="breadcrumb-item active">Categories</span>
        </nav>
  
        <div class="sl-pagebody">
          <div class="sl-page-title">
            <h5>Categories</h5>
          </div>
  
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">
                Category List
                <a href="#" class="btn btn-warning btn-sm" style="float:right;">Add New</a>
            </h6>
  
            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">ID</th>
                    <th class="wd-15p">Name</th>
                    <th class="wd-20p">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Tech</td>
                    <td>
                        <a href="" class="btn btn-info btn-sm">Edit</a>
                        <a href="" class="btn btn-danger btn-sm" id="delete">Delete</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div><!-- table-wrapper -->
          </div><!-- card -->

        </div><!-- sl-pagebody -->
      </div>
@endsection