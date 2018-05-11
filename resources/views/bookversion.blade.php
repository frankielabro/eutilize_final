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
                                            <h3 class="title pb-3">Book Version</h3>
                                        </div>
                                        <div class="col-md-6 text-right" style="width: fit-content;float: right;">
                                            <button type="button" class="btn btn-primary btn-just-icon" data-toggle="modal" data-target="#ADDMODAL">
                                                <i class="ti-reload"></i>
                                            </button>
                                        </div>
                                    </div>

                        </div>
                        <div class="content table-responsive">
                            <table id="bookversion" class="display table table-hover">
                                <thead>
                                    <th >No.</th>
                                    <th width="25%">Book Title</th>
                                    <th width="25%">Book Category</th>
                                    <th width="25%">Version On-Hand</th>
                                    <th width="25%">Latest Version</th>
                                </thead>
                                <tbody>

                                    <!-- START OF PHP FOR LOOP  -->
                                    <!-- 
                                            <tr>
                                                <td>1</td>
                                                <td>Book of Death</td>
                                                <td>003</td>
                                                <td>Daily</td>
                                                <td>Daily</td>
                                            </tr>
                                         -->
                                    <!-- END OF PHP FOR LOOP  -->

                                    <!-- START OF SAMPLE DATA  -->
                                    <tr>
                                        <td>1</td>
                                        <td>Book of Death</td>
                                        <td>700 — Arts and recreation</td>
                                        <td>Daily</td>
                                        <td>Daily</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Book of Death</td>
                                        <td>000 — Computer science, information and general works</td>
                                        <td>Daily</td>
                                        <td>Daily</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Book of Death</td>
                                        <td>700 — Arts and recreation</td>
                                        <td>Daily</td>
                                        <td>Daily</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Book of Death</td>
                                        <td>000 — Computer science, information and general works</td>
                                        <td>Daily</td>
                                        <td>Daily</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Book of Death</td>
                                        <td>700 — Arts and recreation</td>
                                        <td>Daily</td>
                                        <td>Daily</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Book of Death</td>
                                        <td>000 — Computer science, information and general works</td>
                                        <td>Daily</td>
                                        <td>Daily</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Book of Death</td>
                                        <td>700 — Arts and recreation</td>
                                        <td>Daily</td>
                                        <td>Daily</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Book of Death</td>
                                        <td>000 — Computer science, information and general works</td>
                                        <td>Daily</td>
                                        <td>Daily</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Book of Death</td>
                                        <td>700 — Arts and recreation</td>
                                        <td>Daily</td>
                                        <td>Daily</td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Book of Death</td>
                                        <td>000 — Computer science, information and general works</td>
                                        <td>Daily</td>
                                        <td>Daily</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Book of Death</td>
                                        <td>000 — Computer science, information and general works</td>
                                        <td>Daily</td>
                                        <td>Daily</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Book of Death</td>
                                        <td>700 — Arts and recreation</td>
                                        <td>Daily</td>
                                        <td>Daily</td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Book of Death</td>
                                        <td>000 — Computer science, information and general works</td>
                                        <td>Daily</td>
                                        <td>Daily</td>
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
            $('#bookversion').DataTable({
                "lengthChange": false,
            });
    
        });
    </script>
@endsection