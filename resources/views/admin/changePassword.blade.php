@extends('admin.admin_master')

@section('title')
    Admin Change Password
@endsection

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Change Password</h4>

                            @if(count($errors))
                                @foreach($errors->all() as $error)
                                    <p class="alert alert-danger alert-dismissable fade show">{{ $error }}</p>
                                @endforeach
                            @endif


                            <form action="{{ route('update.password') }}" method="post" enctype="multipart/form-data"><br>
                                @csrf

                                <div class="row mb-3">
                                    <label for="username" class="col-sm-2 col-form-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input name="oldpassword" class="form-control" type="password" id="oldpassword">
                                    </div>
                                </div><div class="row mb-3">
                                    <label for="username" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input name="newpassword" class="form-control" type="password" id="newpassword">
                                    </div>
                                </div><div class="row mb-3">
                                    <label for="username" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input name="confirmpassword" class="form-control" type="password" id="confirmpassword">
                                    </div>
                                </div>

                                <div>
                                    <label for="" class="col-sm-2 col-form-label"></label>
                                    <input type="submit" class="btn btn-info  waves-effect waves-light" value="Change Password">

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
