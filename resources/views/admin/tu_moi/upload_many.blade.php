@extends('admin.layout.main')
@section('body')
    <div class="container">

        <h1>Laravel Multiple Image Upload using Ajax with Preview Example</h1>

        <form action="{{ route('tu_moi.store_upload_many') }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}

            <input type="file" id="uploadFile" name="uploadFile[]" multiple/>

            <input type="submit" class="btn btn-success" name='submitImage' value="Upload"/>

        </form>



        <br/>

        <div id="imgPreview"></div>

    </div>
@endsection
@section('js')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
@endsection


