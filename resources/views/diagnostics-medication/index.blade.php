@extends('layouts.app')

@section('template_title')
    Diagnostics Medication
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Diagnostics Medication') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('diagnostics-medications.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Quantity</th>
										<th>Medications Id</th>
										<th>Diagnostics Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($diagnosticsMedications as $diagnosticsMedication)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $diagnosticsMedication->quantity }}</td>
											<td>{{ $diagnosticsMedication->medications_id }}</td>
											<td>{{ $diagnosticsMedication->diagnostics_id }}</td>

                                            <td>
                                                <form action="{{ route('diagnostics-medications.destroy',$diagnosticsMedication->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('diagnostics-medications.show',$diagnosticsMedication->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('diagnostics-medications.edit',$diagnosticsMedication->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $diagnosticsMedications->links() !!}
            </div>
        </div>
    </div>
@endsection
