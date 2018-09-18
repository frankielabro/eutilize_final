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
                        
                        <div class="row">
                            <div class="col-md-8" style="margin-left:300px;">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input id="searchvalue" type="text" class="form-control border-input" placeholder="Book Title or ISBN code or Book Author ">
                                        </div>
                                        <div class="col-md-4">
                                            <button id="searchbtn" class="btn btn-info btn-fill btn-block" type="button">Search</button>
                                        </div>
                                    </div>
                                </div>

                                <table id="searchtable" class=" table-responsive table table-hover">
                                    <thead>
                                        <th>Item ID</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody></tbody>               
                                </table>

                            </div>
                        </div>

                        <!-- <div class="row">
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
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('script')
    <script>


        $(document).ready( function () {
            $("#searchtable thead").hide();

            $('#searchvalue').on('keypress', function (e) {
                 if(e.which === 13){
                    search();
                 }
           });
        }); 

        $( "#searchbtn" ).click(function() {
                 search();
        });  


        function search(){

            var searchvalue = $('#searchvalue').val();
           
            if (searchvalue.length == 0) {
            
               toastr.error("Search Has No Value");

            } else{

                $("#searchtable tbody").remove();
                $("#searchtable thead").show();

                $.ajax({
                    type: "POST",
                    url: "/searchBookTitle",
                    data: { searchvalue: searchvalue, _token: '{{csrf_token()}}' },
                    success: function (response) {
                        
                        console.log(response);
                        console.log(response.length);
                        if (response.length != 0 ) {
                            $.each(response, function(key, value){

                                $("#searchtable").append(
                                    "<tr><td>"+value.b_itemid+"</td>" +
                                    "<td>"+value.b_title+"</td>" +
                                    "<td>"+value.a_name+"</td>"+
                                    '<td><button onclick="saveborrowbook('+value.b_itemid+')" class="btn btn-info btn-fill btn-wd">Borrow</button><tr>');  

                            });
                       }else{
                            $("#searchtable").append('<tr><td colspan="4">No Data Available</td></tr>' );
                       }
                        
                    },
                    error: function (data) {
                       console.log(data);
                    }

                });

            } 

        }


        function saveborrowbook(book_id){

                $.ajax({
                    type: "POST",
                    url: '/saveBorrowBook',
                    data: { b_itemid: book_id, _token: '{{csrf_token()}}' },
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

        }

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

        function loadInsertedData() {
            $.get('/saveRfid', function(data) {
               $('#searchvalue').val(data[0].b_title);
            });
        }
        //     $.ajax({
        //         type: "POST",
        //         url: '/saveRfid',
        //         data: { _token: '{{csrf_token()}}' },
        //         success: function(response)
        //         {
        //             console.log(response);
        //         },
        //         error: function(response)
        //         {
        //             console.log(response.responseJSON);
        //             $.each(response.responseJSON.errors, function( index, value ) {
        //                 toastr.error(value)
        //             });
        //         }
        //     });
        // }

        setInterval(function(){ loadInsertedData() }, 3000);

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        // $( document ).ready(function() {    
        //     $(document).on('click', '#searchbtn', function(e)
        //     {
        //         var data = {
        //             title: $('#searchinpt').val()
        //         }   
        //         e.preventDefault();
        //         $.ajax({
        //             type: "POST",
        //             url: '/searchBookTitle',
        //             data: data,
        //             success: function(response)
        //             {
        //                 $('#b_itemid').val(response.b_itemid);
        //                 $('#book_title').val(response.b_title);
        //                 $('#book_author').val(response.a_name);
        //                 $('#book_version').val(response.b_edition);


        //                 console.log(response);

        //                 if (!response.b_itemid) {
        //                     console.log('123');
        //                     $('#alert').css('display', 'block');
        //                 } else {
        //                     $('#alert').css('display', 'none');
        //                 }
        //             }
        //         }); 
        //     });

        //     $(document).on('click', '#enterbtn', function(e)
        //     {                
        //         e.preventDefault();
        //         var data = {};
        //         $("form#scanform :input").each(function()
        //         {
        //             data[$(this).attr("id")] = $(this).val(); 
        //         });
        //         console.log(data);
        //         $.ajax({
        //             type: "POST",
        //             url: '/saveBorrowBook',
        //             data: data,
        //             success: function(response)
        //             {
        //                toastr.info("Successfully save!")
        //             },
        //             error: function(response)
        //             {
        //                 console.log(response.responseJSON);
        //                 $.each(response.responseJSON.errors, function( index, value ) {
        //                     toastr.error(value)
        //                 });
        //             }
        //         }); 
        //     });
        // });

        // toastr.options = {
        //   "closeButton": false,
        //   "debug": false,
        //   "newestOnTop": false,
        //   "progressBar": false,
        //   "positionClass": "toast-top-center",
        //   "preventDuplicates": false,
        //   "onclick": null,
        //   "showDuration": "300",
        //   "hideDuration": "1000",
        //   "timeOut": "5000",
        //   "extendedTimeOut": "1000",
        //   "showEasing": "swing",
        //   "hideEasing": "linear",
        //   "showMethod": "fadeIn",
        //   "hideMethod": "fadeOut"
        // }
        
    </script>
    @endsection