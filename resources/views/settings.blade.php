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

                                    <!-- START OF PHP FOR LOOP  -->
                                    <!-- 
                                        <tr>
                                            <td> 01-01-18 </td>
                                            <td> 06-01-18 </td>
                                            <td> 1st </td>
                                            <td> 2017-2018 </td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-warning" data-toggle="modal" data-target="#EDITMODAL">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-secondary btn-danger" data-toggle="modal" data-target="#DELETEMODAL">Delete</button>
                                            </td>
                                        </tr>
                                    -->
                                    <!-- END OF PHP FOR LOOP  -->

                                    <!-- START OF SAMPLE DATA  -->
                                    <tr>
                                        <td> 01-01-18 </td>
                                        <td> 06-01-18 </td>
                                        <td> 1st </td>
                                        <td> 2017-2018 </td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-just-icon btn-sm btn-fill btn-block" data-toggle="modal" data-target="#EDITMODAL">
                                                <i class="ti-pencil-alt"></i>
                                                EDIT
                                            </button>
                                            <button type="button" class="btn btn-danger btn-just-icon  btn-sm btn-block" data-toggle="modal" data-target="#DELETEMODAL">
                                                <i class="ti-trash"></i>
                                                DELETE
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> 01-01-18 </td>
                                        <td> 06-01-18 </td>
                                        <td> 2nd </td>
                                        <td> 2017-2018 </td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-just-icon btn-sm btn-fill btn-block" data-toggle="modal" data-target="#EDITMODAL">
                                                <i class="ti-pencil-alt"></i>
                                                EDIT
                                            </button>
                                            <button type="button" class="btn btn-danger btn-just-icon  btn-sm btn-block" data-toggle="modal" data-target="#DELETEMODAL">
                                                <i class="ti-trash"></i>
                                                DELETE
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> 01-01-18 </td>
                                        <td> 06-01-18 </td>
                                        <td> 1st </td>
                                        <td> 2016-2017 </td>
                                        <td>
                                                <button type="button" class="btn btn-warning btn-just-icon btn-sm btn-fill btn-block" data-toggle="modal" data-target="#EDITMODAL">
                                                    <i class="ti-pencil-alt"></i>
                                                    EDIT
                                                </button>
                                                <button type="button" class="btn btn-danger btn-just-icon  btn-sm btn-block" data-toggle="modal" data-target="#DELETEMODAL">
                                                    <i class="ti-trash"></i>
                                                    DELETE
                                                </button>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td> 01-01-18 </td>
                                        <td> 06-01-18 </td>
                                        <td> 2nd </td>
                                        <td> 2016-2017 </td>
                                        <td>
                                                <button type="button" class="btn btn-warning btn-just-icon btn-sm btn-fill btn-block" data-toggle="modal" data-target="#EDITMODAL">
                                                    <i class="ti-pencil-alt"></i>
                                                    EDIT
                                                </button>
                                                <button type="button" class="btn btn-danger btn-just-icon  btn-sm btn-block" data-toggle="modal" data-target="#DELETEMODAL">
                                                    <i class="ti-trash"></i>
                                                    DELETE
                                                </button>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td> 01-01-18 </td>
                                        <td> 06-01-18 </td>
                                        <td> 1st </td>
                                        <td> 2017-2018 </td>
                                        <td>
                                                <button type="button" class="btn btn-warning btn-just-icon btn-sm btn-fill btn-block" data-toggle="modal" data-target="#EDITMODAL">
                                                    <i class="ti-pencil-alt"></i>
                                                    EDIT
                                                </button>
                                                <button type="button" class="btn btn-danger btn-just-icon  btn-sm btn-block" data-toggle="modal" data-target="#DELETEMODAL">
                                                    <i class="ti-trash"></i>
                                                    DELETE
                                                </button>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td> 01-01-18 </td>
                                        <td> 06-01-18 </td>
                                        <td> 2nd </td>
                                        <td> 2017-2018 </td>
                                        <td>
                                                <button type="button" class="btn btn-warning btn-just-icon btn-sm btn-fill btn-block" data-toggle="modal" data-target="#EDITMODAL">
                                                    <i class="ti-pencil-alt"></i>
                                                    EDIT
                                                </button>
                                                <button type="button" class="btn btn-danger btn-just-icon  btn-sm btn-block" data-toggle="modal" data-target="#DELETEMODAL">
                                                    <i class="ti-trash"></i>
                                                    DELETE
                                                </button>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td> 01-01-18 </td>
                                        <td> 06-01-18 </td>
                                        <td> 1st </td>
                                        <td> 2016-2017 </td>
                                        <td>
                                                <button type="button" class="btn btn-warning btn-just-icon btn-sm btn-fill btn-block" data-toggle="modal" data-target="#EDITMODAL">
                                                    <i class="ti-pencil-alt"></i>
                                                    EDIT
                                                </button>
                                                <button type="button" class="btn btn-danger btn-just-icon  btn-sm btn-block" data-toggle="modal" data-target="#DELETEMODAL">
                                                    <i class="ti-trash"></i>
                                                    DELETE
                                                </button>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td> 01-01-18 </td>
                                        <td> 06-01-18 </td>
                                        <td> 2nd </td>
                                        <td> 2016-2017 </td>
                                        <td>
                                                <button type="button" class="btn btn-warning btn-just-icon btn-sm btn-fill btn-block" data-toggle="modal" data-target="#EDITMODAL">
                                                    <i class="ti-pencil-alt"></i>
                                                    EDIT
                                                </button>
                                                <button type="button" class="btn btn-danger btn-just-icon  btn-sm btn-block" data-toggle="modal" data-target="#DELETEMODAL">
                                                    <i class="ti-trash"></i>
                                                    DELETE
                                                </button>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td> 01-01-18 </td>
                                        <td> 06-01-18 </td>
                                        <td> 1st </td>
                                        <td> 2016-2017 </td>
                                        <td>
                                                <button type="button" class="btn btn-warning btn-just-icon btn-sm btn-fill btn-block" data-toggle="modal" data-target="#EDITMODAL">
                                                    <i class="ti-pencil-alt"></i>
                                                    EDIT
                                                </button>
                                                <button type="button" class="btn btn-danger btn-just-icon  btn-sm btn-block" data-toggle="modal" data-target="#DELETEMODAL">
                                                    <i class="ti-trash"></i>
                                                    DELETE
                                                </button>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td> 01-01-18 </td>
                                        <td> 06-01-18 </td>
                                        <td> 2nd </td>
                                        <td> 2016-2017 </td>
                                        <td>
                                                <button type="button" class="btn btn-warning btn-just-icon btn-sm btn-fill btn-block" data-toggle="modal" data-target="#EDITMODAL">
                                                    <i class="ti-pencil-alt"></i>
                                                    EDIT
                                                </button>
                                                <button type="button" class="btn btn-danger btn-just-icon  btn-sm btn-block" data-toggle="modal" data-target="#DELETEMODAL">
                                                    <i class="ti-trash"></i>
                                                    DELETE
                                                </button>
                                            </td>
                                    </tr>
                                    <!-- END OF SAMPLE DATA  -->
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
                            <form>
                                <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Date Range</label>
                                                <input type="text" name="datefilter"  class="form-control border-input" >
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Semester</label>
                                            <div class="input-group mb-3" style="width:100%;">
                                                <select class="custom-select form-control border-input" id="bookcategory" style="border: 1px solid #ccc; border-radius: 4px;">
                                                    <option selected hidden>Choose Semester...</option>
                                                    <option value="1">1st Semester</option>
                                                    <option value="2">2nd Semester</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                             <label>School Year</label>
                                            <div class="input-group mb-3" style="width:100%;">
                                                    <select id="STARTSY" class="custom-select form-control border-input" id="bookcategory" style="border: 1px solid #ccc; border-radius: 4px;">
                                                    <option selected hidden>Choose Semester...</option>
                                                    <!-- Sample Selection options --> 
                                                    <option value="1">2019 - 2020</option>
                                                    <option value="2">2018 - 2019</option>
                                                    <!-- Sample Selection options --> 
                                                </select>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ADD MODAL START -->
            <!-- EDIT MODAL START -->
            <div class="modal fade" id="EDITMODAL" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLongTitle">Editing the Semester...</h4>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Date Range</label>
                                            <input type="text" name="datefilter"  class="form-control border-input" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Semester</label>
                                            <div class="input-group mb-3" style="width:100%;">
                                                <select class="custom-select form-control border-input" id="bookcategory" style="border: 1px solid #ccc; border-radius: 4px;">
                                                    <option selected hidden>Choose Semester...</option>
                                                    <option value="1">1st Semester</option>
                                                    <option value="2">2nd Semester</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>School Year</label>
                                            <div class="input-group mb-3" style="width:100%;">
                                                <select id="STARTSY" class="custom-select form-control border-input" id="bookcategory" style="border: 1px solid #ccc; border-radius: 4px;">
                                                    <option selected hidden>Choose Semester...</option>
                                                    <!-- Sample Selection options --> 
                                                    <option value="1">2019 - 2020</option>
                                                    <option value="2">2018 - 2019</option>
                                                    <!-- Sample Selection options --> 
                                                </select>
                                            </div>
                                        </div>
                                    </div>         
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-warning">Save Changes</button>
                        </div>
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
                            <button type="button" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- DELETE MODAL START -->
    <!-- MODAL END -->    
@endsection

@section('script')
    
    
    <script>
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

    </script>
@endsection