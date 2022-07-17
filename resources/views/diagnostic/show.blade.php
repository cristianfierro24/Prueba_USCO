@extends('layouts.app')

@section('template_title')
    {{ $diagnostic->name ?? 'Show Diagnostic' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Diagnostic</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('diagnostics.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $diagnostic->description }}
                        </div>
                        <div class="form-group">
                            <strong>Quotations Id:</strong>
                            {{ $diagnostic->quotations_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
