@extends('admin.layout.main')
@section('body')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">

                <div id="success_message"></div>

                <div class="card">
                    <div class="card-header">
                        <h4>
                            Category
                            <a  href="{{route('category.creates')}}" class="btn btn-primary float-end">Add Category</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            @foreach($categories as $item)
                            <tr>
                                <td> {{$item->id}}</td>
                                <td>{{$item->category_name}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->image}}'</td>
                                <td>{{$item->created_at}}'</td>
                                <td>{{$item->updated_at}}'</td>
                                <td><a href="{{ route('category.edits', $item->id) }}" class="btn btn-primary editbtn btn-sm">Edit</a></td>
                                <td><button data-item-id="{{ $item->id }}" class="btn btn-danger delete-item btn-sm">Delete</button></td>
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
    <script>
        const deleteButtons = document.querySelectorAll('.delete-item');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const itemId = this.dataset.itemId;
                const url = "/panel/category/" + itemId + "/delete";
                fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                    .then(response => {
                        window.location.reload();                    });
            });
        });
    </script>

@endsection
