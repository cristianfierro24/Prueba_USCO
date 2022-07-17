@extends('layouts.app')

@section('template_title')
    {{ $municipality->name ?? 'Show Municipality' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Municipality</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('municipalities.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $municipality->name }}
                        </div>
                        <div class="form-group">
                            <strong>Departaments Id:</strong>
                            {{ $municipality->departaments_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
