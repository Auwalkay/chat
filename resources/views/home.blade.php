@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10">
     <div class="card">
        <div class="card-header">
         Search
        </div>
        <div class="card-body">
          <form class="form">
            <div class="row">
              <div class="col-md-3">
                <select class="form-control">
              <option>State</option>
              @foreach(App\State::all() as $state)
                <option value="{{$state->id}}">{{$state->name}}</option>
              @endforeach
            </select>
              </div>
              <div class="col-md-3">
                <select class="form-control">
                  <option>Seeking For</option>
                </select>
              </div>
              <div class="col-md-2">
                <select class="form-control">
                  <option>Gender</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>
              <div class="col-md-2">
                <input type="number" name="minAge" class="form-control" min="0" placeholder="Min Age">
              </div>
              <div class="col-md-2">
                <input type="number" name="maxAge" class="form-control" min="0" placeholder="Max Age">
              </div>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

