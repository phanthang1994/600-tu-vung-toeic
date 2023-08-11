@extends('admin.layout.main')
@section('body')

    <!-- ... Previous code ... -->

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Chủ Đề Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>CATEGORY NAME</th>
            <th>Tổng số từ</th>
            <th>YouTube Code</th> <!-- New column for YouTube Code -->
            <th>Số Người Theo Học</th>
            <th>Created At</th>
            <th>Updateed At</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        </thead>
        <tbody>
        @foreach($subjects as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->chu_de_name}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->image}}</td>
                <td>{{$item->category_name}}</td>
                <td>{{$item->so_nguoi_theo_hoc}}</td>
                <td>{{$item->youtube_code}}</td> <!-- Display YouTube Code -->
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_at}}</td>
                <td><a href="{{route('chu_de.edits',$item->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                <td>
                    <form action="{{ route('chu_de.delete', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- ... Remaining code ... -->


@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection
