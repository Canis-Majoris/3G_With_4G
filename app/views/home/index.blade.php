@extends('layouts.skilltemp')
@section('content')

<div class="tag_bar">
{{ Form::open(array('url' => 'filter', 'method' => 'GET')) }}
	<?php $d = 0; $check = null;?>
	@foreach($skills as $skill)
		<?php $d++; ?>
		@if(in_array($skill->name, $tagname))
		<?php $check = 'checked';?>
		@endif
        <input type="checkbox" id="{{ $d }}" class="checkbox1" name="{{ $skill->name }}" {{ $check }}/>
    	<label for="{{ $d }}">{{ $skill->name }}</label>
    	<?php $check = null; ?>
     @endforeach
    <div class="col-sm-12 controls">
      <!--{{ Form::submit('Login', array('id' => 'btn-login', 'class' => 'btn btn-success pull-right')) }} -->
      <button type="submit" class="btn btn-primary btn-info pull-right" id="btn-login" >
        <span class="glyphicon glyphicon-tasks"></span> Filter
      </button>

    </div>
{{Form::close()}} 
</div>

@if(!empty($tagname))
	<p class="tag_header">
	@if(count($tagname)>1)
		@foreach($tagname as $tag)
		@if($tag != end($tagname))
		{{ $tag.', '  }}
		@else
		{{ $tag }}
		@endif
		@endforeach
	@else
	{{ $tagname[0] }}
	@endif
	</p>
@endif
<table class="table table-bordered table-hover table-striped">
	<thead>
		<th>Firstname/Lastname</th>
		<th>Gender</th>
		<th>uyvuyvu</th>
	</thead>
	<tbody>
	@foreach($users as $user)
	<tr>
		<td>{{ $user->firstname }} {{ $user->lastname }}</td>
		<td>{{ $user->gender }}</td>
		<td>
			@foreach($user->skills as $skill)
				<?php $level = null; ?>
				@if(in_array($skill->name, $tagname))
				<?php echo $level = ', LVL:'.$skill->level;?>
				@endif
				<a href="{{ URL::to('tag/'.$skill->name) }}" class="label label-default">{{ $skill->name $level }}</a>
			@endforeach
		</td>
	</tr>
	@endforeach
	<?php echo $users->links(); ?>
	</tbody>
</table>
@stop
