@extends('master.master-template')
@section('title')
    Instellingen
@endsection

@section('content')
    {!! BootForm::open(['id' => 'createForm' , 'store' => 'backend_post_settings' , 'update' => 'backend_post_settings', 'model' => $model]) !!}
    <article class="">
        <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
            {{--Header--}}
            <header>
                <h2>Instellingen</h2>
            </header>
            {{--Header End--}}

            {{--Form Content--}}
            <div class="widget-body">
                <div class="row">
                    <div class="col-md-12">
                        {!! BootForm::text('report_red_issue_email' , 'Urgentie 1 Email' , null ,['style' => 'color:red;']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! BootForm::text('report_orange_issue_email' , 'Urgentie 2 Email', null ,['style' => 'color:orange;']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! BootForm::text('report_green_issue_email' , 'Urgentie 3 Email', null ,['style' => 'color:green;']) !!}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::hidden('id', $user_id) !!}

        {{--Form End--}}

        {{--Footer--}}
        <div class="panel-footer">
            {!! BootForm::submit('Opslaan', ['class' => 'btn btn-primary center-block']) !!}
        </div>
        {{--Footer End--}}
        </div>
    </article>
    {!! BootForm::close() !!}
@endsection

@section('additional-js')
    <script src="http://cdn.jsdelivr.net/jquery.validation/1.14.0/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $('#createForm').validate(
                {
                    ignore: "",
                    rules: {
                        report_red_issue_email: {
                            required: true,
                            email: true
                        },
                        report_orange_issue_email: {
                            required: true,
                            email: true
                        },
                        report_green_issue_email: {
                            required: true,
                            email: true
                        }
                    }
                }
        );
    </script>
@endsection
