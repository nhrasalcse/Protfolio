@extends('backend.layouts.app')
@section('title','Profile Basic Information')
@section('css')
@endsection
@section('content')
    <div class="content-wrapper">
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Profile Basic Information</li>
        </ol>
    </section>
    <section class="content">

        <div class="row align-content-center">
            <div class="col-xs-12 ">
                <div class="box box-default">
                    <div class="row">
                        <div class="col-md-8">

                            <div class="box-header">
                                <h3 class="box-title">Profile Basic Information Form</h3>
                                </div>
                            <div class="register-box-body">
                                <form method="POST"  action="{{route('profilebasic.insert')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div  class="form-group has-feedback">
                                        <label for="address">About Me Details</label>
                                        <textarea     class="form-control @error('about_me') is-invalid @enderror" name="about_me" value="" placeholder="Enter About Me Details" >{{ old('about_me') }}</textarea>
                                        @error('about_me')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="address">Why Me Details</label>
                                        <textarea   class="form-control @error('why_me') is-invalid @enderror" name="why_me" value="" placeholder="Enter WHY MeDetails" >{{ old('why_me') }}</textarea>
                                        @error('why_me')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="address">My Vision</label>
                                        <textarea class="form-control @error('my_vision ') is-invalid @enderror" name="my_vision" value="" placeholder="Enter WHY MeDetails" >{{ old('my_vision') }}</textarea>
                                        @error('my_vision')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="address">Service Content</label>
                                        <textarea class="form-control @error('service_content ') is-invalid @enderror" name="service_content" value="" placeholder="Enter Service Content Details" >{{ old('service_content') }}</textarea>
                                        @error('service_content')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="address">Project Content</label>
                                        <textarea class="form-control @error('project_content ') is-invalid @enderror" name="project_content" value="" placeholder="Enter Project Content Details" >{{ old('project_content') }}</textarea>
                                        @error('project_content')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="address">Work & Education Content</label>
                                        <textarea class="form-control @error('work_education_content ') is-invalid @enderror" name="work_education_content" value="" placeholder="Enter Work & Education Content Details" >{{ old('work_education_content') }}</textarea>
                                        @error('work_education_content')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="address">Blog Content</label>
                                        <textarea class="form-control @error('blog_content ') is-invalid @enderror" name="blog_content" value="" placeholder="EnterBlog Content Details" >{{ old('blog_content') }}</textarea>
                                        @error('blog_content')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="address">Hire Content</label>
                                        <textarea class="form-control @error('hire_content ') is-invalid @enderror" name="hire_content" value="" placeholder="Enter Hire Content Details" >{{ old('hire_content') }}</textarea>
                                        @error('hire_content')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="address">Client Content</label>
                                        <textarea class="form-control @error('client_content ') is-invalid @enderror" name="client_content" value="" placeholder="Enter Client Content Details" >{{ old('client_content') }}</textarea>
                                        @error('client_content')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="address"> Header Cover Image</label>
                                        <input type="file" class="form-control @error('header_cover_image') is-invalid @enderror" name="header_cover_image" value="{{ old('header_cover_image') }}" >
                                        @error('header_cover_image')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="address"> Review Cover Image</label>
                                        <input type="file" class="form-control @error('review_cover_image') is-invalid @enderror" name="review_cover_image" value="{{ old('review_cover_image') }}" >
                                        @error('review_cover_image')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    </div>
                                    <div class="row">
                                        <!-- /.col -->
                                        <div class="col-xs-4">
                                            <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

        </div>
        <!-- /.row -->

    </section>
    </div>
@endsection
@section('js')
    <script src="{{asset('backend/bower_components/ckeditor/ckeditor.js')}}"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1');
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>
    @endsection
