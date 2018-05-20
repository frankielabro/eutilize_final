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

                    <div class="alert alert-danger" id="alert" style="display: none;">
                        <b><h3>BOOK NOT FOUND !</h3></b>
                    </div>

                    <div class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Search for a book name</label>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input id="searchinpt" type="text" class="form-control border-input" placeholder="The Name of the Book">
                                        </div>
                                        <div class="col-md-4">
                                            <button id="searchbtn" class="btn btn-info btn-fill btn-block" type="button">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form id="scanform">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="b_itemid" type="hidden" name="country" value="Norway">
                                        <label>Book Title</label>
                                        <input id="book_title" type="text" class="form-control border-input inpt" placeholder="The Title of the scanned Book" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Book Author</label>
                                        <input id="book_author" type="text" class="form-control border-input inpt" placeholder="The Author of the scanned Book" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Book Version</label>
                                        <input id="book_version" type="text" class="form-control border-input inpt" placeholder="The Version of the scanned Book" disabled>
                                    </div>
                                </div>
                            </div>                            
                        </form>
                        <div class="text-center">
                            <button id="enterbtn" class="btn btn-info btn-fill btn-wd">Enter </input>
                                <button id="clearbtn" class="btn btn-secondary btn-wd">Clear</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $( document ).ready(function() {    
            $(document).on('click', '#searchbtn', function(e)
            {
                var data = {
                    title: $('#searchinpt').val()
                }   
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: '/searchBookTitle',
                    data: data,
                    success: function(response)
                    {
                        $('#b_itemid').val(response.b_itemid);
                        $('#book_title').val(response.b_title);
                        $('#book_author').val(response.a_name);
                        $('#book_version').val(response.b_edition);


                        console.log(response);

                        if (!response.b_itemid) {
                            console.log('123');
                            $('#alert').css('display', 'block');
                        } else {
                            $('#alert').css('display', 'none');
                        }
                    }
                }); 
            });

            $(document).on('click', '#enterbtn', function(e)
            {                
                e.preventDefault();
                var data = {};
                $("form#scanform :input").each(function()
                {
                    data[$(this).attr("id")] = $(this).val(); 
                });
                console.log(data);
                $.ajax({
                    type: "POST",
                    url: '/saveBorrowBook',
                    data: data,
                    success: function(response)
                    {
                       toastr.info("Successfully save!")
                    },
                    error: function(response)
                    {
                        console.log(response.responseJSON);
                        $.each(response.responseJSON.errors, function( index, value ) {
                            toastr.error(value)
                        });
                    }
                }); 
            });
        });

        toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-top-center",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
        
    </script>
    @endsection