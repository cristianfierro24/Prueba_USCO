<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $office->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('address') }}
            {{ Form::text('address', $office->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Address']) }}
            {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('municipalities_id') }}
            {{ Form::text('municipalities_id', $office->municipalities_id, ['class' => 'form-control' . ($errors->has('municipalities_id') ? ' is-invalid' : ''), 'placeholder' => 'Municipalities Id']) }}
            {!! $errors->first('municipalities_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('departaments_id') }}
            {{ Form::text('departaments_id', $office->departaments_id, ['class' => 'form-control' . ($errors->has('departaments_id') ? ' is-invalid' : ''), 'placeholder' => 'Departaments Id']) }}
            {!! $errors->first('departaments_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>