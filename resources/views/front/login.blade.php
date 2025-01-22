@extends('front.layout.layout')

@section('content')
    <div class="span9">
        <ul class="breadcrumb">
            <li><a href="{{ route('home') }}">Home</a><span class="divider"></span></li>
            <li class="active">Login</li>
        </ul>
        <h3>Login</h3>
        <div class="well">
            {{-- @if($errors)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif --}}
            @if ($errors->has('message'))
                <div class="alert alert-danger">
                    {{ $errors->first('message') }}
                </div>
            @endif
            <form class="form-horizontal" action="{{ route('loginCheck') }}" method="post">
                @csrf
                <div class="control-group">
                    <label class="control-label" for="input_email">Email <sup>*</sup></label>
                    <div class="controls">
                        <input type="text" id="input_email" name="email" placeholder="Email">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="input_email">Password <sup>*</sup></label>
                    <div class="controls">
                        <input type="password" id="input_email" name="password" placeholder="***********">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="submit" value="Submit" />
                    </div>
                </div>
            </form>
        </div>


        <h3>Registration</h3>
        <div class="well">
            <form class="form-horizontal" action="{{ route('user_store') }}" method="post">
                @csrf
                <div class="control-group">
                    <label class="control-label" for="input_email">First Name <sup>*</sup></label>
                    <div class="controls">
                        <input type="text" id="input_email" name="first_name" placeholder="First Name">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="input_email">Last Name <sup>*</sup></label>
                    <div class="controls">
                        <input type="text" id="input_email" name="last_name" placeholder="Last Name"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="input_email">Email<sup>*</sup></label>
                    <div class="controls">
                        <input type="email" id="input_email" name="email" placeholder="Email"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="input_email">Password <sup>*</sup></label>
                    <div class="controls">
                        <input type="password" id="input_email" name="password" placeholder="Password"/>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="submit" value="Submit" />
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection