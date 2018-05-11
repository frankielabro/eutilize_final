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

                                    <!-- START OF PHP FOR LOOP  -->
                                    <!-- 
                                        <tr>
                                            <td>1</td>
                                            <td>234-0085</td>
                                            <td>Book of Death</td>
                                            <td>3:45 pm</td>
                                            <td>4:45 pm</td>
                                        </tr>
                                    -->
                                    <!-- END OF PHP FOR LOOP  -->

                                    <!-- START OF SAMPLE DATA  -->
                                    <tr>
                                        <td>1</td>
                                        <td>234-0085</td>
                                        <td>Book of Death</td>
                                        <td>3:45 pm</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>345-123</td>
                                        <td>Death Note</td>
                                        <td>2:50 pm</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>234-0085</td>
                                        <td>Book of Death</td>
                                        <td>3:45 pm</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>345-123</td>
                                        <td>Death Note</td>
                                        <td>2:50 pm</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>234-0085</td>
                                        <td>Book of Death</td>
                                        <td>3:45 pm</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>345-123</td>
                                        <td>Death Note</td>
                                        <td>2:50 pm</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>234-0085</td>
                                        <td>Book of Death</td>
                                        <td>3:45 pm</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>345-123</td>
                                        <td>Death Note</td>
                                        <td>2:50 pm</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>234-0085</td>
                                        <td>Book of Death</td>
                                        <td>3:45 pm</td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>345-123</td>
                                        <td>Death Note</td>
                                        <td>2:50 pm</td>
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

@section('script')
    <script>
        $(document).ready(function () {
            $('#activitylog').DataTable({
                "lengthChange": false,
                "pageLength": 10,
            });
        });
</script>
@endsection