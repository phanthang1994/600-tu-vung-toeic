@extends('admin.layout.main')
@section('body')
    @foreach($new_word as $nw)
    <form action="{{route('tu_moi.updates',$nw->id)}}" method="post" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="container">

            <div class="form-group">
                <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Input NAME" value="{{$nw->name}}">
            </div>
            <div class="form-group">
                <label for="">
                    Image Hiện Tại:
                    <span id="image_curent">
                            {{$nw->image}}
                    </span>
                </label>
            </div>
            <div class="form-group">
                <label for="image">image mới</label>
                <input type="file" class="form-control" name="file_upload" id="image" placeholder="Input image">
            </div>
            <div class="form-group">
                <label for="phien_am">Phiên Âm</label>
                <input type="text" class="form-control" name="phien_am" id="phien_am" placeholder="Input phien am" value="{{$nw->phien_am}}">
            </div>
            <div class="form-group">
                <label for="tu_loai">Từ Loại</label>
                <input type="text" class="form-control" name="tu_loai" id="tu_loai" placeholder="Input tu loai" value="{{$nw->tu_loai}}">
            </div>
            <div class="form-group">
                <label for="">
                    Audio Hiện Tại:
                    <span id="image_curent">
                            {{$nw->audio}}
                    </span>
                </label>
            </div>
            <div class="form-group">
                <label for="audio">Audio Mới</label>
                <input type="file" class="form-control" name="file_upload_audio" id="audio" placeholder="Input audio">
            </div>
            <div class="form-group">
                <label for="vi_du">VÍ DỤ</label>
                <input type="text" class="form-control" name="vi_du" id="vi_du" placeholder="Input vi du" value="{{$nw->vi_du}}">
            </div>
            <div class="form-group">
                <label for="che_tu">Chế Từ</label>
                <input type="text" class="form-control" name="che_tu" id="che_tu" placeholder="Input chế từ" value="{{$nw->che_tu}}">
            </div>
            <div class="form-group">
                <label for="cau_truc_cau">Cấu Trúc Câu</label>
                <input type="text" class="form-control" name="cau_truc_cau" id="cau_truc_cau" placeholder="Input cấu trúc câu" value="{{$nw->cau_truc_cau}}">
            </div>
            <div class="form-group">
                <label for="">
                    Chủ Đề Hiện Tại:
                    <span id="image_curent">

                            {{$nw->chu_de_name}}

                    </span>
                </label>
            </div>
            <div class="form-group">
                <label for="">Chủ Đề Mới</label>
                <select name="chu_de_id">
                    <option value="">--select one--</option>
                    @foreach($subjects as $subject)
                        <option value="{{$subject->id}}">{{$subject->chu_de_name}}</option>
                    @endforeach
                </select>
            </div>
{{--            <div class="form-group">--}}
{{--                <label for="">--}}
{{--                    Trạng Thái Hiện Tại:--}}
{{--                    <span id="image_curent">--}}

{{--                            @if($edit->STATUS==1)--}}
{{--                                Hiện--}}
{{--                                @else--}}
{{--                                Ẩn--}}
{{--                        @endif--}}

{{--                    </span>--}}
{{--                </label>--}}
{{--            </div>--}}
{{--            <label for="status">Trạng Thái:</label><br>--}}
{{--            <div class="">--}}
{{--                <input type="radio" id="AN" name="STATUS" value="0">--}}
{{--                <label for="AN">ẨN</label>--}}
{{--                <input type="radio" id="HIEN" name="STATUS" value="1">--}}
{{--                <label for="HIEN">HIỆN</label><br>--}}
{{--            </div>--}}
            <input type="submit" value="Submit">
        </div>
    </form>
    @endforeach
@stop()

@section('js')
    {{--    <script>--}}
    {{--        $(function () {--}}
    {{--            // Summernote--}}
    {{--            $('#content').summernote();--}}
    {{--        })--}}
    {{--    </script>--}}
@stop()
