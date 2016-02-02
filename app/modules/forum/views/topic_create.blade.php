@extends ((( Request::ajax() ) ? 'dashboard::modal.master' : 'dashboard::layout.master' ))


@section ('page-level-assets')
<link href="/assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
@stop

@section ('page-title')
	Create topic
@stop

@section ('page-content-inner')
<form action="/forum/topic/create" method="POST" class="form-horizontal" id="form_create">
    <div class="form-body">
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
        <div class="alert alert-success display-hide">
            <button class="close" data-close="alert"></button> Your topic has been created! </div>

        <div class="form-group form-md-line-input">
            <label class="col-md-{{ Request::ajax()?'2':'1' }} control-label" for="form_control_1">Title
                <span class="required">*</span>
            </label>
            <div class="col-md-{{ Request::ajax()?'10':'4' }}">
                <input type="text" class="form-control" placeholder="" name="title">
                <div class="form-control-focus"> </div>
                <span class="help-block">Introduce a title...</span>
            </div>
        </div>
        <div class="form-group form-md-line-input">
            <label class="col-md-{{ Request::ajax()?'2':'1' }} control-label" for="form_control_1">Name
                <span class="required">*</span>
            </label>
            <div class="col-md-{{ Request::ajax()?'10':'4' }}">
                <input type="text" class="form-control" placeholder="" name="author">
                <div class="form-control-focus"> </div>
                <span class="help-block">Here is where you put your name...</span>
            </div>
        </div>
        <div class="form-group form-md-line-input">
            <label class="col-md-{{ Request::ajax()?'2':'1' }} control-label" for="form_control_1">Message
                <span class="required">*</span>
            </label>
            <div class="col-md-10">
	    		<textarea name="message" id="message"></textarea>
            </div>
        </div>
	</div>
</form>

@stop

@section ('page-footer-buttons')
<button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
<button  type="submit" form="form_create" class="btn green">Create</button>
@stop

@section ('page-level-plugins')
<script src="/assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
@stop

@section ('page-level-script')
<script type="text/javascript">

var handleValidation = function() {
    // for more info visit the official plugin documentation: 
    // http://docs.jquery.com/Plugins/Validation
    var form1 = $('#form_create');
    var error1 = $('.alert-danger', form1);
    var success1 = $('.alert-success', form1);

    form1.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "", // validate all fields including form hidden input
        rules: {
            title: {
                minlength: 5,
                required: true
            },
            author: {
                minlength: 3,
                required: true
            },
        },

        invalidHandler: function(event, validator) { //display error alert on form submit              
            success1.hide();
            error1.show();
            App.scrollTo(error1, -200);
        },

        errorPlacement: function(error, element) {
            if (element.is(':checkbox')) {
                error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline"));
            } else if (element.is(':radio')) {
                error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
            } else {
                error.insertAfter(element); // for other inputs, just perform default behavior
            }
        },

        highlight: function(element) { // hightlight error inputs
            $(element)
                .closest('.form-group').addClass('has-error'); // set error class to the control group
        },

        unhighlight: function(element) { // revert the change done by hightlight
            $(element)
                .closest('.form-group').removeClass('has-error'); // set error class to the control group
        },

        success: function(label) {
            label
                .closest('.form-group').removeClass('has-error'); // set success class to the control group
        },

        submitHandler: function(form) {
			var code = $('#message').summernote().code();
			console.log(code);
			if(code=='' || code.length < 5) {
			    error1.text("You should describe your topic, at least 5 characters ...");
	            success1.hide();
	            error1.show();
	            return false;
			} else {
	            success1.show();
	            error1.hide();
	            @if (Request::ajax())
                    $.post('/forum/topic/create', $("#form_create").serialize(), function(data, textStatus, xhr) {
    	            	$("#modal").modal('hide');
    	            	refresh();
                    });
	            @else
		            return true;
	            @endif
			}
        }
    });
}

$(document).ready(function() {
	$("#message").summernote({height:300}).code('');
	handleValidation();
});
</script>
@stop