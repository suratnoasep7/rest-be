@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ticket</h2>
            </div>
            <div class="pull-right">
                
                
                
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
            <th>Kode Ticket</th>
            <th>Name Concert</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($ticket as $tickets)
	    <tr>
	        <td>{{ ++$i }}</td>
            <td>{{ $tickets->kd_tickets }}</td>
	        <td>{{ $tickets->concert->name }}</td>
            <td>{{ $tickets->name }}</td>
            <td>{{ $tickets->email }}</td>
            <td>
            @if ($tickets->status)
                Yes
            @else
                No
            @endif
            </td>
	        <td>
                <form action="{{ route('ticket.destroy',$tickets->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('ticket.show',$tickets->id) }}">Show</a>
                    
                    <a class="btn btn-primary" href="{{ route('ticket.edit',$tickets->id) }}">Edit</a>
                
                    @csrf
                    @method('DELETE')
                    
                    <button type="submit" class="btn btn-danger">Delete</button>
                    
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $ticket->links() !!}


@endsection