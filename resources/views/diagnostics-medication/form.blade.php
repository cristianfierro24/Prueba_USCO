<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('quantity') }}
            {{ Form::text('quantity', $diagnosticsMedication->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => 'Quantity']) }}
            {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('medications_id') }}
            {{ Form::text('medications_id', $diagnosticsMedication->medications_id, ['class' => 'form-control' . ($errors->has('medications_id') ? ' is-invalid' : ''), 'placeholder' => 'Medications Id']) }}
            {!! $errors->first('medications_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('diagnostics_id') }}
            {{ Form::text('diagnostics_id', $diagnosticsMedication->diagnostics_id, ['class' => 'form-control' . ($errors->has('diagnostics_id') ? ' is-invalid' : ''), 'placeholder' => 'Diagnostics Id']) }}
            {!! $errors->first('diagnostics_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>