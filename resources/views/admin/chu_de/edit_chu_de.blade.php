@extends('admin.layout.main')
@section('body')
    @foreach($edits as $edit)
    <form action="{{route('chu_de.updates',$edit->id)}}" method="post" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="container">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="CHU_DE_NAME" id="CHU_DE_NAME" placeholder="Input name"
                       value="{{$edit->chu_de_name}}">
                @error('CHU_DE_NAME')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">
                    Image Hiện Tại:
                    <span id="image_curent">

                            {{$edit->image}}

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

                            {{$edit->category_name}}

                    </span>
                </label>
            </div>
            <div class="form-group">
                <label for="">Category</label>
                <select name="CATEGORY_ID">
                    <option value="">--select one--</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
                @error('CATEGORY')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <input type="submit" value="Submit">
        </div>
    </form>
    @endforeach
@stop()
