@extends('admin.layout.main')
@section('body')
    @foreach($edits as $edit)
    <form action="{{route('tu_moi.updates',$edit->ID)}}" method="post" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="container">

            <div class="form-group">
                <label for="name">Name</label>

                    <input type="text" class="form-control" name="NAME" id="NAME" placeholder="Input NAME" value="{{$edit->NAME}}">

                @error('NAME')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">
                    Image Hiện Tại:
                    <span id="image_curent">

                            {{$edit->IMAGE}}

                    </span>
                </label>
            </div>
            <div class="form-group">
                <label for="IMAGE">image mới</label>
                <input type="file" class="form-control" name="file_upload" id="IMAGE" placeholder="Input image">
                @error('IMAGE')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Phiên Âm</label>
                <input type="text" class="form-control" name="PHIEN_AM" id="PHIEN_AM" placeholder="Input phien am" value="{{$edit->PHIEN_AM}}">
                @error('PHIEN_AM')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Từ Loại</label>
                <input type="text" class="form-control" name="TU_LOAI" id="TU_LOAI" placeholder="Input tu loai" value="{{$edit->TU_LOAI}}">
                @error('TU_LOAI')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">
                    Audio Hiện Tại:
                    <span id="image_curent">

                            {{$edit->AUDIO}}

                    </span>
                </label>
            </div>
            <div class="form-group">
                <label for="IMAGE">Audio Mới</label>
                <input type="file" class="form-control" name="file_upload_audio" id="AUDIO" placeholder="Input audio">
                @error('AUDIO')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">VÍ DỤ</label>
                <input type="text" class="form-control" name="VI_DU" id="VI_DU" placeholder="Input vi du" value="{{$edit->VI_DU}}">
                @error('VI_DU')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Chế Từ</label>
                <input type="text" class="form-control" name="CHE_TU" id="CHE_TU" placeholder="Input chế từ" value="{{$edit->CHE_TU}}">
                @error('CHE_TU')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Cấu Trúc Câu</label>
                <input type="text" class="form-control" name="CAU_TRUC_CAU" id="CAU_TRUC_CAU" placeholder="Input cấu trúc câu" value="{{$edit->CAU_TRUC_CAU}}">
                @error('CAU_TRUC_CAU')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">
                    Chủ Đề Hiện Tại:
                    <span id="image_curent">

                            {{$edit->CHU_DE_NAME}}

                    </span>
                </label>
            </div>
            <div class="form-group">
                <label for="">Chủ Đề Mới</label>
                <select name="CHU_DE_ID">
                    <option value="">--select one--</option>
                    @foreach($subjects as $category)
                        <option value="{{$category->ID}}">{{$category->CHU_DE_NAME}}</option>
                    @endforeach
                </select>
                @error('CHU_DE')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">
                    Trạng Thái Hiện Tại:
                    <span id="image_curent">

                            @if($edit->STATUS==1)
                                Hiện
                                @else
                                Ẩn
                        @endif

                    </span>
                </label>
            </div>
            <label for="status">Trạng Thái:</label><br>
            <div class="">
                <input type="radio" id="AN" name="STATUS" value="0">
                <label for="AN">ẨN</label>
                <input type="radio" id="HIEN" name="STATUS" value="1">
                <label for="HIEN">HIỆN</label><br>
            </div>
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
