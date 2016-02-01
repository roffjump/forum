@yield ('page-level-assets')

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
	<h4 class="modal-title">
		@section ('page-title')
		@show
	</h4>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			@section ('page-content-inner')
			@show
		</div>
	</div>
</div>
@section ('page-content-outter')
@show
<div class="modal-footer">
	@section ('page-footer-buttons')
	@show
</div>


@yield ('page-level-plugins')

@yield ('page-level-script')
