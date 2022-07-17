@extends('layouts.app')

@section('template_title')
    Office
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Office') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('offices.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Name</th>
										<th>Address</th>
										<th>Municipalities Id</th>
										<th>Departaments Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($offices as $office)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $office->name }}</td>
											<td>{{ $office->address }}</td>
											<td>{{ $office->municipalities_id }}</td>
											<td>{{ $office->departaments_id }}</td>

                                            <td>
                                                <form action="{{ route('offices.destroy',$office->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('offices.show',$office->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('offices.edit',$office->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $offices->links() !!}
            </div>
        </div>
    </div>
@endsection
