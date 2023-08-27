@extends('admin.layout.main')
@section('body')
    <form action="{{route('chu_de.upload_many_images')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="images[]" multiple>
        <button type="submit">Upload</button>
    </form>
@stop
