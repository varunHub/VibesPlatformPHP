{{ Form::open('join','post',array('class' => 'form-vertical')) }}

<fieldset>
	<legend>
		Join Ulavi
	</legend>
	<p>
		Join us just with your email to enjoy the exclusive features ! 
	</p>
	<label>Email</label>
	<div class="input-prepend">
		<span class="add-on"><i class="icon-envelope"></i></span>
		<input type="text" placeholder="email ">
	</div>
	<span class="help-block"></span>
	<button type="submit" class="btn">
		Submit
	</button>
</fieldset>

{{ Form::close() }}