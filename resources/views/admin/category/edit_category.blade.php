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
                    <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Input name"
                           value="{{$edit->category_name}}">
                </div>
                <div class="form-group">
                    <label for="">
                        Image Hiện Tại:
                        <span id="image_curent">
                            {{$edit->image}}
                        </span>
                        <input style="visibility: hidden" type="text" class="form-control" name="old_image" id="old_image" placeholder="Input name"
                               value=" {{$edit->image}}">

                    </span>
                        <input style="display: none;" type="text" class="form-control" name="old_image" id="old_image"  value="{{$edit->image}}">
                    </label>
                </div>
                <div class="form-group">
                    <label for="image">image</label>
                    <input type="file" class="form-control" name="file_upload" id="image" placeholder="Input image">
                </div>
                <input type="submit" value="Submit">
            </div>
        </form>
    @endforeach
@stop()
