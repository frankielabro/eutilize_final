@extends('layouts.app')

@section('sector')
    Settings 
@endsection

@section('act-5')
    class="active"
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
                                    <h3 class="title pb-3">Semester Settings</h3>
                                </div>
                                <div class="col-md-6 text-right" style="width: fit-content;float: right;">
                                    <button type="button" class="btn btn-primary btn-just-icon btn-fill" data-toggle="modal" data-target="#ADDMODAL">
                                        <i class="ti-plus"></i>
                                        SEM
                                    </button>
                                </div>
                            </div>

                        </div>
                        @if(session()->has('success'))
                            <div class="alert alert-success">{{ session()->get('success') }}</div>
                        @elseif(session()->has('error'))
                            <div class="alert alert-danger">{{ session()->get('error') }}</div>
                        @endif
                        <div class="content table-responsive">
                            <table id="settings" class="table table-hover">
                                <thead>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Semester</th>
                                    <th>School Year</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>

                                    @foreach ($semesters as $semester)
                                    <tr>
                                        <td> {{ $semester->start_date }} </td>
                                        <td> {{ $semester->end_date }} </td>
                                        <td> {{ $semester->sem_desc }} </td>
                                        <td> {{ $semester->syr_desc }} </td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-just-icon btn-sm btn-fill btn-block" data-toggle="modal" data-target="#EDITMODAL" onclick="editSemesterModal('{{$semester->sem_id}}')">
                                                <i class="ti-pencil-alt"></i>
                                                EDIT
                                            </button>

                                            <button type="button" class="btn btn-danger btn-just-icon  btn-sm btn-block" data-toggle="modal" data-target="#DELETEMODAL" onclick="deleteSemesterModal('{{ $semester->sem_id }}')">
                                                <i class="ti-trash"></i>
                                                DELETE
                                            </button>
                                        </td>
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

@section('modal')
    <!-- MODAL START -->
            <!-- ADD MODAL START -->
            <div class="modal fade" id="ADDMODAL" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="exampleModalLongTitle">Adding Semester...</h4>
                        </div>
                        <div class="modal-body">
                            @if($errors->any())

                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                            @endif
                            <form method="POST" action={{ URL::to('/semester/add') }}>
                                <div class="row">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Date Range</label>
                                                <input type="text" name="datefilter" class="form-control border-input" >
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Semester</label>
                                            <div class="input-group mb-3" style="width:100%;">
                                                <select class="custom-select form-control border-input" name="semesterSelect" id="bookcategory" style="border: 1px solid #ccc; border-radius: 4px;">
                                                    <option selected hidden>Choose Semester...</option>
                                                    <option value="1">First Semester</option>
                                                    <option value="2">Second Semester</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>School Year</label>
                                            <input type="text" name="addSchoolYear" class="form-control border-input" placeholder="Ex: 2018-2019" >
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                        </form> 
                    </div>
                </div>
            </div>
            <!-- ADD MODAL START -->
            <!-- EDIT MODAL START -->
             <div class="modal fade" id="EDITMODAL" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h4 class="modal-title" id="exampleModalLongTitle">Edit Semester...</h4>
                        </div>
                        <div class="modal-body">
                            @if($errors->any())

                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                            @endif
                            <form method="POST" action={{ URL::to('/semester/update') }}>
                                <input type="hidden" id="edit_itemID" name="item_id">

                                <div class="row">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Date Range</label>
                                            <input type="text" name="datefilter" id="edit_datefilter" class="form-control border-input" placeholder="Ex: 05/15/2018 - 06/20/2018">
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Semester</label>
                                            <div class="input-group mb-3" style="width:100%;">
                                                <select class="custom-select form-control border-input" name="semester" id="edit_semester" style="border: 1px solid #ccc; border-radius: 4px;">
                                                    <option selected hidden>Choose Semester...</option>
                                                    <option value="1">First Semester</option>
                                                    <option value="2">Second Semester</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>School Year</label>
                                                <input type="text" name="schoolyear" id="edit_schoolyear" class="form-control border-input" placeholder="Ex: 2018-2019" >
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                        </form> 
                    </div>
                </div>
            </div>
            <!-- EDIT MODAL START -->

            <!-- DELETE MODAL START -->
            <div class="modal fade" id="DELETEMODAL" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLongTitle">Deleting the Semester...</h4>
                        </div>
                        <div class="modal-body">
                            <h3 class="text-center">Are you sure you want to delete this?</h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger" onclick="deleteSemesterConfirm()">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- DELETE MODAL START -->

    <!-- MODAL END -->    
@endsection

@section('script')
    
    <script>

        var globalItemId = '';
        var baseURL = "{{url('/')}}";

        $(document).ready( function () {
             
            $('#settings').DataTable({
                "lengthChange": false,
                "pageLength": 10,
                "columnDefs": [{
                    "targets": 4,
                    orderable: false,
                    searchable: false
                }]
            });
            
            $('input[name="datefilter"]').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            });

            $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });

        } );

        function editSemesterModal(itemId){
            $.get('/semester/' + itemId, function(data) {
                $('#edit_itemID').val(data[0].sem_id);
                $('#edit_datefilter').val(data[0].start_date + " - " + data[0].end_date);
                $("#edit_schoolyear").val(data[0].syr_desc);
                if (data[0].sem_desc == "First Semester") {
                    data[0].sem_desc = 1;
                }else{
                    data[0].sem_desc = 2;
                }
                $("#edit_semester").val(data[0].sem_desc);
            });
        }

        function deleteSemesterModal(itemId) {
            globalItemId = itemId;
        }

        function deleteSemesterConfirm(){

            $.ajax({
                type: "POST",
                url: baseURL+ "/semester/delete/" + globalItemId,
                data: { somefield: "Some field value", _token: '{{csrf_token()}}' },
                success: function (data) {
                   if(data == 1) {
                           location.reload();
                   } else {
                       location.reload();
                   }
                },
                error: function (data, textStatus, errorThrown) {
                    if(data == 1) {
                           location.reload();
                   } else {
                       location.reload();
                   }
                },
            });

        }

    </script>
@endsection