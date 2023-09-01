@extends('admin.layout.main')
@section('body')
    @foreach($categories as $edit)
        <form action="{{ route('category.updates', $edit->id) }}" method="post" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="container">
                <div class="form-group">
                    ID: <span>{{ $edit->id }}</span>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Input name"
                           value="{{ $edit->category_name }}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" placeholder="Input description">{{ $edit->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image Hiện Tại:</label>
                    <span id="image_curent">{{ $edit->image }}</span>
                    <input type="hidden" class="form-control" name="old_image" id="old_image" value="{{ $edit->image }}">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="file_upload" id="image" placeholder="Input image">
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
