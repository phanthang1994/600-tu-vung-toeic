@extends('admin.layout.main')
@section('body')
    <form action="{{route('category.stores')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="CATEGORY_NAME" id="CATEGORY_NAME" placeholder="Input name">
                    @error('CATEGORY_NAME')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="IMAGE">image</label>
                    <input type="file" class="form-control" name="file_upload" id="IMAGE" placeholder="Input image">
                    @error('IMAGE')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <label for="status">Trạng Thái:</label><br>
                <div class="">
                    <input type="radio" id="AN" name="TRANG_THAI" value="0">
                    <label for="AN">ẨN</label>
                    <input type="radio" id="HIEN" name="TRANG_THAI" value="1">
                    <label for="HIEN">HIỆN</label><br>
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
