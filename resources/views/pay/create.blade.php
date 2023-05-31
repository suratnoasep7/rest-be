@extends('welcome')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Ticket</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('welcome.index') }}"> Back</a>
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


    <form action="{{ route('welcome.store') }}" method="POST">
    	@csrf


         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                    <input type="hidden" name="kd_tickets" class="form-control" placeholder="Kode Tickets" value="{{ $kdTicket }}">
                    <div class="form-group">
                        <strong>Concert:</strong>
                        <select name="concert_id" class="form-control" id="concert">
                            <option>-- Choose Concert --</option>
                            @foreach($concert as $concerts)
                                <option value="{{ $concerts->id }}">
                                    {{ $concerts->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name" id="name">
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="text" name="email" class="form-control" placeholder="Email" id="email">
                    </div>
                </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


@endsection