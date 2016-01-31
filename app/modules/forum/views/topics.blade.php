@extends('dashboard::layout.master')

@section('page-level-assets')
<link rel="stylesheet" type="text/css" href="/external/jqwidgets/styles/jqx.base.css">
<link rel="stylesheet" type="text/css" href="/external/jqwidgets/styles/jqx.bootstrap.css">

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
                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                        <i class="icon-cloud-upload"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                        <i class="icon-wrench"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                        <i class="icon-trash"></i>
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <div id="jqx-grid-standart" class="jqx-grid-standart {{-- jqx-hideborder --}} jqx-hidescrollbars" ></div>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>
@stop

@section('page-level-script')
<script type="text/javascript">


var window_height = $(window).height();
var DEFAULT_HEIGHT = window_height - 150;

var jqx_grid_init = function(elem) {

    jqx_grid_focus=elem;
    theme = "bootstrap";
    // IE mode
    var elem=elem;
    var form_data = {}, expand = {};
    var url = '/forum/rest/api/topic/all';

    var datafields = [

    ];

    var renderer = function (row, columnfield, value, defaulthtml, columnproperties, data) {
        return '<div class="text-center" style="padding:2px;"><input type="button" onClick="delete_row('+data.uid+')" class="btn btn-danger btn-xs" value="Delete"/></div>'
    }

    var columns = [
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
            // showeverpresentrow: true,
            // everpresentrowposition: "top",
            // everpresentrowactionsmode: "columns",
            // everpresentrowactions: "add reset",
            // editable: true,
            // selectionmode: 'singlecell',
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

$(document).ready(function() {

    jqx_grid_init('#jqx-grid-standart').init();
});

</script>
@stop