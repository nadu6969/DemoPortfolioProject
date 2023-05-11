@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Footer Page</h4>
                            <form action="{{ route('update.footer') }}" method="post" >
                                @csrf
                                <input type="hidden" name="id" value="{{$allfooter->id}}">

                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Number</label>
                                    <div class="col-sm-10">
                                        <input name="number" class="form-control" type="text" value="{{ $allfooter->number }}" id="title">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="short_description" class="col-sm-2 col-form-label">Short Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="short_description" id="" class="form-control" cols="" rows="10">{{ $allfooter->short_description }}</textarea>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input name="address" class="form-control" type="text" value="{{ $allfooter->address }}" id="title">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input name="email" class="form-control" type="email" value="{{ $allfooter->email }}" id="title">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Facebook</label>
                                    <div class="col-sm-10">
                                        <input name="facebook" class="form-control" type="text" value="{{ $allfooter->facebook }}" id="title">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Twitter</label>
                                    <div class="col-sm-10">
                                        <input name="twitter" class="form-control" type="text" value="{{ $allfooter->twitter }}" id="title">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Copyright</label>
                                    <div class="col-sm-10">
                                        <input name="copyright" class="form-control" type="text" value="{{ $allfooter->copyright }}" id="title">
                                    </div>
                                </div>


                                <div class=" mt-3">
                                    <label for="" class="col-sm-2 col-form-label"></label>
                                    <input type="submit" class="btn btn-info  waves-effect waves-light" value="Update Footer Page">

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


