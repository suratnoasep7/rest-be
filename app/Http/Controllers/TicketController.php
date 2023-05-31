<?php
    
namespace App\Http\Controllers;
    
use App\Models\Ticket;
use App\Models\Concert;
use Illuminate\Http\Request;
    
class TicketController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticket = Ticket::with('concert')->simplePaginate(5);
        return view('ticket.index',compact('ticket'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ticket.create');
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
            'name' => 'required',
        ]);
    
        Ticket::create($request->all());
    
        return redirect()->route('ticket.index')
                        ->with('success','Ticket created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return view('ticket.show',compact('ticket'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        $concert = Concert::all();
        return view('ticket.edit',compact('ticket', 'concert'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        request()->validate([
            'kd_tickets' => 'required',
            'name' => 'required',
            'email' => 'required',
            'status' => 'required',
            'concert_id' => 'required',
        ]);
    
        $ticket->update($request->all());
    
        return redirect()->route('ticket.index')
                        ->with('success','Ticket updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
    
        return redirect()->route('ticket.index')
                        ->with('success','Ticket deleted successfully');
    }
}