@extends('admin.layout.main')
@section('body')
    <form action="{{route('chu_de.save')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="CHU_DE_NAME" id="CHU_DE_NAME" placeholder="Input name">
            </div>
            <div class="form-group">
                <label for="IMAGE">image</label>
                <input type="file" class="form-control" name="file_upload" id="IMAGE" placeholder="Input image">
            </div>
            <div class="form-group">
                <label for="">Category</label>
                <select name="CATEGORY_ID">
                    <option value="">--select one--</option>
                    @foreach($cats as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
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
