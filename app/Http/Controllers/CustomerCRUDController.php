<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Taxid;
use Illuminate\Http\Request;

class CustomerCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['customers'] = Customer::orderBy('id', 'desc')->paginate(5);
        return view('customers.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //store a newly created customer in the database.

    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);
        $Customer = new Customer;
        $Customer->name = $request->name;
        $Customer->email = $request->email;
        $Customer->address = $request->address;
        $Customer->save();
        return redirect()->route('customers.index')
            ->with('success', 'Customer has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $Customer) //display the specified customer

    {
        return view('customers.show', compact('Customer'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $Customer)
    {
        return view('customers.edit', compact('Customer'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        $Customer = Customer::find($id);
        $Customer->name = $request->name;
        $Customer->email = $request->email;
        $Customer->address = $request->address;
        $Customer->save();
        return redirect()->route('customers.index')
            ->with('success', 'Customer Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $Customer)
    {
        $Customer->delete();
        return redirect()->route('customers.index')
            ->with('success', 'Customer has been deleted successfully');
    }

    public function fetchTaxByCustID($id)
    {
        if(Customer::find($id) != null){
            $taxid = Customer::find($id)->taxid->taxid;
            return view('show_tax', compact('taxid'));
        }
        $taxid = "Invalid Tax ID";
        return view('show_tax', compact('taxid'));
    }

    public function fetchCustByTax($id){
        if(Taxid::where('taxid',$id) != null && Taxid::where('taxid',$id)->first() != null && Taxid::where('taxid',$id)->first()->customer_id != null){
            $cust = Customer::find(Taxid::where('taxid',$id)->first()->customer_id)->first();
            $cust->push("taxid",$id);
            return view('show_cust', compact('cust'));
        }
        $cust = "ERROR";
        return view('show_cust', compact('cust'));
    }

}