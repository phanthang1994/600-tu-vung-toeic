@extends('admin.layout.main')
@section('body')
    @foreach($categories as $edit)
        <form action="{{route('category.updates',$edit->id)}}" method="post" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="container">
                <div class="form-group">
                    ID: <span>{{$edit->id}}</span>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="CATEGORY_NAME" id="CATEGORY_NAME" placeholder="Input name"
                           value="{{$edit->category_name}}">
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
                <input type="submit" value="Submit">
            </div>
        </form>
    @endforeach
@stop()
