<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('date_init_quotations') }}
            {{ Form::text('date_init_quotations', $quotation->date_init_quotations, ['class' => 'form-control' . ($errors->has('date_init_quotations') ? ' is-invalid' : ''), 'placeholder' => 'Date Init Quotations']) }}
            {!! $errors->first('date_init_quotations', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('date_end_quotations') }}
            {{ Form::text('date_end_quotations', $quotation->date_end_quotations, ['class' => 'form-control' . ($errors->has('date_end_quotations') ? ' is-invalid' : ''), 'placeholder' => 'Date End Quotations']) }}
            {!! $errors->first('date_end_quotations', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('justification') }}
            {{ Form::text('justification', $quotation->justification, ['class' => 'form-control' . ($errors->has('justification') ? ' is-invalid' : ''), 'placeholder' => 'Justification']) }}
            {!! $errors->first('justification', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::text('status', $quotation->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('persons_id') }}
            {{ Form::text('persons_id', $quotation->persons_id, ['class' => 'form-control' . ($errors->has('persons_id') ? ' is-invalid' : ''), 'placeholder' => 'Persons Id']) }}
            {!! $errors->first('persons_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('offices_id') }}
            {{ Form::text('offices_id', $quotation->offices_id, ['class' => 'form-control' . ($errors->has('offices_id') ? ' is-invalid' : ''), 'placeholder' => 'Offices Id']) }}
            {!! $errors->first('offices_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('doctors_id') }}
            {{ Form::text('doctors_id', $quotation->doctors_id, ['class' => 'form-control' . ($errors->has('doctors_id') ? ' is-invalid' : ''), 'placeholder' => 'Doctors Id']) }}
            {!! $errors->first('doctors_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>