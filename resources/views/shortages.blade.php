@extends('layouts.app')

@section('sector')
    Procurement 
@endsection

@section('act-3')
  active
@endsection

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <div class="row">
                                    <div class="col-md-6" style=" width: fit-content; float: left;">
                                        <h3 class="title pb-3">Book Shortages</h3>
                                    </div>
                                    <div class="col-md-6 text-right" style="width: fit-content;float: right;">
                                        <button type="button" class="btn btn-primary btn-just-icon btn-fill" data-toggle="modal" data-target="#FILTERMODAL">
                                            <i class="ti-wand"></i>
                                            FILTER
                                        </button>
                                    </div>
                            </div>
                        </div>
                        <div class="content table-responsive">
                            <table id="summaryreport" class="display table table-hover">
                                <thead>
                                    <th>No.</th>
                                    <th>Book Id </th>
                                    <th>Book Title</th>
                                    <th>Predicted Quantity</th>
                                    <th>Quantity On-hand</th>
                                    <th>Shortage Percentage</th>
                                    <th>Last Semester</th>
                                </thead>
                                <tbody>
                                    @foreach($shortages as $row)
                                    <tr>
                                        <td>{{ $row['num'] }}</td>
                                        <td>{{ $row['b_itemid'] }}</td>
                                        <td><a class="text-primary" href="/procurement/book-utilization/{{ $row['b_itemid'] }}">{{ $row['b_title'] }}</a></td>
                                        <td>{{ $row['predicted_qty'] }}</td>
                                        <td>{{ $row['supply_qty'] }}</td>
                                        <td>{{ $row['shortage_percentage']*100 }}%</td>
                                        <td>{{ $row['sem_desc'] }} Sem, {{ $row['syr_desc'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@section('script')

    <script>
    $(document).ready(function () {
        $('#summaryreport').DataTable({
            "lengthChange": false,
            "pageLength": 10,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'print',
                    text: 'Print',
                    title: "",
                    message: '<h2 class="text-center mb-2">E-Utilize</h2><h3 class="text-center mb-4"> Summary Report</h3>',
                    
                }
            ]
        });

        var $startsy = $('#STARTSY');
        var $endsy = $('#ENDSY');
        var $notify = $('#notify');
        var $filterbtn = $('#filterbtn');

        $startsy.on('change', function() {
            if(this.value != $endsy.val()){
                $filterbtn.prop('disabled', false);
                $notify.hide();
            }else{
                $filterbtn.prop('disabled', true);
                $notify.show();
            }
        })
        $endsy.on('change', function() {
            if(this.value != $startsy.val()){
                $filterbtn.prop('disabled', false);
                $notify.hide();
            }else{
                $filterbtn.prop('disabled', true);
                $notify.show();
            }
        })


    });

    </script>
@endsection