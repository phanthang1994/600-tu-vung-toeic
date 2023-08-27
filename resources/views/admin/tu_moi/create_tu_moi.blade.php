@extends('admin.layout.main')
@section('body')
    <form action="{{route('tu_moi.save')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Input name">
            </div>
            <div class="form-group">
                <label for="image">image</label>
                <input type="file" class="form-control" name="file_upload" id="image" placeholder="Input image">
            </div>
            <div class="form-group">
                <label for="phien_am">Phiên Âm</label>
                <input type="text" class="form-control" name="phien_am" id="phien_am" placeholder="Input phien am">
            </div>
            <div class="form-group">
                <label for="tu_loai">Từ Loại</label>
                <input type="text" class="form-control" name="tu_loai" id="tu_loai" placeholder="Input tu loai">
            </div>
            <div class="form-group">
                <label for="audio">Audio</label>
                <input type="file" class="form-control" name="file_upload_audio" id="audio" placeholder="Input audio">
            </div>
            <div class="form-group">
                <label for="vi_du">VÍ DỤ</label>
                <input type="text" class="form-control" name="vi_du" id="vi_du" placeholder="Input vi du">
            </div>
            <div class="form-group">
                <label for="che_tu">Chế Từ</label>
                <input type="text" class="form-control" name="che_tu" id="che_tu" placeholder="Input chế từ">
            </div>
            <div class="form-group">
                <label for="cau_truc_cau">Cấu Trúc Câu</label>
                <input type="text" class="form-control" name="cau_truc_cau" id="cau_truc_cau" placeholder="Input cấu trúc câu">
            </div>
            <div class="form-group">
                <label for="chu_de_id">Chủ Đề</label>
                <select name="chu_de_id">
                    <option value="">--select one--</option>
                    @foreach($subjects as $subject)
                        <option value="{{$subject->id}}">{{$subject->chu_de_name}}</option>
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
