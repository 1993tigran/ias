@extends('master.master-template')
@section('title')
    Instellingen
@endsection

@section('content')
    {!! BootForm::open(['id' => 'contactForm' , 'store' => 'contact-post-form' , 'update' => 'contact-post-form', 'model' => $model]) !!}
    <article class="">
        <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
            {{--Header--}}
            <header>
                {{--<h2>Instellingen</h2>--}}
            </header>
            {{--Header End--}}

            {{--Form Content--}}
            <div class="widget-body">
                <div class="row">
                    <div class="col-md-12">
                        {!! BootForm::textarea('tip_sugg_complaint' , 'Tip, suggestie of klacht',null ) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! BootForm::textarea('advice' , 'Advies', null ) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! BootForm::textarea('data' , 'Gegevens', null ) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! BootForm::textarea('data_name' , 'Gegevens naam', null ) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! BootForm::text('class' , 'Klas', null ) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! BootForm::text('phone' , 'Telefoon', null ) !!}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::hidden('id') !!}

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
        $('#contactForm').validate(
                {
                    ignore: "",
                    rulesrules: {
                        tip_sugg_complaint: {
                            required: true,
                        },
                        advice: {
                            required: true,
                        },
                        data: {
                            required: true,
                        },
                        data_name: {
                            required: true,
                        },
                        class: {
                            required: true,
                        },
                        phone: {
                            required: true,
                            phone: true,
                        }
                    }
                }
        );
    </script>
@endsection
