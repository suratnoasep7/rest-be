<?php
    
namespace App\Http\Controllers;
    
use App\Models\Satuan;
use Illuminate\Http\Request;
    
class SatuanController extends Controller
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
        $satuan = Satuan::simplePaginate(5);
        return view('satuan.index',compact('satuan'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('satuan.create');
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
    
        Satuan::create($request->all());
    
        return redirect()->route('satuan.index')
                        ->with('success','Satuan created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function show(Satuan $satuan)
    {
        return view('satuan.show',compact('satuan'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Satuan $satuan)
    {
        return view('satuan.edit',compact('satuan'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Satuan $satuan)
    {
         request()->validate([
            'name' => 'required',
        ]);
    
        $satuan->update($request->all());
    
        return redirect()->route('satuan.index')
                        ->with('success','Satuan updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Satuan $satuan)
    {
        $satuan->delete();
    
        return redirect()->route('satuan.index')
                        ->with('success','Satuan deleted successfully');
    }
}