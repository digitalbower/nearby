<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\NbvTerm;
use App\Models\Product;
use Carbon\Carbon;
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
        $today = Carbon::today();

        $isUsed = Product::with('vendor')
            ->where('nbv_terms_id', $nbv_term->id)
            ->whereDate('validity_from', '<=', $today)
            ->whereDate('validity_to', '>=', $today)
            ->whereHas('vendor', function ($query) use ($today) {
                $query->where('expired',1)
                ->where('status',1);
            })
            ->exists();

        if ($isUsed) {
            return redirect()->route('admin.products.nbv_terms.index')
                            ->with('error', 'Cannot delete this term because it is used in one or more products.');
        }

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
