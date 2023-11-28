<?php
 
namespace App\View\Composers;
 
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Repositories\UserRepository;
 
class NavComposer
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
        $menus = DB::table('menus')->get();
        $view->with('menus', $menus);
    }
}