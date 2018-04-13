<!-- Modal Structure -->
<script>
    $(function(){
       $('.modal').modal();
    });
</script>
<div id="add_story" class="modal modal-fixed-footer">
    {!! Form::open(['route'=>['story.store'], 'files'=>true]) !!}
    {!! Form::hidden('user_id', $user->id) !!}
    <div class="modal-content">
        <h4>Add A New Story</h4>
        <div class="row">
            <div class="file-field input-field">
                <div class="btn">
                    <span>File</span>
                    {!! Form::file('file_path') !!}
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
                <span class="error"> {{ $errors->first('file_path') }}</span>
            </div>

            <div class="col s12 input-field">
                {!! Form::textarea('caption', null, ['class'=>'materialize-textarea']) !!}
                {!! Form::label('caption', 'Add Description') !!}
                <span class="error"> {{ $errors->first('caption') }}</span>
            </div>
            <div class="col s12 input-field">

            </div>
            <div class="col s12 input-field"></div>
        </div>
    </div>
    <div class="modal-footer">
        {!! Form::submit('Save', ['class'=>'btn', 'style'=>'float:left']) !!}
        <a href="#" class="waves-effect waves-green btn modal-action modal-close">Cancel</a>
    </div>
    {!! Form::close() !!}
</div>