@extends('admin.layout.main')
@section('body')
    <form action="{{route('tu_moi.readExcelFile')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="form-group">
                <label for="file_path">Name</label>
                <input type="text" class="form-control" name="file_path"
                       id="file_path" placeholder="Input name">
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
