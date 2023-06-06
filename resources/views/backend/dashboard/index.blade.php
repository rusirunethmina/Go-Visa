@extends('backend.layouts.admin')
@section('content')
<div class="container">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Verify</h5>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="">Dashboard</a></li>
                    <li><a href=""><span>Verify</span></a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                @include('backend.layouts.shared.notification')
                <div class="panel panel-default border-panel card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Profile Verification</h6>
                        </div>
                        <div class="pull-right">
                            <a href="" class="btn btn-sm btn-primary"><span class="btn-text">Back</span></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper">
                        <div class="panel-body">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Business License</td>
                                        <td>2023-02-23</td>
                                        <td><span class="label label-success">approved</span> </td>
                                        <td>
                                          <button type="button" class="btn btn-xs btn-default">Update</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>RCIC License</td>
                                        <td>2023-02-23</td>
                                        <td><span class="label label-danger">rejected</span> </td>
                                        <td>
                                          <button type="button" class="btn btn-xs btn-default">Update</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td>PME course taken</td>
                                        <td>2023-02-23</td>
                                        <td><span class="label label-primary">pending</span> </td>
                                        <td>
                                          <button type="button" class="btn btn-xs btn-default">Update</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td>CICC Membership Dues</td>
                                        <td>2023-02-23</td>
                                        <td><span class="label label-primary">pending</span> </td>
                                        <td>
                                          <button type="button" class="btn btn-xs btn-default">Update</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td>Case Approval Rate</td>
                                        <td>2023-02-23</td>
                                        <td><span class="label label-primary">pending</span> </td>
                                        <td>
                                          <button type="button" class="btn btn-xs btn-default">Update</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td>Client Reviews</td>
                                        <td>2023-02-23</td>
                                        <td><span class="label label-primary">pending</span> </td>
                                        <td>
                                          <button type="button" class="btn btn-xs btn-default">Update</button>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>3</td>
                                        <td>Client References </td>
                                        <td>2023-02-23</td>
                                        <td><span class="label label-primary">pending</span> </td>
                                        <td>
                                          <button type="button" class="btn btn-xs btn-default">Update</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td> Social Score </td>
                                        <td>2023-02-23</td>
                                        <td><span class="label label-primary">pending</span> </td>
                                        <td>
                                          <button type="button" class="btn btn-xs btn-default">Update</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td> Physical Office </td>
                                        <td>2023-02-23</td>
                                        <td><span class="label label-primary">pending</span> </td>
                                        <td>
                                          <button type="button" class="btn btn-xs btn-default">Update</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td> Minimum 10 Approved Cases </td>
                                        <td>2023-02-23</td>
                                        <td><span class="label label-primary">pending</span> </td>
                                        <td>
                                          <button type="button" class="btn btn-xs btn-default">Update</button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>	
            </div>
		</div>
	</div>
@endsection
