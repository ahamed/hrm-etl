<div class="row">
                	<nav class="navbar navbar-default">
	  					<div class="container-fluid">
	   					<!-- Brand and toggle get grouped for better mobile display -->
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
							@if(Request::segment(1) == 'user-profile')
								<div class="" style="text-align: center;">
									<a href="{{Request::segment(2) == null ? url('user-edit') : url('user-edit/'.Request::segment(2))}}"><span class="text-info"><span class="fa fa-pencil-square fa-3x"></span></span></a>
									<br>
									<small style="text-align: center">edit</small>
								</div>


							@elseif(Request::segment(1) == 'user-edit')
								<div style="text-align: center;">
									<a  href="{{Request::segment(2) == null ? url('user-profile') : url('user-profile/'.Request::segment(2))}}"><span class="text-danger"><span class="fa fa-desktop fa-3x"></span></span></a>
									<br>
									<small style="text-align: center;">View</small>
								</div>


							@endif


					    </div>

					    <!-- Collect the nav links, forms, and other content for toggling -->
					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					      <ul class="nav navbar-nav" style="margin-left: 20px;">
					        
					        <li class="active" id="pi"><a href="javascript:void(0)">Personal Information</a></li>
					        <li id="academic"><a href="javascript:void(0)" >Academic Qualifications</a></li>
					        <li id="experience"><a href="javascript:void(0)" >Experiences</a></li>
					        <li id="skill"><a href="javascript:void(0)" >Skills</a></li>
					        <li id="training"><a href="javascript:void(0)" >Training</a></li>
					        <li id="reference"><a href="javascript:void(0)" >References</a></li>
					        
					      </ul>
					      
					      
					    </div><!-- /.navbar-collapse -->
					  </div><!-- /.container-fluid -->
					</nav>
                </div>