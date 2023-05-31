@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Concert</h2>
            </div>
            <div class="pull-right">
                
                <a class="btn btn-success" href="{{ route('concert.create') }}"> Create New Concert</a>
                
            </div>
        </div>
    </div>

    


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($concert as $concerts)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $concerts->name }}</td>
	        <td>
                <form action="{{ route('concert.destroy',$concerts->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('concert.show',$concerts->id) }}">Show</a>
                    
                    <a class="btn btn-primary" href="{{ route('concert.edit',$concerts->id) }}">Edit</a>
                
                    @csrf
                    @method('DELETE')
                    
                    <button type="submit" class="btn btn-danger">Delete</button>
                    
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $concert->links() !!}


@endsection