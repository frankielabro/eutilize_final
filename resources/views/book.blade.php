@extends('layouts.app')

@section('sector')
    Book 
@endsection

@section('act-2')
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
                                    <h3 class="title pb-3">List of Books</h3>
                                </div>
                                <div class="col-md-6 text-right" style="width: fit-content;float: right;">
                                    <button type="button" class="btn btn-primary btn-just-icon btn-fill" data-toggle="modal" data-target="#ADDMODAL">
                                        <i class="ti-plus"></i>
                                        BOOK
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
                            <table id="booklist" class="table table-hover">
                                <thead>
                                    <th>No.</th>
                                    <th>Item ID</th>
                                    <th>ISBN</th>
                                    <th>Title</th>
                                    <th>Version</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Actions</th>
                                </thead>
                        
                                <tbody>


                                    <!-- START OF SAMPLE DATA  -->
                                    @if(count($bookslist) > 0)

                                        @foreach($bookslist as $booklist)
                                            <tr>
                                                <td>{{$booklist->bookNum}}</td>
                                                <td>{{$booklist->itemId}}</td>
                                                <td>{{$booklist->isbn}}</td>
                                                <td>{{$booklist->title}}</td>
                                                <td>{{$booklist->edition}}</td>
                                                <td>{{$booklist->category}}</td>
                                                <td>{{$booklist->quantity}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-just-icon btn-sm btn-fill btn-block" data-toggle="modal" data-target="#EDITMODAL" onclick="editBook('{{$booklist->itemId}}')">
                                                        <i class="ti-pencil-alt"></i>
                                                        EDIT
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-just-icon  btn-sm btn-block" data-toggle="modal" data-target="#DELETEMODAL" onclick="deleteBookModal('{{ $booklist->itemId }}')">
                                                        <i class="ti-trash"></i>
                                                        DELETE
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach

                                        @else

                                        <div class="alert alert-success">
                                            <b><h2>There are no data</h2></b>
                                        </div>

                                    @endif
                                    
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

        <!-- ADD MODAL START -->
        <div class="modal fade" id="ADDMODAL" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header"> 
                        <h4 class="modal-title" id="exampleModalLongTitle">Adding the Book...</h4>
                    </div>
                    <div class="modal-body">

                        <form method="POST" action={{ URL::to('/books/add') }}>

                           <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Book Id</label>
                                        <input type="text" class="form-control border-input" placeholder="The ID of the Book">
                                    </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Book Title</label>
                                        <input type="text" class="form-control border-input" placeholder="The Title of the Book">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Book ISBN</label>
                                        <input type="text" class="form-control border-input" placeholder="Ex: 3145661">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Book Author</label>
                                        <input type="text" class="form-control border-input" placeholder="The Author of the Book">
                                    </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Book Version</label>
                                        <input type="text" class="form-control border-input" placeholder="The Version of the Book">
                                    </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Book Category</label>
                                        <div class="input-group mb-3" style="width:100%;">
                                            <select class="custom-select form-control border-input" id="bookcategory" style="border: 1px solid #ccc; border-radius: 4px;">
                                                <option selected hidden>Choose Category...</option>
                                                <option value="1">000 — Computer science, information and general works</option>
                                                <option value="2">100 — Philosophy and psychology.</option>
                                                <option value="3">200 — Religion</option>
                                                <option value="4">300 — Social Sciences</option>
                                                <option value="5">400 — Language </option>
                                                <option value="6">500 — Science</option>
                                                <option value="7">600 — Technology and applied science</option>
                                                <option value="8">700 — Arts and recreation</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Book Quantity</label>
                                        <input type="text" class="form-control border-input" placeholder="Ex: 5">
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
                        <h4 class="modal-title" id="exampleModalLongTitle">Editing the book...</h4>
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
                        <br>
                        <form method="POST" action={{ URL::to('/book/update') }}>
                            <input type="hidden" id="itemIdHidden" name="itemIdHiddenInput">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Book Id</label>
                                        <input type="text" class="form-control border-input" name="itemIdInputName" id="itemIdInput" placeholder="The ID of the Book">
                                    </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Book Title</label>
                                        <input type="text" class="form-control border-input" name="titleInputName" id="titleInput" placeholder="The Title of the Book">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Book Author</label>
                                        <input type="text" class="form-control border-input" name="authorInputName" id="authorInput" placeholder="The Author of the Book">
                                    </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Book Version</label>
                                        <input type="text" class="form-control border-input" name="versionInputName" id="versionInput" placeholder="The Version of the Book">
                                    </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Book Category</label>
                                        <div class="input-group mb-3" id="bookCategory" style="width:100%;">
                                            <select class="custom-select form-control border-input" name="bookSelectName" id="bookSelect" style="border: 1px solid #ccc; border-radius: 4px;">
                                                <option selected hidden>Choose Category...</option>
                                                <option value="000">000 — Computer science, information and general works</option>
                                                <option value="100">100 — Philosophy and psychology.</option>
                                                <option value="200">200 — Religion</option>
                                                <option value="300">300 — Social Sciences</option>
                                                <option value="400">400 — Language </option>
                                                <option value="500">500 — Science</option>
                                                <option value="600">600 — Technology and applied science</option>
                                                <option value="700">700 — Arts and recreation</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning btn-fill">Save Changes</button>
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
                        <h4 class="modal-title" id="exampleModalLongTitle">Deleting the book...</h4>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-center">Are you sure you want to delete this?</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-fill" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" onclick="deleteBookConfirm()">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- DELETE MODAL START -->
    <!-- MODAL END -->
@endsection



@section('script')
    <script type="text/javascript">
    var globalItemId = '';
    var baseURL = "{{url('/')}}";
    $(document).ready(function () {
        $('#booklist').DataTable({
            "lengthChange": false,
            "pageLength": 10,
            "columnDefs": [{
                "targets": 5,
                orderable: false,
                searchable: false
            }]
        });
    });

    function editBook(itemId) {
        $.get('/getBook/' + itemId, function(data) {
            console.log(String(data[0].bc_id));
            $('#itemIdInput').val(data[0].b_itemid);
            $('#titleInput').val(data[0].b_title);
            $('#authorInput').val(data[0].b_itemid);
            $('#versionInput').val(data[0].b_edition);
            $("div#bookCategory select").val(String(data[0].bc_id));
            $("#itemIdHidden").val(data[0].b_itemid);
        });
    }

    function deleteBookModal(itemId) {
        globalItemId = itemId;
    }

    function deleteBookConfirm() {
        $.post('/book/delete/' + globalItemId, function(data) {
            console.log(data);
        });
        $.ajax({
                type: "POST",
                url: baseURL+ "/book/delete/" + globalItemId,
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