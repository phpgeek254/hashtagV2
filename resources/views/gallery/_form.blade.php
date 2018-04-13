<div class="row">
    <div class="input-field col s12 ">
        {!! Form::label('name', 'Gallery Name') !!}
        {!! Form::text('gallery_name', null, ['class'=>'form-control']) !!}
        @if($errors)
            <span class="help-block">{{ $errors->first('gallery_name') }}</span>
        @endif

    </div>
</div>

