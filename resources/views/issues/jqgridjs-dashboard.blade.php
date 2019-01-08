<script src="{{URL::asset('SmartAdmin_HTML_Version/js/plugin/jqgrid/jquery.jqGrid.min.js')}}"></script>
<script src="{{URL::asset('SmartAdmin_HTML_Version/js/plugin/jqgrid/grid.locale-en.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        pageSetUp();

        jQuery("#jqgrid").jqGrid({
            url: 'issues-list-json',
            datatype: "json",
            height : 'auto',
            jsonReader: {
                repeatitems: false,
                root: function (obj) {

                    return obj.data;
                },
                total: function(obj) {
                    return obj.last_page;
                },
                records: function(obj) {
                    return obj.total;
                }
            },
            colNames : ['Scholier', 'Type ' ,'Datum', 'Actie’s'],
            colModel : [{
                name : 'email',
                index : 'email',
                width : 120,
                fixed : true
            },{
                name : 'type',
                index : 'type'
            },{
                name : 'date',
                index : 'created_at',
                fixed: true,
                width: 120,
                align: 'center',
                formatter: function (value, options, rowData) {
                    var s = rowData.created_at;
                    var a = s.split(/[^0-9]/);
                    var d= new Date (a[0],a[1]-1,a[2],a[3],a[4],a[5] );
                    return translateDate(d,'d-M-y h:m');
                }
            },{
                name : 'act',
                index : 'act',
                sortable: false,
                align: 'center',
                width: 100,
                fixed: true,
                formatter: function (value, options, rowData) {

                    var routeCancel = '{{URL::route('backend_get_issue_delete', '???')}}'.replace('???', rowData.id);
                    var routeChatHistory= '{{URL::route('backend_get_chat_history_dashboard', '???')}}'.replace('???', rowData.id);
                    var routeForQuestions = '{{URL::route('backend_get_issue_questions', '???')}}'.replace('???', rowData.id);
                    var button = "<a class='gridbutton btn btn-xs btn-warning' data-id='"+rowData.id+"' href='"+routeForQuestions+"'><span class=\"glyphicon glyphicon-list\" aria-hidden=\"true\"></span></a>";
                    button += "&nbsp";
                    button += "<a class='gridbutton btn btn-xs btn-info' data-id='"+rowData.id+"' href='"+routeChatHistory+"'><span class=\"glyphicon glyphicon-time\" aria-hidden=\"true\"></span></a>";
                    button += "&nbsp";
                    button += "<a class='gridbutton btn btn-xs btn-danger' data-id='"+rowData.id+"' href='"+routeCancel+"'><span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span></a>";
                    return button;
                }
            }],
            rowNum : 10,
            rowList : [10, 20, 30],
            pager : '#pjqgrid',
            loadonce: false,
            sortname : 'id',
            toolbarfilter : true,
            viewrecords : true,
            sortorder : "asc",
            editurl : "dummy.html",
            caption : "Problemen",
            multiselect : false,
            autowidth : true,
            beforeSelectRow: function(rowid, e) {
                return false;
            }

        });

        function translateDate(date, format) {
            console.log(date);
            if (format == 'h:m') {
                var hours = date.getHours();
                var minutes = date.getMinutes();
                if (hours < 10) {
                    hours = "0" + hours;
                }
                if (minutes < 10) {
                    minutes = "0" + minutes;
                }
                return hours + ":" + minutes;
            } else if (format == 'd-M-y h:m') {
                var year = date.getFullYear();
                var month = date.getMonth() + 1;
                var day = date.getDate();
                var hours = date.getHours();
                var minutes = date.getMinutes();

                if (month < 10) {
                    month = "0" + month;
                }
                if (day < 10) {
                    day = "0" + day;
                }
                if (hours < 10) {
                    hours = "0" + hours;
                }
                if (minutes < 10) {
                    minutes = "0" + minutes;
                }
                return year + "/" + month + "/" + day + "<br/>" + hours + ":" + minutes;
            }
            return '';
        }

// remove classes
        $(".ui-jqgrid").removeClass("ui-widget ui-widget-content");
        $(".ui-jqgrid-view").children().removeClass("ui-widget-header ui-state-default");
        $(".ui-jqgrid-labels, .ui-search-toolbar").children().removeClass("ui-state-default ui-th-column ui-th-ltr");
        $(".ui-jqgrid-pager").removeClass("ui-state-default");
        $(".ui-jqgrid").removeClass("ui-widget-content");

// add classes
        $(".ui-jqgrid-htable").addClass("table table-bordered table-hover");
        $(".ui-jqgrid-btable").addClass("table table-bordered table-striped");

        $(".ui-pg-div").removeClass().addClass("btn btn-sm btn-primary");
        $(".ui-icon.ui-icon-plus").removeClass().addClass("fa fa-plus");
        $(".ui-icon.ui-icon-pencil").removeClass().addClass("fa fa-pencil");
        $(".ui-icon.ui-icon-trash").removeClass().addClass("fa fa-trash-o");
        $(".ui-icon.ui-icon-search").removeClass().addClass("fa fa-search");
        $(".ui-icon.ui-icon-refresh").removeClass().addClass("fa fa-refresh");
        $(".ui-icon.ui-icon-disk").removeClass().addClass("fa fa-save").parent(".btn-primary").removeClass("btn-primary").addClass("btn-success");
        $(".ui-icon.ui-icon-cancel").removeClass().addClass("fa fa-times").parent(".btn-primary").removeClass("btn-primary").addClass("btn-danger");

        $(".ui-icon.ui-icon-seek-prev").wrap("<div class='btn btn-sm btn-default'></div>");
        $(".ui-icon.ui-icon-seek-prev").removeClass().addClass("fa fa-backward");

        $(".ui-icon.ui-icon-seek-first").wrap("<div class='btn btn-sm btn-default'></div>");
        $(".ui-icon.ui-icon-seek-first").removeClass().addClass("fa fa-fast-backward");

        $(".ui-icon.ui-icon-seek-next").wrap("<div class='btn btn-sm btn-default'></div>");
        $(".ui-icon.ui-icon-seek-next").removeClass().addClass("fa fa-forward");

        $(".ui-icon.ui-icon-seek-end").wrap("<div class='btn btn-sm btn-default'></div>");
        $(".ui-icon.ui-icon-seek-end").removeClass().addClass("fa fa-fast-forward");

    })

    $(window).on('resize.jqGrid', function() {
        $("#jqgrid").jqGrid('setGridWidth', $("#content").width());
    })

</script>