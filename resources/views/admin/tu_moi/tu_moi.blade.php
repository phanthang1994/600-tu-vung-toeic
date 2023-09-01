@extends('admin.layout.main')
@section('body')

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">

                <div id="success_message"></div>

                <div class="card">
                <div class="card">
                    <div class="card-header">
                        <h4>
                           Từ Mới
                            <a href="{{route('tu_moi.creates')}}"  class="btn btn-primary float-end" >Add Từ Mới</a>
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
{{--                                <th>Trạng Thái</th>--}}
                                <th>Created At</th>
                                <th>Deleted At</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                                <th>Status</th>
                            </tr>
                            @foreach($new_words as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->image}}</td>
                                <td>{{$item->phien_am}}</td>
                                <td>{{$item->tu_loai}}</td>
                                <td>{{$item->audio}}</td>
                                <td>{{$item->vi_du}}</td>
                                <td>{{$item->che_tu}}</td>
                                <td>{{$item->cau_truc_cau}}</td>
                                <td>{{$item->chu_de_name}}</td>
{{--                                <td>{{$item->status}}</td>--}}
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->updated_at}}</td>
                                <td><a href="{{route('tu_moi.edits',$item->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                                <td>
                                    <form action="{{ route('tu_moi.delete', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    </form>
                                </td>
                                <td>
                                    @if($item->status)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                </tr>
                            @endforeach
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

