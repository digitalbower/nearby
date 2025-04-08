<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewReportController extends Controller
{
    public function index(){
        $reviews = Review::latest()->get();
        return view('admin.reports.reviews.index')->with(['reviews'=>$reviews]);
    }
    public function destroy(Review $review)
    {
        $review->delete();
        
        return redirect()->route('admin.reports.reviews.index')
                         ->with('success', 'Product Review deleted successfully.');
    }
    public function changeReviewStatus(Request $request)
    { 
        $review = Review::findOrFail($request->id);
        $review->status = $request->status;
        $review->save();

        return response()->json(['message' => 'Product Review status updated successfully!']);
    }
    
}
