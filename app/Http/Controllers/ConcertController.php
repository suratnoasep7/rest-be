<?php
    
namespace App\Http\Controllers;
    
use App\Models\Concert;
use Illuminate\Http\Request;
    
class ConcertController extends Controller
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
        $concert = Concert::simplePaginate(5);
        return view('concert.index',compact('concert'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('concert.create');
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
    
        Concert::create($request->all());
    
        return redirect()->route('concert.index')
                        ->with('success','Concert created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Concert  $concert
     * @return \Illuminate\Http\Response
     */
    public function show(Concert $concert)
    {
        return view('concert.show',compact('concert'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Concert  $concert
     * @return \Illuminate\Http\Response
     */
    public function edit(Concert $concert)
    {
        return view('concert.edit',compact('concert'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Concert  $concert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Concert $concert)
    {
         request()->validate([
            'name' => 'required',
        ]);
    
        $concert->update($request->all());
    
        return redirect()->route('concert.index')
                        ->with('success','Concert updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Concert  $concert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Concert $concert)
    {
        $concert->delete();
    
        return redirect()->route('concert.index')
                        ->with('success','Concert deleted successfully');
    }
}