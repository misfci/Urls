

    <div class="form-group{{ $errors->has('app_url') ? ' has-error' : '' }}">
        <label for="app_url" class="col-md-4 control-label">App Url</label>

        <div class="col-md-6">
            {!! Form::text("app_url" , null , ['class' => 'form-control']) !!}

            @if ($errors->has('app_url'))
                <span class="help-block">
                    <strong>{{ $errors->first('app_url') }}</strong>
                </span>
            @endif
        </div>
    </div>


    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-user"></i> Save
            </button>
        </div>
    </div>
