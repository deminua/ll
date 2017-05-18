@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-4">  

                <div class="text-center">

                	<div style="position: absolute; bottom: 20px; left:40px;">
	                	@if($user->avatar)
						{!! Form::model($user, ['route' => ['user.avatar.delete', $user], 'method' => 'delete']) !!}
						{{ Form::submit('x', ['class' => 'btn btn-danger']) }}
						{!! Form::close() !!}
						@endif
                	</div>

                	<img src="@if(auth()->user()->avatar)/storage/avatars/{{ auth()->user()->avatar }}@else /storage/noavatar.png @endif" style="width:300px; border-radius:50%;">
                </div>

		</div>

        <div class="col-md-8">

                <h2>Редактор профиля</h2>

					{!! Form::model($user, ['route' => ['user.update', $user], 'files' => true]) !!}
					<div class="form-group @if ($errors->has('name')) has-error @endif">
					{{ Form::label('name', __('user.name'), ['class' => 'control-label']) }}
					{{ Form::text('name', null, ['class' => 'form-control']) }}
					@if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
					</div>

					<div class="form-group @if ($errors->has('surname')) has-error @endif">
					{{ Form::label('surname', __('user.surname'), ['class' => 'control-label']) }}
					{{ Form::text('surname', null, ['class' => 'form-control']) }}
					@if ($errors->has('surname')) <p class="help-block">{{ $errors->first('surname') }}</p> @endif
					</div>

					<div class="form-group @if ($errors->has('avatar')) has-error @endif">
					{{ Form::label('avatar', __('user.avatar'), ['class' => 'control-label']) }}
					{{ Form::file('avatar', null, ['class' => 'form-control']) }}
					@if ($errors->has('avatar')) <p class="help-block">{{ $errors->first('avatar') }}</p> @endif
					</div>

					<div class="pull-right">{{ Form::submit('Сохранить', ['class' => 'btn btn-success']) }}</div>
					{!! Form::close() !!}


        </div>
    </div>
</div>
@endsection
