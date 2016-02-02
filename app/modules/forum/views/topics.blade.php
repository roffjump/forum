@extends('dashboard::layout.master')

@section('page-level-assets')
<link rel="stylesheet" type="text/css" href="/external/jqwidgets/styles/jqx.base.css">
<link rel="stylesheet" type="text/css" href="/external/jqwidgets/styles/jqx.bootstrap.css">
<link href="/assets/apps/css/todo.min.css" rel="stylesheet" type="text/css" />
@stop

@section('page-level-plugins')
<script type="text/javascript" src="/external/jqwidgets/jqxcore.js"></script>
<script type="text/javascript" src="/external/jqwidgets/jqxdata.js"></script>
<script type="text/javascript" src="/external/jqwidgets/jqxbuttons.js"></script>
<script type="text/javascript" src="/external/jqwidgets/jqxscrollbar.js"></script>
<script type="text/javascript" src="/external/jqwidgets/jqxlistbox.js"></script>
<script type="text/javascript" src="/external/jqwidgets/jqxdropdownlist.js"></script>
<script type="text/javascript" src="/external/jqwidgets/jqxcheckbox.js"></script>
<script type="text/javascript" src="/external/jqwidgets/jqxpanel.js"></script>
<script type="text/javascript" src="/external/jqwidgets/jqxexpander.js"></script>
<script type="text/javascript" src="/external/jqwidgets/jqxmenu.js"></script>
<script type="text/javascript" src="/external/jqwidgets/jqxinput.js"></script>
<script type="text/javascript" src="/external/jqwidgets/jqxgrid.js"></script>
<script type="text/javascript" src="/external/jqwidgets/jqxtabs.js"></script>
<script type="text/javascript" src="/external/jqwidgets/jqxcalendar.js"></script>
<script type="text/javascript" src="/external/jqwidgets/jqxdatetimeinput.js"></script>
<script type="text/javascript" src="/external/jqwidgets/jqxsplitter.js"></script>
<script type="text/javascript" src="/external/jqwidgets/jqxtooltip.js"></script>
<script type="text/javascript" src="/external/jqwidgets/jqxgrid.edit.js"></script>
<script type="text/javascript" src="/external/jqwidgets/jqxgrid.selection.js"></script>
<script type="text/javascript" src="/external/jqwidgets/jqxgrid.filter.js"></script>
<script type="text/javascript" src="/external/jqwidgets/jqxgrid.columnsresize.js"></script>
<script type="text/javascript" src="/external/jqwidgets/jqxgrid.columnsreorder.js"></script>
<script type="text/javascript" src="/external/jqwidgets/jqxgrid.sort.js"></script>
<script type="text/javascript" src="/external/jqwidgets/jqxgrid.grouping.js"></script>
<script type="text/javascript" src="/external/jqwidgets/jqxgrid.aggregates.js"></script>
<script type="text/javascript" src="/external/jqwidgets/jqxcombobox.js"></script>
<script type="text/javascript" src="/external/jqwidgets/jqxnumberinput.js"></script>
<script type="text/javascript" src="/external/jqwidgets/jqxdata.export.js"></script>
<script type="text/javascript" src="/external/jqwidgets/jqxgrid.export.js"></script>
<script type="text/javascript" src="/external/jqwidgets/globalization/globalize.js"></script>

<script type="text/javascript" src="/external/jqwidgets/jqx-all.common.js"></script>
@stop

@section('page-title')
Forum
@stop

@section('page-breadcrumb')
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="javascript:;">Forum</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="javascript:;">Topics</a>
    </li>
</ul>

@stop


@section('page-content-inner')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-social-dribbble font-green"></i>
                    <span class="caption-subject font-green bold uppercase">Topics</span>
                </div>
                <div class="actions">
                    <a href="javascript:add_topic();" class="btn btn-circle btn-default" ><i class="fa fa-plus"></i> Add </a>
                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" onclick="adapt(this)" href="javascript:;" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div id="jqx-grid-standart" class="jqx-grid-standart {{-- jqx-hideborder --}} jqx-hidescrollbars" ></div>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>
<div id="jqx-menu-main" class="jqx-menu-standart" style="display: none;">
    <ul>
        <li>
            <i class="fa fa-reorder"></i> Menu
        </li>
        <li onclick="refresh()">
            <i class="fa fa-refresh"></i> Refresh
        </li>
        <li><i class="fa fa-bolt"></i> Features
            <ul >
                <li>
                    Show / Hide
                    <ul>
                        <li onclick="column_toggle(this)" data-action='hidecolumn' data-datafield="title">Title</li>
                        <li onclick="column_toggle(this)" data-action='hidecolumn' data-datafield="created_at">Created at</li>
                        <li onclick="column_toggle(this)" data-action='hidecolumn' data-datafield="last_answer">Last answer</li>
                        <li onclick="column_toggle(this)" data-action='hidecolumn' data-datafield="author">Author</li>
                        <li onclick="column_toggle(this)" data-action='hidecolumn' data-datafield="count_answers">Answers</li>
                        <li onclick="column_toggle(this)" data-action='hidecolumn' data-datafield="place">Place</li>
                    </ul>
                </li>
                <li>
                    Collapse / Expand
                    <ul>
                        <li onclick="group_toggle(this)" data-status="" data-action="expandallgroups" > Expand</li>
                        <li onclick="group_toggle(this)" data-status="" data-action="collapseallgroups" > Collapse</li>
                    </ul>
                </li>
                <li>
                    Filter
                    <ul>
                        <li onclick="filter_toggle(this)" data-showfilterrow="false" data-filtermode="default" > Default</li>
                        <li onclick="filter_toggle(this)" data-showfilterrow="true" data-filtermode="default" > Filter row</li>
                        <li onclick="filter_toggle(this)" data-showfilterrow="false" data-filtermode="excel" > Excel</li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</div>
<div class="modal fade bs-modal-lg" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Modal Title</h4>
            </div>
            <div class="modal-body"> Modal body goes here </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div id="todo-task-modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content scroller" style="height: 100%;" data-always-visible="1" data-rail-visible="0">
            <div class="modal-header">

            </div>
            <div class="modal-body todo-task-modal-body">
                
            </div>
            
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
@stop

@section('page-level-script')
<script type="text/javascript">


var window_height = $(window).height();
var DEFAULT_HEIGHT = window_height - 350;

var jqx_grid_init = function(elem) {

    jqx_grid_focus=elem;
    theme = "bootstrap";
    // IE mode
    var elem=elem;
    var form_data = {}, expand = {};
    var url = '/forum/topic/all';

    var datafields = [
        { name:'tid', type:'string' },
        { name:'title', type:'string' },
        { name:'message', type:'string' },
        { name:'created_at', type:'date' },
        { name:'last_answer', type:'date' },
        { name:'author', type:'string' },
        { name:'count_answers', type:'number' },
        { name:'place', type:'string' },
    ];

    var renderer = function (row, columnfield, value, defaulthtml, columnproperties, data) {
        return '<div class="text-center" style="padding:2px;"><input type="button" onClick="delete_row('+data.uid+')" class="btn btn-danger btn-xs" value="Delete"/></div>'
    }

    var columns = [
        { text:'Title',datafield:'title', width: '60%' },
        { text:'Created at',datafield:'created_at', width: col_md_2, cellsalign:'center', filtertype: 'range', cellsformat: 'dd-MM-yyyy',filterable:false, },
        { text:'Last answer',datafield:'last_answer', width: col_md_2, cellsalign:'center', filtertype: 'range', cellsformat: 'dd-MM-yyyy',filterable:false, },
        { text:'Author',datafield:'author', width: '20%',filterable:false },
        { text:'Answers',datafield:'count_answers', cellsalign:'center',filterable:false },
        { text:'Place',datafield:'place', cellsalign:'center',filterable:false },
        { text: '', datafield: 'detail', columntype: 'button',filterable:false, width: col_md_1, cellsrenderer: function () {
                 return "Details";
             }, buttonclick: function (rowid) {
                show_topic($(elem).jqxGrid('getrowdata', rowid).tid);
             }
         },
    ];

    var columngroups = [
    ];

    var gridSource =
    {
        type: "GET",
        dataType: 'json',
        url: url,
        datafields: datafields,
    };


    var jqxGridInit = function() {
        console.log(elem);
        $( elem ).jqxGrid({
            theme: theme,
            width: '100%',
            height: DEFAULT_HEIGHT,
            selectionmode:'multiplecellsadvanced',
            showfilterrow: true,
            groupable: true,
            sortable: true,
            filterable: true,
            columnsresize: true,
            columnsreorder: true,
            source: new $.jqx.dataAdapter(gridSource),
            ready: ready,
            columns: columns,
        });
    };

    $( elem ).on('cellclick', function (event) {
        jqx_grid_focus = elem;
        if (event.args.rightclick) {
            $( elem ).jqxGrid('clearselection');
            $( elem ).jqxGrid('selectcell', event.args.rowindex, event.args.datafield);
            selected_cell = $( elem ).jqxGrid('getselectedcell');
            open_menu(menu_main, event.args.originalEvent.clientX, event.args.originalEvent.clientY );
            return false;
        }else{
            menu_main.jqxMenu('close');
        }
    });
 
    $( elem ).on("bindingcomplete", function (event) {
        console.info('jqx_grid_init: bindingcomplete');
        $( elem ).jqxGrid('sortby', 'created_at', 'desc');
    });    
 
    $( elem ).bind('contextmenu', function (event) {
        jqx_grid_focus = elem;
        var rightClick = isRightClick(event) || $.jqx.mobile.isTouchDevice();
        if (rightClick) {
            open_menu(menu_main, event.clientX, event.clientY );
            return false;
        }else{
            menu_main.jqxMenu('close');
        }
    });

    var ready = function() {
        console.info('jqx_grid_init: ready');
    };

    return {

        //main function to initiate the theme
        init: function(data) {
            console.log('jqx_grid_init: init');
            gridSource.data=data;
            jqxGridInit();
        },
        getColumnSum: function(data) {
            return columns_sum;
        },
        getExpand: function(data) {
            return expand;
        },
    }
};

var refresh = $.debounce(1, function( sort ){
    $( jqx_grid_focus ).jqxGrid('updatebounddata', 'cells');
});

var add_topic = $.debounce( 100, function( data ){
    console.info('add_topic');
    $('#modal > .modal-dialog > .modal-content').load('/forum/topic/create', data, function(){
        $('#modal').modal("show");
    });
});

var show_topic = $.debounce( 100, function( id ){
    console.info('show_topic');
    $('#todo-task-modal .modal-content').load('/forum/topic/show/'+id, function(){
        $('#todo-task-modal').modal("show");
    });
});
$('#todo-task-modal').on('hidden.bs.modal', function () {
    refresh();
});
$(document).ready(function() {

    jqx_grid_init('#jqx-grid-standart').init();
    menu_main = $("#jqx-menu-main").jqxMenu({ theme:theme, width: '170px', autoOpenPopup: false, mode: 'popup'});
});

</script>
@stop