@extends('admin.layout.main')
@section('body')
    <form action="{{route('category.save')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="category_name" id="CATEGORY_NAME" placeholder="Input name">
                </div>
                <div class="form-group">
                    <label for="image">image</label>
                    <input type="file" class="form-control" name="file_upload" id="image" placeholder="Input image">
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
