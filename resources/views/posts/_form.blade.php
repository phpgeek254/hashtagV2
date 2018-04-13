<div class="row">
    <div class="input-field col s12 ">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
        @if($errors)
            <span class="help-block">{{ $errors->first('title') }}</span>
        @endif
    </div>
</div>

<div class="row">
    <div class="input-field col s12 ">
        {!! Form::label('post_content', 'Post Content') !!}
        {!! Form::textarea('post_content', null, ['class'=>'materialize-textarea']) !!}

    @if($errors)
            <span class="help-block">{{ $errors->first('post_content') }}</span>
        @endif
    </div>
</div>
