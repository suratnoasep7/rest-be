@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Ticket</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('check.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kode Ticket:</strong>
                {{ $ticket->kd_tickets }}
            </div>
            <div class="form-group">
                <strong>Name Concert:</strong>
                {{ $ticket->concert->name }}
            </div>
            <div class="form-group">
                <strong>Name:</strong>
                {{ $ticket->name }}
            </div>
            <div class="form-group">
                <strong>Email:</strong>
                {{ $ticket->email }}
            </div>
            <div class="form-group">
                <strong>Status:</strong>
                @if ($ticket->status)
                    Yes
                @else
                    No
                @endif
            </div>
        </div>
    </div>
@endsection