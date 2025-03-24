<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\CompanyTerm;
use Illuminate\Http\Request;

class CompanyTermController extends Controller
{
    public function index()
    {
        $terms = CompanyTerm::all();
        return view('admin.products.company_terms.index')->with(['terms'=>$terms]);
    }
    public function edit(CompanyTerm $term)
    {
       
        return view('admin.products.company_terms.edit')->with(['term'=>$term]);

    }
    public function update(Request $request, CompanyTerm $term)
    {
        $request->validate([
            'terms' => 'required|string',
        ]);
        $term->update($request->all());
        return redirect()->route('admin.products.company_terms.index')->with('success', 'Company Term updated successfully!');
    }

}
