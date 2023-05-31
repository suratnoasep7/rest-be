<?php
    
namespace App\Http\Controllers;
    
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
    
class TransactionController extends Controller
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
        $transaction = Transaction::with('product')->simplePaginate(5);
        return view('transaction.index',compact('transaction'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        $kd = Transaction::max('kd_transactions');
        $urutan = (int) substr($kd, 3, 2);
        $urutan++;
        $huruf = "PR";
        $kdTransaction = $huruf . sprintf("%02s", $urutan);
        return view('transaction.create', compact('product', 'kdTransaction'));
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
            'kd_transactions' => 'required',
            'product_id' => 'required',
            'qty' => 'required',
            'total' => 'required',
        ]);
    
        Transaction::create($request->all());
    
        return redirect()->route('transaction.index')
                        ->with('success','Transaction created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return view('transaction.show',compact('transaction'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $product = Product::all();
        return view('transaction.edit',compact('product','transaction'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
         request()->validate([
            'kd_transactions' => 'required',
            'product_id' => 'required',
            'qty' => 'required',
        ]);
    
        $transaction->update($request->all());
    
        return redirect()->route('transaction.index')
                        ->with('success','Transaction updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
    
        return redirect()->route('transaction.index')
                        ->with('success','Troduct deleted successfully');
    }
}