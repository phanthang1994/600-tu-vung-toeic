@extends('admin.layout.main')
@section('body')
    <form action="{{route('chu_de.save')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="chu_de_name" id="chu_de_name" placeholder="Input name">
            </div>
            <div class="form-group">
                <label for="image">image</label>
                <input type="file" class="form-control" name="file_upload" id="image" placeholder="Input image">
            </div>
            <div class="form-group">
                <label for="">Category</label>
                <select name="CATEGORY_ID">
                    <option value="">--select one--</option>
                    @foreach($cats as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="Submit">
        </div>
    </form>
@stop()

@section('js')
<script>
    var jsonData = null;

    function handleFile() {
        var fileInput = document.getElementById('excelFile');
        var file = fileInput.files[0];
        var reader = new FileReader();

        reader.onload = function (e) {
            var data = new Uint8Array(e.target.result);
            var workbook = XLSX.read(data, { type: 'array' });
            var worksheet = workbook.Sheets[workbook.SheetNames[0]];
            jsonData = XLSX.utils.sheet_to_json(worksheet, { header: 1 });

            displayData(jsonData); // Display data on the webpage
        };

        reader.readAsArrayBuffer(file);
    }

    function displayData(data) {
        var tableBody = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
        tableBody.innerHTML = '';

        for (var i = 0; i < data.length; i++) {
            var row = document.createElement('tr');

            for (var j = 0; j < data[i].length; j++) {
                var cell = document.createElement(i === 0 ? 'th' : 'td');
                cell.textContent = data[i][j];
                row.appendChild(cell);
            }

            tableBody.appendChild(row);
        }
    }

    function uploadData() {
        if (jsonData) {
            fetch('/upload', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ data: jsonData }),
            })
                .then(response => response.json())
                .then(result => {
                    console.log(result); // Handle the server response
                })
                .catch(error => {
                    console.error(error); // Handle any errors that occur
                });
        } else {
            console.log('No data to upload. Please read an Excel file first.');
        }
    }

</script>
@stop()
