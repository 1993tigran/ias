@extends('master.master-template')
@section('title')
    Docent toevoegen
@endsection

@section('content')
    {!! BootForm::open(['route' => 'backend_post_register_teacher', 'files' => true]) !!}
    <article class="">
        <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
            {{--Header--}}
                <header>
                    <h2>Docent toevoegen</h2>
                </header>
            {{--Header End--}}

            {{--Form Content--}}
                @include('teachers.partial')
            {{--Form End--}}

            {{--Footer--}}
                <div class="panel-footer">
                    {!! BootForm::submit('Aanmaken', ['class' => 'btn btn-primary center-block']) !!}
                </div>
            {{--Footer End--}}
        </div>
    </article>
    {!! BootForm::close() !!}
@endsection
