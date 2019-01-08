@extends('master.master-template')
@section('title')
    Alle scholieren
@endsection

@section('content')

    <article class="">
        <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
            <section id="widget-grid" class="">
                <div class="row col-md-12">
                    {!! BootForm::text('search' , 'Zoeken')!!}
                </div>
                <div class="row">
                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <table id="jqgrid"></table>
                        <div id="pjqgrid"></div>
                    </article>
                </div>
            </section>
        </div>
    </article>



    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            {!! BootForm::open(['route' => 'backend_post_send_message']) !!}
                    <!-- Modal content-->
            <div class="modal-content modal-xl">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="row">
                            <div class="col col-md-5">
                                <label for="pushy_message">Push bericht naar de student: </label>
                            </div>
                        </div>
                        {!! Form::hidden('studentId') !!}
                        <div class="row">
                            <div class="col-md-5 text"><textarea name="message" id="message" cols="75" rows="10"></textarea></div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    {!! BootForm::submit('Verzenden') !!}
                </div>
            </div>
            {!! BootForm::close() !!}
        </div>
    </div>

@endsection

@section('additional-js')
    @include('students.jqgridjs')
@endsection