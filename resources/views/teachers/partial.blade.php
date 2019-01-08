<div class="widget-body">
    <div class="row">
        <div class="col-md-12">
            {!! BootForm::text('name' , 'Naam Docent') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            {!! BootForm::text('email' , 'Gebruikersnaam docent',null,['class' => "col-md-6"]) !!}
        </div>

        <div class="col-md-6">
            {!! BootForm::password('password' , 'Wachtwoord docent',['class' => "col-md-6"]) !!}
        </div>
    </div>
    <div class="row" style="margin-top: 15px;">
        <div class="col-md-12">
            {!! BootForm::file('image' , 'Foto docent') !!}
        </div>
    </div>
    <div class="row" style="margin-top: 15px;">
        <div class="col-md-12">
            {!! BootForm::select('class_id', 'Class', $classes) !!}
        </div>
    </div>
    {{--<div class="row" style="margin-top: 15px;">--}}
        {{--<div class="col-md-12">--}}
            {{--{!! BootForm::selact('image' , 'Foto docent') !!}--}}
        {{--</div>--}}
    {{--</div>--}}

    </div>
</div>