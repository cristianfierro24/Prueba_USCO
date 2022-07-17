@extends('layouts.app')

@section('template_title')
    {{ $quotation->name ?? 'Show Quotation' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Quotation</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('quotations.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Date Init Quotations:</strong>
                            {{ $quotation->date_init_quotations }}
                        </div>
                        <div class="form-group">
                            <strong>Date End Quotations:</strong>
                            {{ $quotation->date_end_quotations }}
                        </div>
                        <div class="form-group">
                            <strong>Justification:</strong>
                            {{ $quotation->justification }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $quotation->status }}
                        </div>
                        <div class="form-group">
                            <strong>Persons Id:</strong>
                            {{ $quotation->persons_id }}
                        </div>
                        <div class="form-group">
                            <strong>Offices Id:</strong>
                            {{ $quotation->offices_id }}
                        </div>
                        <div class="form-group">
                            <strong>Doctors Id:</strong>
                            {{ $quotation->doctors_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
