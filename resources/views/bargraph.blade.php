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
                                    <h3 class="title pb-3">Bar Graph</h3>
                                </div>
                                <div class="col-md-6 text-right" style="width: fit-content;float: right;">
                                    <button type="button" class="btn btn-primary btn-just-icon btn-fill" data-toggle="modal" data-target="#PLOTMODAL">
                                        <i class="ti-ruler-pencil"></i>
                                        PLOT
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="content table-responsive">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <!-- PLOT MODAL START -->
    <div class="modal fade" id="PLOTMODAL" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">Plotting the graph...</h4>
                </div>
                <div class="modal-body">
                    <form id="scanform">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Book Title</label>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <input id="searchinpt" type="text" class="form-control border-input" placeholder="The Title of the Book">
                                            </div>
                                            <div class="col-md-4">
                                                <button id="searchbtn" class="btn btn-info btn-fill btn-block" type="button">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 style="font-weight: bold;">STARTING FROM :</h5>
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
                            <h5 style="font-weight: bold;">ENDING TO :</h5>
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
                                            <select id="ENDSY" class="custom-select form-control border-input" id="bookcategory" style="border: 1px solid #ccc; border-radius: 4px;">
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
                    <div class="row"> 
                        <div class="col-md-8">
                            <div id="notify" hidden class="alert alert-warning text-left" style="background-color: #a77c33; margin:0px;">
                                <span style="color: white;"><b> Warning - </b> " The schoolyear must not be equal "</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" id="filterbtn" class="btn btn-primary btn-fill">Plot</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PLOT MODAL START -->
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#activitylog').DataTable({
                "lengthChange": false,
                "pageLength": 10,
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