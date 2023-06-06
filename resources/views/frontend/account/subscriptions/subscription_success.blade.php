@extends('frontend.layouts.account')
@section('content')
<div class="container">
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h5 class="txt-dark">Subscriptions</h5>
		</div>
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="">Dashboard</a></li>
				<li><a href=""><span>Subscriptions</span></a></li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			@include('frontend.layouts.shared.notification')
			<div class="panel panel-default border-panel card-view">
				<div class="panel-heading">
					<div class="pull-left">
						<h6 class="panel-title txt-dark">Subscription</h6>
					</div>
					<div class="pull-right">
						<a href="{{route('account.subscriptions')}}" class="btn btn-sm btn-primary"><span class="btn-text">Back</span></a>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper">
					<div class="panel-body">
						<div class="alert alert-success">
							Subscription purchase successfully!!
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection