@extends('layouts.adminLayout.admin_design')
@section('content')
    
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
     <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Add Category</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="min-height: 700px;">
        
        @if (Session::has('flash_message_success'))
            <div class="ext-center alert alert-success alert-dismissible fade show" role="alert">
                {!! session('flash_message_success') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (Session::has('flash_message_error'))
            <div class="ext-center alert alert-danger alert-dismissible fade show" role="alert">
                {!! session('flash_message_error') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    
        <div class="card">
            <h5 class="card-header">Add Category</h5>
            <div class="card-body">
                <form action="{{ url('/admin/add-category') }}" method="post">@csrf
                    <div class="form-group row">
                        <label for="category_title" class="col-sm-2 col-from-label">Category Title</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="category_title" id="category_title" placeholder="Category Title" required>
                        </div>
                        <div class="col-sm-4" id="checkk_message">
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="category_description" class="col-sm-2 col-from-label">Category Description</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="category_description" id="category_description" rows="5" placeholder="Category Description" required></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="category_url" class="col-sm-2 col-from-label">Category url</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="category_url" id="category_url" placeholder="Category url" required>
                        </div>
                        <div class="col-sm-4" id="checkk_message">
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-sm-2">
                            <button style="margin-left: 10px;" type="submit" id="add_category" name="add_category" class="btn btn-success">Add Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    
    </div>

    
    @include('layouts.adminLayout.admin_footer')
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>

@endsection