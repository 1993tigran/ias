@extends('master.master-template')
@section('title')
    Bericht aanpassen
@endsection

@section('content')
    {!! BootForm::open(['store' => 'backend_put_edit_news' , 'update' => 'backend_put_edit_news', 'model' => $model, 'files' => true ]) !!}
    <article class="">
        <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">
            <header>
                <h2>Bericht aanpassen</h2>
            </header>

            {{--Form Content--}}
            @include('news.partial')
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

@section('additional-js')
    <link href="{{URL::asset('froala_editor_1.2.8/css/froala_editor.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('froala_editor_1.2.8/css/froala_style.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{URL::asset('froala_editor_1.2.8/js/froala_editor.min.js')}}"></script>
    <!--[if lt IE 9]>
    <script src="{{URL::asset('froala_editor_1.2.8/js/froala_editor_ie8.min.js')}}"></script>
    <![endif]-->
    <script src="{{URL::asset('froala_editor_1.2.8/js/plugins/tables.min.js')}}"></script>
    <script src="{{URL::asset('froala_editor_1.2.8/js/plugins/lists.min.js')}}"></script>
    <script src="{{URL::asset('froala_editor_1.2.8/js/plugins/colors.min.js')}}"></script>
    <script src="{{URL::asset('froala_editor_1.2.8/js/plugins/media_manager.min.js')}}"></script>
    <script src="{{URL::asset('froala_editor_1.2.8/js/plugins/font_family.min.js')}}"></script>
    <script src="{{URL::asset('froala_editor_1.2.8/js/plugins/font_size.min.js')}}"></script>
    <script src="{{URL::asset('froala_editor_1.2.8/js/plugins/block_styles.min.js')}}"></script>
    <script src="{{URL::asset('froala_editor_1.2.8/js/plugins/video.min.js')}}"></script>
    <script src="http://cdn.jsdelivr.net/jquery.validation/1.14.0/jquery.validate.min.js"></script>

    <script>
        $(function(){

            var originalText = $('textarea#news-content').val();
            console.log(originalText);
            $textArea = $('#news-content');
            $textArea.editable({
                inlineMode: false,
                height: 400,
                // Colors list.
                colors: [
                    '#15E67F', '#E3DE8C', '#D8A076', '#00AEEF', '#76B6D8', 'REMOVE',
                    '#1C7A90', '#249CB8', '#4ABED9', '#FBD75B', '#FBE571', '#FFFFFF'
                ]
            });
        });
    </script>



@endsection