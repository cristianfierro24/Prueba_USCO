@extends('layouts.app')

@section('template_title')
    {{ $diagnosticsMedication->name ?? 'Show Diagnostics Medication' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Diagnostics Medication</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('diagnostics-medications.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Quantity:</strong>
                            {{ $diagnosticsMedication->quantity }}
                        </div>
                        <div class="form-group">
                            <strong>Medications Id:</strong>
                            {{ $diagnosticsMedication->medications_id }}
                        </div>
                        <div class="form-group">
                            <strong>Diagnostics Id:</strong>
                            {{ $diagnosticsMedication->diagnostics_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
