@extends('admin.layout.main')
@section('body')
    <form action="{{ route('category.save') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="category_name" id="CATEGORY_NAME" placeholder="Input name">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" placeholder="Input description"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="file_upload" id="image" placeholder="Input image">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
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
