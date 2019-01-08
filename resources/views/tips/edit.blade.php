@extends('master.master-template')
@section('title')
    Tip aanpassen
@endsection

@section('content')
    {!! BootForm::open(['store' => 'backend_put_edit_tips' , 'update' => 'backend_put_edit_tips', 'model' => $model]) !!}
    <article class="">
        <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
            <header>
                <h2>Tip aanpassen</h2>
            </header>

            {{--Form Content--}}
            @include('tips.partial')
            {{--Form End--}}

            {!! Form::hidden('id') !!}

            <div class="panel-footer">
                {!! BootForm::submit('Opslaan', ['class' => 'btn btn-primary center-block']) !!}
            </div>
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
                        content: {
                            required: true,
                            minlength: 2
                        }
                    }
                }
        );
    </script>
@endsection