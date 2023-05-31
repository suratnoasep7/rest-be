@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Satuan</h2>
            </div>
            <div class="pull-right">
                
                <a class="btn btn-success" href="{{ route('satuan.create') }}"> Create New Satuan</a>
                
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
	    @foreach ($satuan as $satuans)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $satuans->name }}</td>
	        <td>
                <form action="{{ route('satuan.destroy',$satuans->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('satuan.show',$satuans->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('satuan.edit',$satuans->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    
                    <button type="submit" class="btn btn-danger">Delete</button>
                    
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $satuan->links() !!}



@endsection