<?php
 
namespace App\View\Composers;
 
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Repositories\UserRepository;
 
class SizeComposer
{
    /**
     * Create a new profile composer.
     */
    public function __construct() {

    }
 
    /**
     * Bind data to the view.
     */
    public function compose(View $view)
    {
        $size = DB::table('sizes')->get();;
        $view->with('size', $size);
    }
}