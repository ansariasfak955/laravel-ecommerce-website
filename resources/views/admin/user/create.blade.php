@extends('admin.layout.layout')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Design <small>different form elements</small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br>
        @if(Session::has('success'))
          <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('error'))
          <div class="alert alert-danger">{{Session::get('error')}}</div>
        @endif
        <form id="demo-form2" action="{{ route('admin.create.user') }}" method="post" data-parsley-validate="" class="form-horizontal form-label-left">
            @csrf
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="first-name" name="name" class="form-control col-md-7 col-xs-12" value="{{ old('name') }}">
              @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name')}}</span>
              @endif
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Role <span class="">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="role" id="" class="form-control">
                <option value="">Select role</option>
                @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->role }}</option>
                @endforeach
              </select>
              {{-- <input type="text" id="first-name" name="name" class="form-control col-md-7 col-xs-12" value="{{ old('name') }}"> --}}
              {{-- @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name')}}</span>
              @endif --}}
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email <span class="">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="first-name" name="email" class="form-control col-md-7 col-xs-12" value="">
              {{-- @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name')}}</span>
              @endif --}}
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password <span class="">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="password" id="first-name" name="password" class="form-control col-md-7 col-xs-12" value="">
              {{-- @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name')}}</span>
              @endif --}}
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <input type="submit" class="btn btn-success" value="Submit">
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
@endsection