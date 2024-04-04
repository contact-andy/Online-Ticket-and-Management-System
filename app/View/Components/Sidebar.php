<?php

namespace App\View\Components;

use App\Models\Collection;
use App\Models\Product;
use App\Models\Show;
use App\Models\Showtime;
use App\Models\SubCategory;
use App\Models\Theatre;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $userCount = User::count();
        view()->share('userCount',$userCount);
        
        $RoleCount = Role::count();
        view()->share('RoleCount',$RoleCount);
        
        $TheatreCount = Theatre::count();
        view()->share('TheatreCount',$TheatreCount);
        
        $ShowCount = Show::where('is_disabled',Show::STATUS_ACTIVE)->count();
        view()->share('ShowCount',$ShowCount);
        
        $reservationCount = SubCategory::count();
        view()->share('reservationCount',$reservationCount);
        
        $CollectionCount = Collection::count();
        view()->share('CollectionCount',$CollectionCount);
        
        $ProductCount = Product::count();
        view()->share('ProductCount',$ProductCount);
        
        $EventCount = Showtime::count();
        view()->share('EventCount',$EventCount);

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar');
    }
}
