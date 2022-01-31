@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
	<div class="alert-message"> <strong>{{ $message }}</strong> </div>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible" role="alert">
	<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
	<div class="alert-message"> <strong>{{ $message }}</strong> </div>
</div>

@endif


@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-dismissible" role="alert">
	<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
	<div class="alert-message"> <strong>{{ $message }}</strong> </div>
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert alert-info alert-dismissible" role="alert">
	<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
	<div class="alert-message"> <strong>{{ $message }}</strong> </div>
</div>
@endif

@if (Session::get('email'))
<div class="alert alert-danger alert-dismissible" role="alert">
	<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
	<div class="alert-message"> <strong>{{ $message }}</strong> </div>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger alert-dismissible" role="alert">
	<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
	<div class="alert-message"> <strong>{{ $message }}</strong> </div>
</div>
@endif
