<script>
    $(function () {
        $('.datepicker').pickadate({
            selectMonths: true,
            selectYears: 15,
            format: 'yyyy-mm-dd'
        });

        $('.timepicker').pickatime({
            default: 'now',
            twelvehour: false, // change to 12 hour AM/PM clock from 24 hour
            donetext: 'OK',
            autoclose: false,
            vibrate: true // vibrate the device when dragging clock hand
        });
    });
</script>

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
        {!! Form::label('description', 'Event Description') !!}
        {!! Form::textarea('description', null, ['class'=>'materialize-textarea']) !!}
        @if($errors)
            <span class="help-block">{{ $errors->first('description') }}</span>
        @endif
    </div>
</div>

<div class="row">
    <div class="input-field col s12 ">
        {!! Form::label('venue', 'Event Venue') !!}
        {!! Form::text('venue', null, ['class'=>'form-control']) !!}
        @if($errors)
            <span class="help-block">{{ $errors->first('venue') }}</span>
        @endif
    </div>
</div>

<div class="row">
    <div class="input-field col s12 ">
        {!! Form::label('start_date', 'Start Date') !!}
        {!! Form::text('start_date', null, ['class'=>'datepicker']) !!}
        @if($errors)
            <span class="help-block">{{ $errors->first('start_date') }}</span>
        @endif
    </div>
</div>

<div class="row">
    <div class="input-field col s12 ">
        {!! Form::label('start_time', 'Start Time') !!}
        {!! Form::time('start_time', null, ['class'=>'timepicker']) !!}
        @if($errors)
            <span class="help-block">{{ $errors->first('start_time') }}</span>
        @endif
    </div>
</div>

<div class="row">
    <div class="input-field col s12 ">
        {!! Form::label('end_date', 'End Date') !!}
        {!! Form::text('end_date', null, ['class'=>'datepicker']) !!}
        @if($errors)
            <span class="help-block">{{ $errors->first('end_date') }}</span>
        @endif
    </div>
</div>

<div class="row">
    <div class="input-field col s12 ">
        {!! Form::label('end_time', 'End Time') !!}
        {!! Form::time('end_time', null, ['class'=>'timepicker']) !!}
        @if($errors)
            <span class="help-block">{{ $errors->first('end_time') }}</span>
        @endif
    </div>
</div>


