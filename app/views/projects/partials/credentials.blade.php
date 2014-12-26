<!-- new credentials form -->
<div class="dynamic-form">
	<div class="panel panel-holo">
	  <div class="panel-heading"><strong>Create new credentials</strong></div>
	  	<div class="panel-body">					    
			{{ Form::open(array('action' => 'CredentialsController@create', 'method' => 'get')) }}
				<label>FTP/SSH</label> <input type="radio" name="type" value="server" checked> 
				<label>Other</label> <input type="radio" name="type" value="other">							
				<input class="form-control" type="text" name="name" placeholder="Name">
	     		<input class="form-control" type="text" name="hostname" placeholder="Hostname">
	     		<input class="form-control" type="text" name="username" placeholder="Username">
	     		<input class="form-control" type="text" name="password" placeholder="Password">
	     		<input type="hidden" name="project_id" value="{{ $project->id }}">
	     		<br>
	     		<div class="col-xs-4 no-padding-left">
	     			<input class="form-control" type="text" name="port" placeholder="Port">
	     		</div>
	     		<div class="col-xs-8 no-padding-right">
	         		<button type="submit" class="btn btn-default">
		                <i class="fa fa-plus-square-o fa-lg"></i> Save
		            </button>
	     		</div>					         					         		
	     		<div class="clearfix"></div>
			{{ Form::close() }}		            			            	
	  	</div>
	</div>
</div>
<!-- new credentials form -->

<!-- server panel -->
<div class="panel panel-holo">
  <div class="panel-heading"><strong>FTP & SSH Accounts</strong></div>
  <div class="panel-body ftp-panel-body">					    			            							
 	<div class="row">
     	@foreach ($credentials as $credential)
     		@if ($credential->type == true)
	     		<div class="col-xs-12 col-md-4 credential-wrap" id="credential-wrap-{{ $credential->id }}">
	     			<h4>{{ $credential->name }}</h4	>
	     			<p><strong>Hostname:</strong> {{ $credential->hostname }}</p>
	     			<p><strong>Username:</strong> {{ $credential->username }}</p>
	     			<p><strong>Password:</strong> {{ $credential->password }}</p>
	     			<p><strong>Port:</strong> {{ $credential->port }}</p>

					@if($owner_id == Auth::id())
						<div class="actions">
							<ul class="inline-list list-style-none">
								<li>
								{{ Form::open(array('action' => 'CredentialsController@destroy', 'method' => 'delete')) }}
									<input type="hidden" name="id" value="{{ $credential->id }}">
									<button title="delete" id="{{ $credential->id }}" type="submit" class="btn btn-default btn-delete"><i class="fa fa-trash"></i></button>
								{{ Form::close() }}
								</li>
								<?php /*<li>
									<button title="edit" class="btn btn-default"><a href=""><i class="fa fa-pencil"></i></a></button>
								</li>*/ ?>
								<div class="clearfix"></div>
							</ul>
						</div>
					@endif

	     		</div>
     		@endif
     	@endforeach
 	</div>					     	
  </div>	         	
</div>

<!-- other panel -->
<div class="panel panel-holo">
  <div class="panel-heading"><strong>Other Credentials</strong></div>
  <div class="panel-body other--panel-body">					    
 	<div class="row">
     	@foreach ($credentials as $credential)
     		@if ($credential->type == false)
	     		<div class="col-xs-12 col-md-4 credential-wrap" id="credential-wrap-{{ $credential->id }}">
	     			<h4>{{ $credential->name }}</h4	>
	     			<p><strong>Username:</strong> {{ $credential->username }}</p>
	     			<p><strong>Password:</strong> {{ $credential->password }}</p>

					@if($owner_id == Auth::id())
						<div class="actions">
							<ul class="inline-list list-style-none">
								<li>
								{{ Form::open(array('action' => 'CredentialsController@destroy', 'method' => 'delete')) }}
									<input type="hidden" name="id" value="{{ $credential->id }}">
									<button title="delete" id="{{ $credential->id }}" type="submit" class="btn btn-default btn-delete"><i class="fa fa-trash"></i></button>
								{{ Form::close() }}
								</li>
								<div class="clearfix"></div>
							</ul>
						</div>
					@endif

	     		</div>
     		@endif
     	@endforeach
 	</div>
  </div>	         	
</div>