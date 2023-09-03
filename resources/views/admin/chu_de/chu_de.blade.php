@extends('admin.layout.main')
@section('body')

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">

                <div id="success_message"></div>

                <div class="card">
                    <div class="card-header">
                        <h4>
                            Chủ Đề
                            <a href="{{route('chu_de.creates')}}" class="btn btn-primary float-end">Add Chủ Đề</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Chủ Đề Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>CATEGORY NAME</th>
                                <th>YOUTUBE CODE</th>
                                <th>Số Người Theo Học</th>
                                <th>Created At</th>
                                <th>Updateed At</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                                <th>Status</th>
                            </tr>
                            @foreach($subjects as $item)
                            <tr>
                                <td> {{$item->id }} </td>
                                <td> {{$item->chu_de_name}} </td>
                                <td> {{$item->description}} </td>
                                <td> {{$item->image}} </td>
                                <td> {{$item->category_name}}</td>
                                <td>{{$item->youtube_code}}</td> <!-- Display YouTube Code -->

                                <td> {{$item->so_nguoi_theo_hoc}} </td>
                                <td> {{$item->created_at}} </td>
                                <td> {{$item->updated_at}} </td>
                                <td><a href="{{route('chu_de.edits',$item->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                                <td>
                                    <form action="{{ route('chu_de.delete', $item->id) }}" method="POST">
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

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection
