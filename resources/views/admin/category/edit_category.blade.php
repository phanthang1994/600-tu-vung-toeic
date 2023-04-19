@extends('admin.layout.main')
@section('body')
    @foreach($categories as $edit)
        <form action="{{route('category.updates',$edit->ID)}}" method="post" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="container">
                <div class="form-group">
                    ID: <span>{{$edit->ID}}</span>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="CATEGORY_NAME" id="CATEGORY_NAME" placeholder="Input name"
                           value="{{$edit->CATEGORY_NAME}}">
                    @error('CHU_DE_NAME')
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
                    <label for="IMAGE">image</label>
                    <input type="file" class="form-control" name="file_upload" id="IMAGE" placeholder="Input image">
                    @error('IMAGE')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">
                        Trạng Thái Hiện Tại:
                        <span id="image_curent">

                            @if($edit->TRANG_THAI==1)
                                Hiện
                            @else
                                Ẩn
                            @endif

                    </span>
                    </label>
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
    @endforeach
@stop()
