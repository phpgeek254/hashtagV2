<div class="row">
    <div class="input-field col s12 ">
        {!! Form::label('magazine_name', 'Magazine Name') !!}
        {!! Form::text('magazine_name', null, ['class'=>'form-control']) !!}
        @if($errors)
            <span class="help-block">{{ $errors->first('magazine_name') }}</span>
        @endif
    </div>
</div>

