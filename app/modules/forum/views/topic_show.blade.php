@extends ((( Request::ajax() ) ? 'dashboard::modal.master' : 'dashboard::layout.master' ))


@section ('page-level-assets')
<link href="/assets/apps/css/todo.min.css" rel="stylesheet" type="text/css" />
@stop

@section ('page-title')
    <p class="todo-task-modal-title todo-inline">Topic Author:
        <a class="todo-inline todo-task-assign" href="javascript:;" >{{ $topic->author }}</a>
    </p>
    <p class="todo-task-modal-title todo-inline">Created at
        <a class="todo-inline todo-task-assign" href="javascript:;" >{{ $topic->created_at }}</a>
    </p>
    <p class="todo-task-modal-title todo-inline">Place
        <a class="todo-inline todo-task-assign" href="javascript:;" >{{ $topic->place }}</a>
    </p>
@stop

@section ('page-content-inner')
<h3 class="todo-task-modal-bg">{{ $topic->title }}</h3>
{{ $topic->message }}
@stop

@section ('page-content-outter')
<!-- BEGIN PORTLET-->
<div class="portlet light ">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-bubble font-red-sunglo"></i>
            <span class="caption-subject font-red-sunglo bold uppercase">Answers</span>
        </div>
        <div class="actions">
        </div>
    </div>
    <div class="portlet-body" id="chats">
        <div class="scroller" style="height: 525px;" data-always-visible="1" data-rail-visible1="1">
            <ul class="chats">
                @foreach ($answers as $answer)

                <li class="in">
                    <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar.png" />
                    <div class="message">
                        <span class="arrow"> </span>
                        <a href="javascript:;" class="name"> {{ $answer->author }} </a>
                        <span class="datetime"> at {{ $answer->created_at }} <small class="moment text-info">{{ $answer->created_at }}</small> </span>
                        <span class="body"> {{ $answer->message }} </span>
                    </div>
                </li>

                @endforeach
            </ul>
        </div>
        <div class="chat-form">
            <div class="input-cont">
                <input style="float:left;width: 25% !important;" class="form-control" type="text" id="author" name="author" placeholder="Type your name here..." />
                <input style="float:left;width: 74% !important;" class="form-control" type="text" id="message" name="message" placeholder="Type a message here..." /> </div>
            <div class="btn-cont" style="margin-top:-8px;">
                <span class="arrow"> </span>
                <a href="javascript:;" class="btn blue icn-only" id="send">
                    <i class="fa fa-check icon-white"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- END PORTLET-->
@stop
@section ('page-footer-buttons')
<button class="btn default" data-dismiss="modal" aria-hidden="true">Close</button>
@stop

@section ('page-level-plugins')
<script type="text/javascript" src="/assets/global/plugins/moment.min.js"></script>
@stop

@section ('page-level-script')
<script type="text/javascript">

var answer_html = '';

answer_html += '<li class="in">';
answer_html += '    <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar.png" />';
answer_html += '    <div class="message">';
answer_html += '        <span class="arrow"> </span>';
answer_html += '        <a href="javascript:;" class="name"></a>';
answer_html += '        <span class="datetime"> at  <small class="moment text-info"></small> </span>';
answer_html += '        <span class="body">  </span>';
answer_html += '    </div>';
answer_html += '</li>';

$("#send").on('click', function(){
    var data = {};
    $.each(['author','message'], function(index, val) {
         if( $("#" + val).val() == '' || $("#" + val).val().length < 5 ) {
            $("#" + val).css({'border-color':'red'}); $("#" + val).attr('placeholder', 'Please introduce more than 5 chars...');
            setTimeout(function(){ $("#" + val).css({'border-color':'#ddd'}); }, 5000);
             return false; }

         data[val] = $("#" + val).val();
    });
    $.ajax({
        url: '/forum/topic/{{ $topic->tid }}/create/answer',
        type: 'POST',
        dataType: 'json',
        data: data,
    })
    .done(function(data) {
        console.log("success");
        var html = $(answer_html);
        html.find('.name').text( data.author );
        console.log(html.find('.name'));
        html.find('.datetime').html( 'at '+data.created_at+' <small class="moment text-info">'+data.created_at+'</small>' );
        html.find('.body').html( data.message );
        html.hide().prependTo(".chats").fadeIn(1000);
        refresh_moment(html);

        $.each(['author','message'], function(index, val) {
             $("#" + val).val('');
        });
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");

    });
    
});

var refresh_moment = $.debounce(10, function( elem ){
    if(!!elem){
        $(elem).find('.moment').each(function (index, dateElem) {
            var $dateElem = $(dateElem);
            var formatted = moment(new Date($dateElem.text())).fromNow();
            $dateElem.text(formatted);
        });
    }else{
        $('.moment').each(function (index, dateElem) {
            var $dateElem = $(dateElem);
            var formatted = moment(new Date($dateElem.text())).fromNow();
            $dateElem.text(formatted);
        });
    }
});
$(document).ready(function() {
    App.initSlimScroll(".scroller")

    refresh_moment();

});
</script>
@stop