@extends('admin.layout.main')
@section('body')
<div class="container">
    <h2 class="text-center mt-4 mb-4">Convert Excel to HTML Table using JavaScript</h2>
    <div class="card">
        <div class="card-header"><b>Select Excel File</b></div>
        <div class="card-body">

            <input type="file" id="excel_file" />
            <button type id="save_file">Lưu File</button>
        </div>
    </div>
    <div id="excel_data" class="mt-5"></div>
</div>
@stop
@section('js')
    <script>


        const excel_file = document.getElementById('excel_file');
        var data_to_back_end = {}
        // console.log(data_to_back_end)
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
        // console.log(data_to_back_end)

        $(document).on('click', '#save_file', function (e) {
            e.preventDefault();
            $(this).text('Sending..');
            console.log(data_to_back_end)
            // data_to_back_end_2 = {}
            // data1 = ((data_to_back_end.data).length)%100
            // data2 = ((data_to_back_end.data).length - data1)/100
            //
            // for(var row = 0; row < data2; row++)
            // {
            //     for(var row2 = 0; row2 < row*100; row2++)
            //     {
            //         data_to_back_end.data[row2]
            //         data_to_back_end_2[]
            //     }
            // }
            // console.log(data1)
            // console.log(data2)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{route('tu_moi.store_many')}}",
                data: data_to_back_end,
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

    </script>
@stop
