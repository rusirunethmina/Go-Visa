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
						<a href="{{route('account.dashboard')}}" class="btn btn-sm btn-primary"><span class="btn-text">Back</span></a>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-wrapper">
					<div class="panel-body">
						<div class="row">
							@foreach($plans as $plan)
							<div class="col-lg-4 col-md-6 col-sm-12 mb-15">
								<div class="panel panel-pricing mb-0">
									<div class="panel-heading bg-orange-light-4 text-center">
										<h6>{{ $plan->name }}</h6>
										<span class="panel-price">${{ $plan->price }}/Month</span>
									</div>
									<div class="panel-body pl-0 pr-0">
										@foreach($plans_items as $item)
										<ul class="list-group mb-0">
											<li class="list-group-item"><i class="fa fa-check"></i>{{$item->name}}</li>
											<li>
												<hr class="mt-5 mb-5" />
											</li>
										</ul>
										@endforeach
									</div>
									<div class="panel-footer pb-35 text-center">
										@if($plan->id == $subcription_name && $user_subcription_type->stripe_status == 'active')
										<a class="btn btn-success btn-rounded btn-lg">Your Activated Plan</a>
										<a href="{{ route('account.subscription.status', $plan) }}" class="btn btn-danger btn-rounded btn-lg">Deactivated Plan</a>
										@elseif($subcription_name == null)
										<a class="btn btn-primary btn-rounded btn-lg" href="{{ route('account.plans.show', $plan) }}">subscribe now</a>
										@else
										<a class="btn btn-primary btn-rounded btn-lg" href="{{ route('account.plans.show', $plan) }}">subscribe now</a>
										@endif
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection