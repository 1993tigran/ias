@extends('master.master-template')
@section('title')
    Edit Teacher
@endsection

@section('content')
    {!! BootForm::open(['store' => 'backend_put_edit_teacher' , 'update' => 'backend_put_edit_teacher', 'model' => $model, 'files' => true ]) !!}
    <article class="">
        <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
            <header>
                <h2>Edit teacher</h2>
            </header>

            {{--Form Content--}}
            @include('teachers.partial')
            {{--Form End--}}

            {!! Form::hidden('photo') !!}
            {!! Form::hidden('id') !!}

            <div class="panel-footer">
                {!! BootForm::submit('Wijzigen', ['class' => 'btn btn-primary center-block']) !!}
            </div>
        </div>
    </article>
    {!! BootForm::close() !!}
@endsection
