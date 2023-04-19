@extends('admin.layout.main')
@section('body')
    @foreach($edits as $edit)
    <form action="{{route('chu_de.updates',$edit->ID)}}" method="post" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="container">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="CHU_DE_NAME" id="CHU_DE_NAME" placeholder="Input name"
                       value="{{$edit->CHU_DE_NAME}}">
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
                    Category Hiện Tại:
                    <span id="image_curent">

                            {{$edit->CATEGORY_NAME}}

                    </span>
                </label>
            </div>
            <div class="form-group">
                <label for="">Category</label>
                <select name="CATEGORY_ID">
                    <option value="">--select one--</option>
                    @foreach($categories as $category)
                        <option value="{{$category->ID}}">{{$category->CATEGORY_NAME}}</option>
                    @endforeach
                </select>
                @error('CATEGORY')
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
