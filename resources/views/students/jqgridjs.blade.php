<script src="{{URL::asset('SmartAdmin_HTML_Version/js/plugin/jqgrid/jquery.jqGrid.min.js')}}"></script>
<script src="{{URL::asset('SmartAdmin_HTML_Version/js/plugin/jqgrid/grid.locale-en.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        pageSetUp();


        var $jqGrid = jQuery("#jqgrid");
        var myReload = function() {
            $jqGrid.trigger('reloadGrid');
        };

        function reloadGrid ()
        {
            $jqGrid.trigger('reloadGrid');
        }

        $('input[name=search]').on('input',function(){
           reloadGrid();
        });
//            $.ajax({
//                method: "GET",
//                url: 'students-search',
//                dataType: 'json',
//                data: {
//                    q:
//                }
//            }).success(function (data)
//            {
//                $jqGrid.jqGrid('clearGridData');
//                $jqGrid.addJSONData(data);
//            })
//        });

        jQuery("#jqgrid").jqGrid({
            url: 'students-list-json',
            datatype: "json",
            height : 'auto',
            postData : {
                q: function () { return $('input[name=search]').val(); }
            },
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
            serializeGridData: function (data) {
                return $.param(data) + '&' + $('input[name=search]').serialize();
            },
            colNames : ['Gebruikersnaam', 'Acties'],
            colModel : [{
                name : 'email',
                index : 'email'
            },{
                name : 'act',
                index : 'act',
                sortable: false,
                align: 'center',
                width: 80,
                fixed: true,
                formatter: function (value, options, rowData) {
                    console.log(rowData);
                    var routeForDelete = '{{URL::route('backend_get_delete_student', '???')}}'.replace('???', rowData.id);
                    var button = "<a class='gridbutton btn btn-xs btn-warning sendPushy' data-id='"+rowData.id+"' data-toggle=\"modal\" href='#'><span class=\"glyphicon glyphicon-phone\" aria-hidden=\"true\"></span></a>";
                    button += "&nbsp";
                    button += "<a class='gridbutton btn btn-xs btn-danger' onclick=\"return confirm('Weet u zeker dat u deze scholier wil verwijderen?');\"  data-id='"+rowData.id+"' href='"+routeForDelete+"'><span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span></a>";
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
            caption : "Alle scholieren",
            multiselect : false,
            autowidth : true,
            beforeSelectRow: function(rowid, e) {
                return false;
            },
            gridComplete: function() {
                var infoModal = $('#myModal');
                $('.sendPushy').on('click', function () {
                    $("input[name*='studentId']").val($(this).data('id'));
                    infoModal.modal('show');
                });
            }

        });
//        $("#jqgrid").jqGrid('setGridParam',{postData:{q: $('input[name=search]').val()}}).trigger("reloadGrid");

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