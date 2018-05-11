@extends('layouts.app')

@section('sector')
    Main 
@endsection

@section('act-1')
  class="active"
@endsection

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h3 class="title pb-3">Book Information</h3>
                        </div>
                        <div class="content">
                            <form id="scanform">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Book RFID Code</label>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input id="searchinpt" type="text" class="form-control border-input" placeholder="The RFID Code of the Book">
                                                </div>
                                                <div class="col-md-4">
                                                    <button id="searchbtn" class="btn btn-info btn-fill btn-block" type="button" disabled>Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Book Title</label>
                                            <input type="text" class="form-control border-input inpt" placeholder="The Title of the scanned Book" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Book Author</label>
                                            <input type="text" class="form-control border-input inpt" placeholder="The Author of the scanned Book" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Book Version</label>
                                            <input type="text" class="form-control border-input inpt" placeholder="The Version of the scanned Book" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button id="enterbtn" class="btn btn-info btn-fill btn-wd"  disabled>Enter </input>
                                    <button id="clearbtn" class="btn btn-secondary btn-wd" disabled>Clear</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $( document ).ready(function() {
            var $searchinpt = $('#searchinpt');
            var $searchbtn = $('#searchbtn');
            var $enterbtn = $('#enterbtn');
            var $clearbtn = $('#clearbtn');

            $searchinpt.on('change keyup paste input', function() {
                if( !$(this).val() ) {
                    $searchbtn.prop('disabled', true);
                    $('.inpt').prop('disabled', true);
                    $enterbtn.prop('disabled', true);
                    $clearbtn.prop('disabled', true);
                }else{
                    $searchbtn.prop('disabled', false);
                    $('.inpt').prop('disabled', false);
                    $enterbtn.prop('disabled', false);
                    $clearbtn.prop('disabled', false);
                }
            });
            
            $searchbtn.on('click',function(e){
                if(!($searchbtn.prop('disabled'))){
                    e.preventDefault();
                    alert('shift clicked');
                    //do search ajax here
                }
            });

            $enterbtn.on('click',function(e){
                if(!($enterbtn.prop('disabled'))){
                    e.preventDefault();
                    alert('enter clicked');
                    //do enter ajax here
                }
            });

            $clearbtn.on('click',function(e){
                if(!($clearbtn.prop('disabled'))){
                    e.preventDefault();
                    $searchinpt.val('');
                    $('.inpt').val('');
                    $searchinpt.change();
                }
            });

            $(document).keydown(function (e) {
                if(!($searchbtn.prop('disabled'))){
                    if (e.keyCode == 16) {
                        $searchbtn.click();
                    }
                }
                if(!($enterbtn.prop('disabled'))){
                    if (e.keyCode == 13) {
                        $enterbtn.click();
                    }
                }
                if(!($clearbtn.prop('disabled'))){
                    if (e.keyCode == 27) {
                        $clearbtn.click();
                    }
                }
            });
        });
    </script>
@endsection