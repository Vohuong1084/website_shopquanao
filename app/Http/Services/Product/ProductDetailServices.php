<?php
namespace App\Http\Services\Product;

use DB;

class ProductDetailServices {
    // comment
    public function comment($id) {
        return DB::table('comments')->where('comment_product_id', '=', $id)->orderByDesc('created_at')->get();
    }

    // Star Avg
    public function star($id) {
        return DB::table('comments')->where('comment_product_id', '=', $id)->avg('rating');
    }

    // Number review
    public function num_review($id) {
        $review = DB::table('comments')->where('comment_product_id', '=', $id)->count();
        
        return $review;
    }
}
?>