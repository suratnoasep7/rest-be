<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Concert;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $concert = Concert::simplePaginate(5);
        $message = false;
        return view('pay.index',compact('concert','message'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $concert = Concert::all();
        $kd = Ticket::max('kd_tickets');
        $urutan = (int) substr($kd, 3, 2);
        $urutan++;
        $huruf = "TRX";
        $kdTicket = $huruf . sprintf("%02s", $urutan);
        return view('pay.create', compact('concert', 'kdTicket'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $pay
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::find($id);
        return view('pay.show',compact('ticket'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate([
            'kd_tickets' => 'required',
            'name' => 'required',
            'email' => 'required',
            'concert_id' => 'required',
        ]);
    
        $ticket = Ticket::create($request->all());

        return redirect()->route('welcome.index')->with( ['message' => "Ticket created successfully.", 'ticket' => $ticket] );
    }
}