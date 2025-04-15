<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\SalesPerson;
use Illuminate\Http\Request;

class SalesPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $persons = SalesPerson::all();
        return view('admin.products.sales_person.index',compact('persons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.sales_person.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required']);
        SalesPerson::create($request->all());
        return redirect()->route('admin.products.sales_person.index')->with('success', 'New Sales Person created successfully!');    
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SalesPerson $sales_person)
    {
        return view('admin.products.sales_person.edit',compact('sales_person'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,SalesPerson $sales_person)
    {
        $request->validate(['name'=>'required']);
        $sales_person->update($request->all());
        return redirect()->route('admin.products.sales_person.index')->with('success', 'Sales Person updated successfully!');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SalesPerson $sales_person)
    {
        $sales_person->delete();
        return redirect()->route('admin.products.sales_person.index')
        ->with('success', 'Product deleted successfully.');
    }
    public function changeSalesStatus(Request $request)
    { 
        $person = SalesPerson::findOrFail($request->id);
        $person->status = $request->status;
        $person->save();

        return response()->json(['message' => 'Sales Person status updated successfully!']);
    }
}
