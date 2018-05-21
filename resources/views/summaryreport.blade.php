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
                                        <h3 class="title pb-3">Summary Report</h3>
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
                                    <th>Item ID</th>
                                    <th>ISBN </th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Edition</th>
                                    <th>Number Used</th>
                                </thead>
                                <tbody>

                                     @foreach ($books as $book)
                                        <tr>
                                            <td> {{ $book->book_itemid }} </td>
                                            <td> {{ $book->book_isbnid }} </td>
                                            <td> {{ $book->book_title }} </td>
                                            <td> {{ $book->book_category }} </td>
                                            <td> {{ $book->book_edition }} </td>
                                            <td> {{ $book->countbookid }} </td>
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
  
        <div class="modal fade" id="FILTERMODAL" tabindex="-1" role="dialog" aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered" role="document">

                <form method="POST" action="{{ URL::to('/summaryreport/filter') }}">
                    
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="modal-content">

                        <div class="modal-header"> 
                            <h4 class="modal-title">Adding Semester...</h4>
                        </div>

                        <div class="modal-body">
                            <select name="sem_id" class="custom-select form-control border-input"  style="border: 1px solid #ccc; border-radius: 4px;">
                                    @foreach ($semesters as $semester)
                                        <option value="{{ $semester->sem_id }}">
                                            @if( $semester->sem_desc == '1st')
                                              {{$semester->sem_desc}} Semester 
                                            @else
                                               {{$semester->sem_desc}} Semester
                                            @endif
                                            <span> | </span> 
                                            {{ $semester->syr_desc }} 
                                            <span> | </span> 
                                             {{ $semester->start_date }} /  {{ $semester->end_date }}
                                        </option>
                                    @endforeach
                                </select> 
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>

                    </div>

                </form> 

            </div>
        </div>
    <!-- MODAL END -->
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
                    exportOptions: {
                        modifier: {
                            page: 'current'
                        }
                    }
                }
            ]
        });

    });

    </script>
@endsection