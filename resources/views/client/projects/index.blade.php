@extends('layouts-hireo.app')


@section('content')

<!-- Dashboard Container -->
<div class="dashboard-container">

	<!-- Dashboard Sidebar
	================================================== -->
	<div class="dashboard-sidebar">
		<div class="dashboard-sidebar-inner" data-simplebar>
			<div class="dashboard-nav-container">

				<!-- Responsive Navigation Trigger -->
				<a href="#" class="dashboard-responsive-nav-trigger">
					<span class="hamburger hamburger--collapse" >
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</span>
					<span class="trigger-title">Dashboard Navigation</span>
				</a>
				
				<!-- Navigation -->
				<div class="dashboard-nav">
					<div class="dashboard-nav-inner">

						<ul data-submenu-title="Start">
							<li><a href="dashboard.html"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
							<li><a href="dashboard-messages.html"><i class="icon-material-outline-question-answer"></i> Messages <span class="nav-tag">2</span></a></li>
							<li><a href="dashboard-bookmarks.html"><i class="icon-material-outline-star-border"></i> Bookmarks</a></li>
							<li><a href="dashboard-reviews.html"><i class="icon-material-outline-rate-review"></i> Reviews</a></li>
						</ul>
						
						<ul data-submenu-title="Organize and Manage">
							<li class="active-submenu"><a href="#"><i class="icon-material-outline-business-center"></i> Jobs</a>
								<ul>
									<li><a href="dashboard-manage-jobs.html">Manage Jobs <span class="nav-tag">3</span></a></li>
									<li><a href="dashboard-manage-candidates.html">Manage Candidates</a></li>
									<li><a href="dashboard-post-a-job.html">Post a Job</a></li>
								</ul>	
							</li>
							<li><a href="#"><i class="icon-material-outline-assignment"></i> Tasks</a>
								<ul>
									<li><a href="dashboard-manage-tasks.html">Manage Tasks <span class="nav-tag">2</span></a></li>
									<li><a href="dashboard-manage-bidders.html">Manage Bidders</a></li>
									<li><a href="dashboard-my-active-bids.html">My Active Bids <span class="nav-tag">4</span></a></li>
									<li><a href="dashboard-post-a-task.html">Post a Task</a></li>
								</ul>	
							</li>
						</ul>

						<ul data-submenu-title="Account">
							<li><a href="dashboard-settings.html"><i class="icon-material-outline-settings"></i> Settings</a></li>
							<li><a href="index-logged-out.html"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
						</ul>
						
					</div>
				</div>
				<!-- Navigation / End -->

			</div>
		</div>
	</div>
	<!-- Dashboard Sidebar / End -->


	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>Manage Jobs</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>Manage Jobs</li>
					</ul>
				</nav>
			</div>

			<!-- Row -->
			<div class="row">
				
				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">
						<x-flash-messages/>
						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-business-center"></i> My Job Listings</h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">
								@foreach ($projects as $project )
									
								<li>
									<!-- Job Listing -->
									<div class="job-listing">

										<!-- Job Listing Details -->
										<div class="job-listing-details">

											<!-- Logo -->
											<!-- <a href="#" class="job-listing-company-logo">
												<img src="images/company-logo-05.png" alt="">
											</a> -->

											<!-- Details -->
											<div class="job-listing-description">
												<h3 class="job-listing-title"><a href="#">{{ $project->title }}</a> <span class="dashboard-status-button green">{{ $project->status }}</span></h3>

												<!-- Job Listing Footer -->
												<div class="job-listing-footer">
													<ul>
														<li><i class="icon-material-outline-date-range"></i> Posted on 10 July, 2018</li>
														<li><i class="icon-material-outline-date-range"></i> Category: <strong>{{ $project->category->parent->name }}/{{ $project->category->name }}</strong></li>
													</ul>
												</div>
											</div>
										</div>
									</div>

									<!-- Buttons -->
									<div class="buttons-to-right always-visible d-flex">
										<a href="dashboard-manage-candidates.html" class="button ripple-effect"><i class="icon-material-outline-supervisor-account"></i> Manage Candidates <span class="button-info">0</span></a>
										<a href="{{ route('client.projects.edit',['project'=>$project->id]) }}" class="button gray ripple-effect ico" title="Edit" data-tippy-placement="top"><i class="icon-feather-edit"></i></a>

										<form action="{{ route('client.projects.destroy',['project'=>$project->id])}}" method='POST'>
											@csrf @method('delete')
										<button type="submit" class="button gray ripple-effect ico" title="Remove" data-tippy-placement="top"><i class="icon-feather-trash-2"></i></button>
									</form>

									</div>
								</li>
								@endforeach




							</ul>
						</div>
					</div>
				</div>

			</div>
			<!-- Row / End -->

	{{ $projects->links() }}
@endsection
