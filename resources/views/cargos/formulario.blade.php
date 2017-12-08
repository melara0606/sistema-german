<div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
    <label for="cargo" class="col-md-4 control-label">Nombre de cargo</label>

    <div class="col-md-6">
        {{ Form::text('cargo', null,['class' => 'form-control']) }}

        @if ($errors->has('cargo'))
            <span class="help-block">
                <strong>{{ $errors->first('cargo') }}</strong>
            </span>
         @endif
    </div>
</div>