<div class="widget-body">
    <div class="row">
        <div class="col-md-12">
            {!! BootForm::text('title' , 'Titel') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! BootForm::textarea('content' , 'Bericht',isset($model) ? $model->content : '',['id' => 'news-content','style'=>"outline: 0px; min-height: 380px;"]) !!}
        </div>
    </div>
    <div class="row" style="margin-top: 15px;">
        <div class="col-md-12">
            {!! BootForm::file('image' , 'Afbeelding') !!}
        </div>
    </div>

</div>
</div>