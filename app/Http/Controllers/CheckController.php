<?php
    
namespace App\Http\Controllers;
    
use App\Models\Ticket;
use App\Models\Concert;
use Illuminate\Http\Request;
    
class CheckController extends Controller
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
    public function index(Request $request)
    {
        $kdTickets = $request->query('kd_tickets');
        if ($kdTickets != "") {
            $ticket = Ticket::with('concert')->where('kd_tickets', '=', $kdTickets)->get();
        } else {
            $ticket = array();
        }

        
        
        return view('check.index',compact('ticket','kdTickets'))->with('i', (request()->input('page', 1) - 1) * 5);
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
    
        return redirect()->route('check.index')
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
        return view('check.show',compact('ticket'));
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
        return view('check.edit',compact('ticket', 'concert'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $ticket = Ticket::find($id);
        $ticket->update([
            'status' => 1
        ]);
    
        return redirect()->route('check.index')
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
    
        return redirect()->route('check.index')
                        ->with('success','Ticket deleted successfully');
    }
}