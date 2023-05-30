@extends('admin.layout.main')
@section('body')
    <form action="{{route('tu_moi.upload_many_images')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="images[]" multiple>
        <input type="file" name="audios[]" multiple>
        <button type="submit">Upload</button>
    </form>
@stop
