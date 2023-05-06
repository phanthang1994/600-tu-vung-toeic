@extends('admin.layout.main')
@section('body')
    <form action="{{route('category.stores')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="category_name" id="CATEGORY_NAME" placeholder="Input name">
                    @error('category_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="IMAGE">image</label>
                    <input type="file" class="form-control" name="file_upload" id="IMAGE" placeholder="Input image">
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <input type="submit" value="Submit">
        </div>
    </form>
@stop()

@section('js')
{{--    <script>--}}
{{--        $(function () {--}}
{{--            // Summernote--}}
{{--            $('#content').summernote();--}}
{{--        })--}}
{{--    </script>--}}
@stop()
