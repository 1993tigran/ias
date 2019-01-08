@extends('master.master-template')
@section('title')
    Vraag/Antwoord
@endsection

@section('content')

    <article class="">
        <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
            <section id="widget-grid" class="">
                <div class="row">
                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <table id="jqgrid"></table>
                        <div id="pjqgrid"></div>
                    </article>
                </div>
            </section>
        </div>
    </article>

    {!! BootForm::open(['update' => 'backend_get_issues_list_json', 'store' => 'backend_get_issues_list_json' , 'model' => $model]) !!}
    {!! Form::hidden('id') !!}
    {!! BootForm::close() !!}

@endsection

@section('additional-js')
    @include('issues.jqgridjs-questions')
@endsection