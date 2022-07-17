@extends('layouts.app')

@section('template_title')
    {{ $documentType->name ?? 'Show Document Type' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Document Type</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('document-types.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $documentType->name }}
                        </div>
                        <div class="form-group">
                            <strong>Code:</strong>
                            {{ $documentType->code }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
