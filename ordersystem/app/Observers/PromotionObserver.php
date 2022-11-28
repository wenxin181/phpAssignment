<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Support\Facades\DB;

class PromotionObserver {
    
    //Handle the event when a Model Promotion has been created
    public function created(Promotion $promotion) {
        $promotion->promotion_id = 'PR-' . $promotion->promotion_id; // set the promotionId start with PR-
        $promotionPrice = 100 - $promotion->promotionRate; // Put the promotionRate into a variable
        $promotion->save();
        
        Product::where('categoryName', '=', $promotion->promotionCategory)->update(['promotionPrice' => DB::raw("productPrice * $promotionPrice / 100" )] );
        // Update the Product price in Product Table where category same with promotion's category
    }

    //Handle the event when a Model Promotion has been updated
    public function updated(Promotion $promotion) {
        //
        $promotionPrice = 100 - $promotion->promotionRate; // Put the promotionRate into a variable
        //Update the Product price in Product Table
        Product::where('categoryName', '=', $promotion->promotionCategory)->update(['promotionPrice' => DB::raw("productPrice * $promotionPrice / 100" )] );
    }

    //Handle the event when a Model Promotion has been Deleted
    public function deleted(Promotion $promotion) {
        //Update the Product price in Product Table
         Product::where('categoryName', '=', $promotion->promotionCategory)->update(['promotionPrice' => DB::raw("NULL" )] );
    }

}
