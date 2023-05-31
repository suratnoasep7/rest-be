@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Check In</h2>
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

    

    <form action="{{ route('check.index') }}" method="GET">
    	@csrf


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Kode Ticket:</strong>
		            <input type="text" name="kd_tickets" class="form-control" placeholder="Kode Ticket" value="{{$kdTickets}}">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


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
                <form action="{{ route('check.update',$tickets->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <button type="submit" class="btn btn-primary">Update Status</button>
                    
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    


@endsection