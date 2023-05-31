@extends('welcome')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Concert</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('welcome.create') }}"> Create New Ticket</a>
            </div>
        </div>
    </div>

    

    
    @if ($message = Session::get('message'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    @if ($ticket = Session::get('ticket'))
        <div class="alert alert-success">
            <p>Your Kode Ticket {{$ticket->kd_tickets}}</p>
        </div>
    @endif

    


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name Concert</th>
        </tr>
	    @foreach ($concert as $concerts)
	    <tr>
	        <td>{{ ++$i }}</td>
            <td>{{ $concerts->name }}</td>
	    </tr>
	    @endforeach
    </table>


    {!! $concert->links() !!}


@endsection