<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\NbvTerm;
use Illuminate\Http\Request;

class NbvTermController extends Controller
{
    public function index()
    {
        $terms = NbvTerm::all();
        return view('admin.products.nbv_terms.index')->with(['terms'=>$terms]);
    }
    public function create()
    {
       
        return view('admin.products.nbv_terms.create');

    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'terms' => 'required|string',
            'title' => 'required|string',
            'type' => 'required|string',
        ]);
        NbvTerm::create($request->all());
        return redirect()->route('admin.products.nbv_terms.index')->with('success', 'Nbv Term created successfully!');
    }
    public function edit(NbvTerm $nbv_term)
    {
       
        return view('admin.products.nbv_terms.edit')->with(['nbv_term'=>$nbv_term]);

    }
    public function update(Request $request, NbvTerm $nbv_term)
    {
        $request->validate([
            'name' => 'required|string',
            'terms' => 'required|string',
            'title' => 'required|string',
            'type' => 'required|string',
        ]);
        $nbv_term->update($request->all());
        return redirect()->route('admin.products.nbv_terms.index')->with('success', 'Nbv Term updated successfully!');
    }
    public function destroy(NbvTerm $nbv_term)
    {
        $nbv_term->delete();
        
        return redirect()->route('admin.products.nbv_terms.index')
                         ->with('success', 'Nbv term deleted successfully.');
    }
    public function changeTermStatus(Request $request)
    { 
        $term = NbvTerm::findOrFail($request->id);
        $term->status = $request->status;
        $term->save();

        return response()->json(['message' => 'Nbv Term status updated successfully!']);
    }

}
