@extends('master')

@section('panel')
	<main>
		<div class="container mt-n10" style="padding-top:122px;">
			<div class="card">
				<div class="card-header">{{ $user->exists ? 'Edit' : 'Add' }} User</div>
				<div class="card-body">
					{!! Form::model($user) !!}
					{{ method_field($user->exists ? 'PATCH' : 'POST') }}
                       <div class="row">
                          <div class="form-group col-md-12" data-id="fullName">
                             <label for="exampleFormControlSelect2">Full Name*</label>
                             {{ Form::input('text','fullName', null, array_merge(['class' => 'form-control','placeholder' => 'Enter Full Name','id' => 'fullName', 'autocomplete' => 'nope'])) }}
                             <span class="help-block"><strong></strong></span>
                          </div>
                          <div class="form-group col-md-12" data-id="email">
                                <label for="exampleFormControlSelect2">Email*</label>
                                {{ Form::input('email','email', null, array_merge(['class' => 'form-control','placeholder' => 'Enter email address','id' => 'email'])) }}
                                <span class="help-block"><strong></strong></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12" data-id="password">
                                <label for="exampleFormControlSelect2">Password{{ $user->exists ? '' : '*' }}</label>
                                {{ Form::input('password','password', null, array_merge(['class' => 'form-control','placeholder' => 'Enter password','id' => 'password', 'autocomplete' => 'new-password"'])) }}
                                <span class="help-block"><strong></strong></span>
                            </div>
                            <div class="form-group col-md-12" data-id="mobileNumber">
                                <label for="exampleFormControlSelect2">Contact No*</label>
                                {{ Form::input('text','mobileNumber', null, array_merge(['class' => 'form-control','placeholder' => 'Enter mobile number','id' => 'mobileNumber', 'maxlength' => "10", "oninput" => "this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"])) }}
                                <span class="help-block"><strong></strong></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12" data-id="profileImage">
                                <label for="profile_image">Profile Picture*</label>
                                <input id="profileImage" name="profileImage" type="file" />
                                @if(isset($user->profileImage) && !empty($user->profileImage))
                                    <img src="{{ asset('uploads/user/'.$user->profileImage)}}" alt="Profile Picture" width="100">
                                @endif
                                <span class="help-block"><strong></strong></span>
                            </div>
                        </div>
                        <div class="buttons text-center">
                            <ul class="submit">
                                <li>
                                    <a href="{{ url('/') }}" class="btn btn-light">Cancel</a>
                                   <button class="btn btn-primary">{{ $user->exists ? 'Save' : 'Create' }}</button>
                                </li>
                            </ul>
                        </div>
                   {!! Form::close() !!}
				</div>
			</div>
		</div>
	</main>
@endsection