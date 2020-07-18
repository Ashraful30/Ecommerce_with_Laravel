@extends('layouts.adminLayout.admin_design')
@section('content')
    
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
     <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Admin Settings</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Settings</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
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
            <h5 class="card-header">Update Password</h5>
            <div class="card-body">
                <form action="{{ url('/admin/update-password') }}" method="post">@csrf
                    <div class="form-group row">
                        <label for="current_password" class="col-sm-2 col-from-label">Current Password</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Current Password" required>
                        </div>
                        <div class="col-sm-4" id="check_message">
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="new_password" class="col-sm-2 col-from-label">New Password</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password" required>
                        </div>
                        <div class="col-sm-4" id="new_message">
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="confirm_password" class="col-sm-2 col-from-label">Confirm Password</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
                        </div>
                        <div class="col-sm-4" id="confirm_message">
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-sm-2">
                            <button style="margin-left: 10px;" type="submit" id="update_password" name="update_password" class="btn btn-success">Update Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
       
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    @include('layouts.adminLayout.admin_footer')
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>

@endsection