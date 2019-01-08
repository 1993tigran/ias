@extends('master.master-template')
@section('title')
 Edit News Article
@endsection

@section('content')
 {!! BootForm::open(['store' => 'backend_put_class_edit' , 'update' => 'backend_put_class_edit', 'model' => $model ]) !!}
 <article class="">
  <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-collapsed="false" data-widget-sortable="false">

   <header>
    <h2>Add class</h2>
   </header>
   {{--Header End--}}

   {{--Form Content--}}
   @include('classes.partial')
   {!! Form::hidden('id') !!}
   {{--Form End--}}

   {{--Footer--}}
   <div class="panel-footer">
    {!! BootForm::submit('Save Class', ['class' => 'btn btn-primary center-block']) !!}
   </div>
   {{--Footer End--}}
  </div>
 </article>
 {!! BootForm::close() !!}
@endsection