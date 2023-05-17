@extends('admin.layout.main')
@section('body')
    <form id="excelForm">
        <input type="file" id="excelFile" accept=".xlsx, .xls" />
        <button type="button" onclick="handleFile()">Read File</button>
        <button type="button" onclick="uploadData()">Upload</button>
    </form>

    <div id="output">
        <table id="dataTable">
            <thead>
            <tr>
                <th>Column 1</th>
                <th>Column 2</th>
                <th>Column 3</th>
                <!-- Add more table headers if needed -->
            </tr>
            </thead>
            <tbody>
            <!-- Data rows will be dynamically added here -->
            </tbody>
        </table>
    </div>

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
            fetch('/panel/tu_moi/post_create_many_records', {
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
