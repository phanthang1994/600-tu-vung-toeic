@extends('admin.layout.main')
@section('body')
    @foreach($edits as $edit)
        <form action="{{route('chu_de.updates',$edit->id)}}" method="post" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="container">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="chu_de_name" id="chu_de_name" placeholder="Input name"
                           value="{{$edit->chu_de_name}}">
                </div>
                <div class="form-group">
                    <label for="">
                        Image Hiện Tại:
                        <span id="image_curent">
                            {{$edit->image}}
                    </span>
                        <input style="display: none;" type="text" class="form-control" name="old_image" id="old_image"  value="{{$edit->image}}">
                    </label>
                </div>
                <div class="form-group">
                    <label for="IMAGE">image</label>
                    <input type="file" class="form-control" name="file_upload" id="IMAGE" placeholder="Input image">
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
                    <select name="category_id">
                        <option value="">--select one--</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="youtube_code">YouTube Code</label>
                    <input type="text" class="form-control" name="youtube_code" id="youtube_code" placeholder="Input YouTube code"
                           value="{{$edit->youtube_code}}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" placeholder="Input description">{{$edit->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option value="1" @if($edit->status == 1) selected @endif>Active</option>
                        <option value="0" @if($edit->status == 0) selected @endif>Inactive</option>
                    </select>
                </div>
                <input type="submit" value="Submit">
            </div>
        </form>
    @endforeach
@stop()
