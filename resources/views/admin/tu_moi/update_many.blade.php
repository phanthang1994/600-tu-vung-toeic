@extends('admin.layout.main')
@section('body')
    <form action="{{route('tu_moi.process_update_excel')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header"><b>Select Excel File</b></div>
            <div class="card-body">

                <input type="file" id="excel_file" />

            </div>
        </div>
        <div id="excel_data" class="mt-5"></div>
        <div class="container">
            <div class="form-group">
                <label for="image">image</label>
                <input type="file" class="form-control" name="file_upload" id="image" placeholder="Input image">
            </div>
            <input type="submit" value="Submit">
            <div id="excel_data" class="mt-5"></div>
        </div>
    </form>
@stop
@section('js')
    <script>
        const excel_file = document.getElementById('excel_file');
        var data_to_back_end = {}
        excel_file.addEventListener('change', (event) => {

            if(!['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel'].includes(event.target.files[0].type))
            {
                document.getElementById('excel_data').innerHTML = '<div class="alert alert-danger">Only .xlsx or .xls file format are allowed</div>';

                excel_file.value = '';

                return false;
            }

            var reader = new FileReader();

            reader.readAsArrayBuffer(event.target.files[0]);

            reader.onload = function(event){

                var data = new Uint8Array(reader.result);

                var work_book = XLSX.read(data, {type:'array'});

                var sheet_name = work_book.SheetNames;

                var sheet_data = XLSX.utils.sheet_to_json(work_book.Sheets[sheet_name[0]], {header:1});
                // console.log(sheet_data)
                data_to_back_end['data'] = sheet_data
                // console.log(data_to_back_end.data)

                if(sheet_data.length > 0)

                {
                    var table_output = '<table class="table table-striped table-bordered">';

                    for(var row = 0; row < sheet_data.length; row++)
                    {

                        table_output += '<tr>';

                        for(var cell = 0; cell < sheet_data[row].length; cell++)
                        {

                            if(row === 0)
                            {

                                table_output += '<th>'+sheet_data[row][cell]+'</th>';

                            }
                            else
                            {

                                table_output += '<td>'+sheet_data[row][cell]+'</td>';
                                // console.log(sheet_data[row][cell])

                            }

                        }

                        table_output += '</tr>';

                    }

                    table_output += '</table>';

                    document.getElementById('excel_data').innerHTML = table_output;
                }

                excel_file.value = '';

            }

        });
    </script>
@stop
