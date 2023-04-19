@extends('admin.layout.main')
@section('body')
    {{-- Add Modal --}}
    <div class="modal fade" id="AddStudentModal" tabindex="-1" aria-labelledby="AddStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title add_new" id="AddStudentModalLabel">Add Từ Mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <ul id="save_msgList"></ul>

                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" required class="name form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="image">IMAGE</label>
                        <input type="file" class="image form-control" placeholder="Input image" name="file_upload" id="image">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Phiên Âm</label>
                        <input type="text" required class="phien_am form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Từ Loại</label>
                        <input type="text" required class="tu_loai form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="image">Audio</label>
                        <input type="file" class="audio form-control" placeholder="Input audio" name="audio_upload" id="audio">
                    </div>

                    <div class="form-group mb-3">
                        <label for="">VÍ DỤ</label>
                        <input type="text" required class="vi_du form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Chế Từ</label>
                        <input type="text" required class="che_tu form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Cấu Trúc Câu</label>
                        <input type="text" required class="cau_truc_cau form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Chủ Đề</label>
                        <select name="category_id" id="select_add">
                            <option value="">--select one--</option>
                        </select>

                    </div>
                    <div class="form-group mb-3">
                        <label>Trạng Thái</label>
                        <div class="">
                            <input type="radio" id="an" name="TRANG_THAI" value="0">
                            <label for="an">ẨN</label>
                            <input type="radio" id="hien" name="TRANG_THAI" value="1">
                            <label for="hien">HIỆN</label><br>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_student">Save</button>
                </div>

            </div>
        </div>
    </div>


    {{-- Edit Modal --}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit & Update Student Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <ul id="update_msgList"></ul>

                    <label > ID : <span id="stud_id"></span> </label>
                    <input type="text" id="stud_id_" style="display:none" value="">
                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" id="name" required class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Image Hiện Tại: <span id="image_curent"></span></label>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Image Mới</label>
                        <input type="file" id="image_update" required class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Phiên Âm</label>
                        <input type="text" id="phien_am" required class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">TỪ LOẠI</label>
                        <input type="text" id="tu_loai" required class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Audio Hiện Tại: <span id="audio_hien_tai"></span></label>
                    </div>
                    <div class="form-group mb-3">
                        <label for="image">Audio Mới</label>
                        <input type="file" class="audio form-control" placeholder="Input audio" name="audio_upload" id="audio_update">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Ví Dụ</label>
                        <input type="text" id="vi_du" required class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Chế Từ</label>
                        <input type="text" id="che_tu" required class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Cấu Trúc Câu</label>
                        <input type="text" id="cau_truc_cau" required class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label>Chủ Đề Hiện Tại : <span id="chu_de_hien_tai"> </span></label>
                    </div>
                    <div class="form-group">
                        <label for="">Chủ Đề Mới</label>
                        <select name="category_id" id="select_add_update">
                            <option value="">--select one--</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Trạng Thái Hiện Tại : <span id="trang_thai_hien_tai"> </span></label>
                    </div>
                    <div class="form-group mb-3">
                        <label>Trạng Thái Mới</label>
                        <div class="">
                            <input type="radio" id="AN_" name="TRANG_THAI_MOI" value="0">
                            <label for="AN_">ẨN</label>
                            <input type="radio" id="HIEN_" name="TRANG_THAI_MOI" value="1">
                            <label for="HIEN_">HIỆN</label><br>
                        </div>
                    </div>
                    {{--                    <div class="form-group mb-3">--}}
                    {{--                        <label for="">Phone No</label>--}}
                    {{--                        <input type="text" id="phone" required class="form-control">--}}
                    {{--                    </div>--}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary update_student">Update</button>
                </div>

            </div>
        </div>
    </div>
    {{-- Edn- Edit Modal --}}


    {{-- Delete Modal --}}
    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Student Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Confirm to Delete Data ?</h4>
                    <input type="hidden" id="deleteing_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete_student">Yes Delete</button>
                </div>
            </div>
        </div>
    </div>
    {{-- End - Delete Modal --}}

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">

                <div id="success_message"></div>

                <div class="card">
                    <div class="card-header">
                        <h4>
                           Từ Mới
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                    data-bs-target="#AddStudentModal">Add Từ Mới</button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Từ Mới</th>
                                <th>Image</th>
                                <th>Phiên Âm</th>
                                <th>Từ Loại</th>
                                <th>Audio</th>
                                <th>Ví Dụ</th>
                                <th>CHế Từ</th>
                                <th>Cấu Trúc Câu</th>
                                <th>Chủ Đề</th>
                                <th>Trạng Thái</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {

            fetchstudent();

            function fetchstudent() {
                $.ajax({
                    type: "GET",
                    url: "{{route('tu_moi.fetch')}}",
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        $('tbody').html("");
                        $.each(response.categories, function (key, item) {
                            $('tbody').append('<tr>\
                            <td>' + item.ID + '</td>\
                            <td>' + item.NAME + '</td>\
                            <td>' + item.IMAGE + '</td>\
                            <td>' + item.PHIEN_AM + '</td>\
                            <td>' + item.TU_LOAI + '</td>\
                            <td>' + item.AUDIO + '</td>\
                            <td>' + item.VI_DU + '</td>\
                            <td>' + item.CHE_TU + '</td>\
                            <td>' + item.CAU_TRUC_CAU + '</td>\
                            <td>' + item.CHU_DE_NAME + '</td>\
                            <td>' + item.STATUS + '</td>\
                            <td>' + item.created_at + '</td>\
                            <td>' + item.updated_at + '</td>\
                            <td><button type="button" value="' + item.ID + '" class="btn btn-primary editbtn btn-sm">Edit</button></td>\
                            <td><button type="button" value="' + item.ID + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
                        \</tr>');
                        });
                    }
                });
            }

            function fetchcategory() {
                // alert("ok")
                $.ajax({
                    type: "GET",
                    url: "{{route('tu_moi.chu_de_join')}}",
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        $.each(response.categories, function (key, item) {
                                $('#select_add').append(new Option(item.CHU_DE_NAME, item.ID));
                                $('#select_add_update').append(new Option(item.CHU_DE_NAME, item.ID));
                            }
                        );
                    }
                });
            }
            fetchcategory()
            $(document).on('click', '.add_student', function (e) {
                e.preventDefault();
                $(this).text('Sending..');

                var data = {
                    'name': $('.name').val(),
                    'image': $('.image').val(),
                    'phien_am': $('.phien_am').val(),
                    'tu_loai': $('.tu_loai').val(),
                    'audio': $('.audio').val(),
                    'vi_du': $('.vi_du').val(),
                    'che_tu': $('.che_tu').val(),
                    'cau_truc_cau': $('.cau_truc_cau').val(),
                    'chu_de_id':  $('#select_add').find(":selected").val(),
                    'status': $("input[name='TRANG_THAI']:checked").val()
                }
                console.log(data)
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{route('tu_moi.store')}}",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 400) {
                            $('#save_msgList').html("");
                            $('#save_msgList').addClass('alert alert-danger');
                            $.each(response.errors, function (key, err_value) {
                                $('#save_msgList').append('<li>' + err_value + '</li>');
                            });
                            $('.add_student').text('Save');
                        } else {
                            $('#save_msgList').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#AddStudentModal').find('input').val('');
                            $('.add_student').text('Save');
                            $('#AddStudentModal').modal('hide');
                            fetchstudent();
                        }
                    }
                });

            });

            $(document).on('click', '.editbtn', function (e) {
                e.preventDefault();
                var stud_id = $(this).val();
                // alert(stud_id);
                $('#editModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/panel/tu_moi/" + stud_id + "/edit",
                    success: function (response) {
                        if (response.status === 404) {
                            // console.log(response);
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#editModal').modal('hide');
                        } else {
                            console.log(response);
                            $('#name').val(response.student.NAME)
                            $('#image_curent').html(response.student.IMAGE)
                            $('#tu_loai').val(response.student.TU_LOAI)
                            $('#phien_am').val(response.student.PHIEN_AM)
                            $('#audio_hien_tai').html(response.student.AUDIO)
                            $('#vi_du').val(response.student.VI_DU)
                            $('#che_tu').val(response.student.CHE_TU)
                            $('#cau_truc_cau').val(response.student.CAU_TRUC_CAU)
                            $('#chu_de_hien_tai').html(response.chu_de_name)
                            if(response.student.STATUS===0)
                                $('#trang_thai_hien_tai').html("ẨN")
                            else
                                $('#trang_thai_hien_tai').html("HIỆN")
                            $('#stud_id').html(stud_id);
                            $('#stud_id_').val(stud_id);
                        }
                    }
                });
                $('.btn-close').find('input').val('');

            });

            $(document).on('click', '.update_student', function (e) {
                e.preventDefault();

                $(this).text('Updating..');
                var id = $('#stud_id_').val();
                // alert(id);

                var data = {
                    'name': $('#name').val(),
                    'image': $('#image_update').val(),
                    'phien_am': $('#phien_am').val(),
                    'tu_loai': $('#tu_loai').val(),
                    'audio': $('#audio_update').val(),
                    'vi_du': $('#vi_du').val(),
                    'che_tu': $('#che_tu').val(),
                    'cau_truc_cau': $('#cau_truc_cau').val(),
                    'chu_de_id':  $('#select_add_update').find(":selected").val(),
                    'status': $("input[name='TRANG_THAI_MOI']:checked").val()
                }
                console.log(data)
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: "/panel/tu_moi/" + id +"/update",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 400) {
                            $('#update_msgList').html("");
                            $('#update_msgList').addClass('alert alert-danger');
                            $.each(response.errors, function (key, err_value) {
                                $('#update_msgList').append('<li>' + err_value +
                                    '</li>');
                            });
                            $('.update_student').text('Update');
                        } else {
                            $('#update_msgList').html("");

                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $("input[name='TRANG_THAI']").prop( "checked", false )
                            $("input[name='TRANG_THAI_MOI']").prop( "checked", false )
                            // $('#editModal').find('input').val('');
                            $('.update_student').text('Update');
                            $('#editModal').modal('hide');
                            fetchstudent();
                        }
                    }
                });

            });

            $(document).on('click', '.deletebtn', function () {
                var stud_id = $(this).val();
                $('#DeleteModal').modal('show');
                $('#deleteing_id').val(stud_id);
            });


            $(document).on('click', '.delete_student', function (e) {
                e.preventDefault();

                $(this).text('Deleting..');
                var id = $('#deleteing_id').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "DELETE",
                    url: "/panel/tu_moi/" + id + "/delete",
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 404) {
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_student').text('Yes Delete');
                        } else {
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_student').text('Yes Delete');
                            $('#DeleteModal').modal('hide');
                            fetchstudent();
                        }
                    }
                });
            });

        });

    </script>

@endsection
