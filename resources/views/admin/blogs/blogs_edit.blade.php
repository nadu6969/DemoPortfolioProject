@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script type="text/css">
        .bootstrap-tagsinput .tag{
            margin-right: 2px;
            color: green;
            font-weight : 700;
        }
    </script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Blogs Page</h4>
                            <form action="{{ route('update.blog') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $blogs->id }}">

                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Blog Category Name</label>
                                    <div class="col-sm-10">
                                        <select name="blog_category_id" class="form-select" aria-label="Default select Example" id="">
                                            <option value="" selected>Open this select menu</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $blogs->blog_category_id ? 'selected' : '' }} >{{ $category->blog_category }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="short_title" class="col-sm-2 col-form-label">Blog Title</label>
                                    <div class="col-sm-10">
                                        <input name="blog_title" class="form-control" value="{{ $blogs->blog_title }}" type="text"  id="short_title">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="short_title" class="col-sm-2 col-form-label">Blog Tags</label>
                                    <div class="col-sm-10">
                                        <input name="blog_tags" class="form-control" value="{{ $blogs->blog_tags }}" type="text"  data-role="tagsinput">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="long_description" class="col-sm-2 col-form-label">Blog Description</label>
                                    <div class="col-sm-10">
                                        <textarea  id="elm1" name="blog_description">{!! $blogs->blog_description !!}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="portfolio_image" class="col-sm-2 col-form-label">Blog Image</label>
                                    <div class="col-sm-10">
                                        <input name="blog_image" class="form-control" type="file"  id="image">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="username" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg"
                                             src="{{ asset($blogs->blog_image) }}" alt="Card image cap">
                                    </div>
                                </div>
                                <div class=" mt-3">
                                    <label for="" class="col-sm-2 col-form-label"></label>
                                    <input type="submit" class="btn btn-info  waves-effect waves-light" value="Update Blog Data">

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



