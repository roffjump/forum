// DEFAULT ATTRIBUTES
var col_md_1=80,col_md_2=100,col_md_3=150,col_md_4=230,col_md_5=350,col_md_6=390,col_md_7=200,col_md_8=230;
var theme = 'bootstrap';


var jqx_grid_focus, selected_cell;
var group_toggle = $.debounce( 200, function( elem  ){
    console.log( "group_toggle: " +  jqx_grid_focus);
    var datafield = $(elem).attr('data-datafield');
    var action = $(elem).attr('data-action');

    $(elem).attr({ 'data-status' : action });

    $(jqx_grid_focus).jqxGrid(action);
});

var filter_toggle = $.debounce( 200, function( elem  ){
    var datafield = $(elem).attr('data-datafield');
    var action = $(elem).attr('data-action');
    $.each(elem.attributes, function() {
        if(this.specified) {
            if (this.name.indexOf("data") >= 0){
                var option = this.name.split('-')[1];
                var value = this.value;
                if(value=='true'){
                    value=true;
                }
                if(value=='false'){
                    value=false;
                }   
                var obj = {};
                obj[option]=value;
                $(jqx_grid_focus).jqxGrid(obj);
            }
        }
    });
    $(jqx_grid_focus).jqxGrid('refresh');
});    

var column_toggle = $.debounce( 200, function( elem  ){
    var datafield = $(elem).attr('data-datafield');
    var action = $(elem).attr('data-action');

    if( action == 'hidecolumn' ){
        $(elem).attr({'data-action':'showcolumn'});
    }
    if( action == 'showcolumn' ){
        $(elem).attr({'data-action':'hidecolumn'});
    }
    $( jqx_grid_focus ).jqxGrid(action, datafield);
});


var open_menu = $.debounce( 100, function( menu, clientX, clientY  ){
    console.warn('open_menu');

    var scrollTop = $(window).scrollTop();
    var scrollLeft = $(window).scrollLeft();
    var top = parseInt(clientY) + 5 + scrollTop;
    var left = parseInt(clientX) + 5 + scrollLeft;

    if(  (clientX+menu.width()*3)> $(window).width() ){
        left = parseInt(clientX) + ($(window).width() - (clientX+menu.width()*3)) + scrollLeft;
    }

    if(  (clientY+menu.height())> $(window).height() ){
        top = parseInt(clientY) - (menu.height()) + scrollTop;
    }

    menu.jqxMenu('open', left, top);

});