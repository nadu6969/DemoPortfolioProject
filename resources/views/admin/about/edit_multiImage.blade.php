@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Update Mutli Image</h4> <br>
                            <form action="{{ route('update.multi.image') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $multiImage->id }}">

                                <div class="row mb-3">
                                    <label for="multi_image" class="col-sm-2 col-form-label"> About Multi Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="multi_image" class="form-control"   id="image">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="multiimage" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg"
                                             src="{{ $multiImage->multi_image }}" alt="Card image cap">
                                    </div>
                                </div>
                                <div class=" mt-3">
                                    <label for="" class="col-sm-2 col-form-label"></label>
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Update Multiple Image</button>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#image').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

@endsection

}






