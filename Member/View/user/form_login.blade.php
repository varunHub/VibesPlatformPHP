{{ Form::open('login','post',array('class' => 'form-vertical')) }}
<fieldset>
	<legend>
		Login
	</legend>
	<label >Email</label>
	<div class="input-prepend">
		<span class="add-on"><i class="icon-envelope"></i></span>
		<input type="text" id="email" name="email" placeholder="" value="{{Input::old('email')}}" />
	</div>
	<label >Password</label>
	<div class="input-prepend">
		<span class="add-on"><i class="icon-key"></i></span>
		<input type="password" id="password" name="password" placeholder="" />
	</div>
	
		<span class="help-block"></span>
	<button class="btn" type="submit" >
		Login
	</button>
</fieldset>

{{ Form::close() }}