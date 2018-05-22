@extends('layouts.app')

@section('sector')
    Acitivity 
@endsection

@section('act-4')
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
                                    <h3 class="title pb-3">Activity Log</h3>
                                </div>
                            </div>
                        </div>
                        <div class="content table-responsive">
                            <table id="activitylog" class="table table-hover">
                                <thead>
                                    <th>No.</th>
                                    <th>Id</th>
                                    <th>Book Title</th>
                                    <th>Date</th>
                                </thead>
                                <tbody>

                                    @foreach ($books as $book)
                                    <tr>
                                            <td>{{$index++}}</td>
                                            <td>{{ $book->b_itemid }}</td>
                                            <td>{{ $book->b_title }}</td>
                                            <td>{{ $book->b_date }}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="pull-right">{{ $books->links() }}</div> 

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#generate').on('çlick', function (e) {
                e.preventDefault();

                console.log('clicked')
            })
        })
    </script>
    <script>
        $(document).ready(function () {

            console.log('looooo')
            $('#activitylog').DataTable({
                "lengthChange": false,
                "pageLength": 10,
            });
        });
</script>
@endsection