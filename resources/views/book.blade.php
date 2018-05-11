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
                        <div class="content table-responsive">
                            <table id="booklist" class="table table-hover">
                                <thead>
                                    <th>No.</th>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Version</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>

                                    <!-- START OF PHP FOR LOOP  -->
                                    <!-- 
                                        <tr>
                                            <td>1</td>
                                            <td>234-0085</td>
                                            <td>Book of Death</td>
                                            <td>0.2</td>
                                            <td>Daily</td>
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
                                    -->
                                    <!-- END OF PHP FOR LOOP  -->

                                    <!-- START OF SAMPLE DATA  -->
                                    <tr>
                                        <td>1</td>
                                        <td>234-0085</td>
                                        <td>Book of Death</td>
                                        <td>0.2</td>
                                        <td>Computer science, information and general works</td>
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
                                        <td>2</td>
                                        <td>345-123</td>
                                        <td>Death Note</td>
                                        <td>0.3</td>
                                        <td>Weekly</td>
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
                                        <td>3</td>
                                        <td>234-0085</td>
                                        <td>Book of Death</td>
                                        <td>0.2</td>
                                        <td>Daily</td>
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
                                        <td>4</td>
                                        <td>345-123</td>
                                        <td>Death Note</td>
                                        <td>0.3</td>
                                        <td>Weekly</td>
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
                                        <td>5</td>
                                        <td>234-0085</td>
                                        <td>Book of Death</td>
                                        <td>0.2</td>
                                        <td>Daily</td>
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
                                        <td>6</td>
                                        <td>345-123</td>
                                        <td>Death Note</td>
                                        <td>0.3</td>
                                        <td>Weekly</td>
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
                                        <td>7</td>
                                        <td>234-0085</td>
                                        <td>Book of Death</td>
                                        <td>0.2</td>
                                        <td>Daily</td>
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
                                        <td>8</td>
                                        <td>345-123</td>
                                        <td>Death Note</td>
                                        <td>0.3</td>
                                        <td>Weekly</td>
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
                                        <td>9</td>
                                        <td>234-0085</td>
                                        <td>Book of Death</td>
                                        <td>0.2</td>
                                        <td>Daily</td>
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
                                        <td>10</td>
                                        <td>345-123</td>
                                        <td>Death Note</td>
                                        <td>0.3</td>
                                        <td>Weekly</td>
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
                        <h4 class="modal-title" id="exampleModalLongTitle">Adding the Book...</h4>
                    </div>
                    <div class="modal-body">
                        <form>
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
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btn-fill">Add</button>
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
                        <h4 class="modal-title" id="exampleModalLongTitle">Editing the book...</h4>
                    </div>
                    <div class="modal-body">
                        <form>
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
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-warning btn-fill">Save Changes</button>
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
                        <h4 class="modal-title" id="exampleModalLongTitle">Deleting the book...</h4>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-center">Are you sure you want to delete this?</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-fill" data-dismiss="modal">Cancel</button>
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
    </script>
@endsection