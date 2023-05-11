@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Blog Category Page</h4> <br>
                            <form action="{{ route('update.blog.category',$blog_category->id) }}" method="post" >
                                @csrf

                                <div class="row mb-3">
                                    <label for="blog_category" class="col-sm-2 col-form-label">Blog Category Name</label>
                                    <div class="col-sm-10">
                                        <input name="blog_category" class="form-control"  value="{{ $blog_category->blog_category }}" type="text" id="title">
                                        @error('blog_category')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" mt-3">
                                    <label for="" class="col-sm-2 col-form-label"></label>
                                    <input type="submit" class="btn btn-info  waves-effect waves-light" value="Update Blog Category">

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection




