@extends('layouts.app')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<div class="tab-container mb-5">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link active" href="#home" data-toggle="tab" role="tab">Recieved Request</a></li>
                <li class="nav-item"><a class="nav-link" href="#profile" data-toggle="tab" role="tab">Sent Request</a></li>
                <li class="nav-item"><a class="nav-link" href="#messages" data-toggle="tab" role="tab">Friends</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel">
                 
                  <table class="table">
                  	<tr>
                  		<th>Name</th>
                  		<th>Age</th>
                  		<th>Action</th>
                  	</tr>
                  	@foreach($meetup->recievedRequest->where('status','=','pending') as $friend)
                  		<tr>
                  			<td>{{$friend->meetup->user->name}}</td>
                  			<td>{{$friend->sent->age}}</td>
                  			<td>
                  				<a href="{{ route('meetup.accept',$friend->id) }}" class="btn btn-success">Accept</a>
                  				<a href="{{ route('meetup.decline',$friend->id) }}" class="btn btn-danger">Decline</a>
                  			</td>
                  		</tr>
                  	@endforeach
                  </table>
                </div>
                <div class="tab-pane" id="profile" role="tabpanel">
                  <table class="table">
                  	<tr>
                  		<th>Name</th>
                  		<th>Age</th>
                  		<th>Action</th>
                  	</tr>
                  	@foreach($meetup->sentRequest as $f)
                  		<tr>
                  			<td>{{$f->sent->user->name}}</td>
                  			<td>{{$f->sent->age}}</td>
                  			<td>
                  				<a href="{{ route('meetup.cancel',$f->id) }}" class="btn btn-danger">Cancel</a>
                  			</td>
                  		</tr>
                  	@endforeach
                  </table>
                </div>
                <div class="tab-pane" id="messages" role="tabpanel">
                  <table class="table">
                  	<tr>
                  		<th>Name</th>
                  		<th>Age</th>
                  		<th>Action</th>
                  	</tr>
                  	@foreach($meetup->friends as $f)
                  		<tr>
                  			<td>{{$f->friends->name()}}</td>
                  			<td>{{$f->meetup->age}}</td>
                  			<td>
                  				<a href="" class="btn btn-danger">Message</a>
                  				
                  			</td>
                  		</tr>
                  	@endforeach
                  </table>
                </div>
              </div>
            </div>
		</div>
	</div>

@endsection