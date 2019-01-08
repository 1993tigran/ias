@extends('master.master-template')
@section('title')
    Tip toevoegen
@endsection

@section('content')
    {!! BootForm::open(['route' => 'backend_post_create_tips' , 'id' => 'createForm']) !!}
    <article class="">
        <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
            {{--Header--}}
            <header>
                <h2>Tip toevoegen</h2>
            </header>
            {{--Header End--}}

            {{--Form Content--}}
            @include('tips.partial')
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
                    content: {
                        required: true,
                        minlength: 2
                    }
                }
            }
        );
    </script>
@endsection