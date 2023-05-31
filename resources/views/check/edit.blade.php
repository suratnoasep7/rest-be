@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Ticket</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('check.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{$ticket->id}}


    <form action="{{ route('check.update',$ticket->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="row">
            <input type="hidden" name="kd_tickets" class="form-control" placeholder="Kode Ticket" value="{{ $ticket->kd_tickets }}">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
                    <strong>Concert:</strong>
                    <select name="concert_id" class="form-control" id="product">
                        <option>-- Choose Concert --</option>
                        @foreach($concert as $concerts)
                            <option value="{{ $concerts->id }}" {{ ($concerts->id == $ticket->concert_id) ? 'selected' : '' }}>
                                {{ $concerts->name }}
                            </option>
                        @endforeach
                    </select>
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" class="form-control" placeholder="Name" id="name" value="{{ $ticket->name }}">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Email:</strong>
		            <input type="text" name="email" class="form-control" placeholder="email" id="name" value="{{ $ticket->email }}">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Status:</strong>
		            <select name="status" class="form-control" id="status">
                        <option>-- Choose Status --</option>
                        <option value="0" {{ ($ticket->status == 0) ? 'selected' : '' }}> No</option>
                        <option value="1" {{ ($ticket->status == 1) ? 'selected' : '' }}> Yes </option>
                    </select>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>

@endsection