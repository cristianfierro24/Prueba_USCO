@extends('layouts.app')

@section('template_title')
    Quotation
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Quotation') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('quotations.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Date Init Quotations</th>
										<th>Date End Quotations</th>
										<th>Justification</th>
										<th>Status</th>
										<th>Persons Id</th>
										<th>Offices Id</th>
										<th>Doctors Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($quotations as $quotation)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $quotation->date_init_quotations }}</td>
											<td>{{ $quotation->date_end_quotations }}</td>
											<td>{{ $quotation->justification }}</td>
											<td>{{ $quotation->status }}</td>
											<td>{{ $quotation->persons_id }}</td>
											<td>{{ $quotation->offices_id }}</td>
											<td>{{ $quotation->doctors_id }}</td>

                                            <td>
                                                <form action="{{ route('quotations.destroy',$quotation->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('quotations.show',$quotation->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('quotations.edit',$quotation->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $quotations->links() !!}
            </div>
        </div>
    </div>
@endsection
