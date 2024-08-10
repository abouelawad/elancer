@extends('layouts-hireo.app')


@section('title page', 'Create')
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
						<span class="hamburger hamburger--collapse">
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
								<li><a href="dashboard-messages.html"><i class="icon-material-outline-question-answer"></i> Messages <span
											class="nav-tag">2</span></a></li>
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
			<div class="dashboard-content-inner">

				<!-- Dashboard Headline -->
				<div class="dashboard-headline">
					<h3>Post a Job</h3>

					<!-- Breadcrumbs -->
					<nav id="breadcrumbs" class="dark">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Post a Job</li>
						</ul>
					</nav>
				</div>

				<!-- Row -->
				<div class="row">

					<!-- Dashboard Box -->
					<div class="col-xl-12">
						<div class="dashboard-box margin-top-0">

							<!-- Headline -->
							<div class="headline">
								<h3><i class="icon-feather-folder-plus"></i> Job Submission Form</h3>
							</div>
							@if ($errors->any())
    <ul>
      <div class="alert alert-danger" role="alert">
      @foreach ($errors->all() as $error)
          <li>  {{ $error }}</li>
          @endforeach
        </div>
    </ul>
    @endif

							<div class="content with-padding padding-bottom-10">
								<form action="{{ route('client.projects.update',['project'=>$project->id]) }}" method="POST">
									@csrf @method('put')
								<div class="row">

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Job Title</h5>
											<input type="text" class="with-border" name='title' value="{{ old($project->title,$project->title) }}" @error('name') is-invalid @enderror>
											@error('name')
          							<p class="invalid-feedback">{{ $message }} </p>
      								@enderror

										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Job Type</h5>
											<select class="selectpicker with-border" data-size="7" title="Select Job Type" name="type">
												@foreach (\App\Enums\Project::types() as $type)
												<option value="{{old($type,$type)}}" @selected($project->type==$type)>{{$type}}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Job Status</h5>
											<select class="selectpicker with-border" data-size="7" title="Select Category" name="status">
												@foreach (\App\Enums\Project::statuses() as $status)
												<option value="{{old($status,$status)}}"@selected($project->status==$status)>{{ $status }}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Category</h5>
											<select class="selectpicker with-border" data-size="7" title="Select Job Category" name="category_id">
												@foreach ($categories as $category_id => $category_name)
												<option value="{{$category_id}}" @if($category_id==$project->category_id) selected @endif>{{$category_name}}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Salary</h5>
											<div class="row">

												<div class="col-xl-12">
													<div class="input-with-icon">
														<input class="with-border" name="budget" type="text" placeholder="budget" value="{{ old($project->budget,$project->budget) }}" @error('budget') is-invalid @enderror>
														<i class="currency">USD</i>
														@error('budget')
          										<p class="invalid-feedback">{{ $message }} </p>
      											@enderror

													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="submit-field">
											<h5>Tags <span>(optional)</span> <i class="help-icon" data-tippy-placement="right"
													title="Maximum of 10 tags"></i></h5>
											<div class="keywords-container">
												<div class="keyword-input-container">
													<input type="text" class="keyword-input with-border" name="tags" placeholder="e.g. job title, responsibilites" 
													value=" {{implode(', ',$tags)}} "
													{{-- value="@foreach ($tags as $tag) {{trim($tag.",")}} @endforeach" --}}
												
													/>
													<button type="button" class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></button>
												</div>
												<div class="keywords-list"><!-- keywords go here --></div>
												<div class="clearfix"></div>
											</div>

										</div>
									</div>

									<div class="col-xl-12">
										<div class="submit-field">
											<h5>Job Description</h5>
											<textarea cols="30" rows="5" class="with-border" name="description" @error('description') is-invalid @enderror >{{ $project->description }}</textarea>
											@error('description')
											<p class="invalid-feedback">{{ $message }} </p>
										@enderror
											<div class="uploadButton margin-top-30">
												<input class="uploadButton-input" type="file" accept="image/*, application/pdf" id="upload"
													multiple />
												<label class="uploadButton-button ripple-effect" for="upload">Upload Files</label>
												<span class="uploadButton-file-name">Images or documents that might be helpful in describing your job</span>
											</div>
										</div>
									</div>

									<div class="col-xl-12">
										<button type="submit"  class="button ripple-effect big margin-top-30"><i class="icon-feather-plus"></i> Post a
											Job</button>
									</div>
								</div>
							</form>
							</div>
						</div>
					</div>



				</div>
				<!-- Row / End -->



			</div>
		</div>
		<!-- Dashboard Content / End -->

	</div>
	<!-- Dashboard Container / End -->

@endsection
