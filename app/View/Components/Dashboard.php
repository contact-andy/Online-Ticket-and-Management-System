<?php

namespace App\View\Components;

use App\Models\Collection;
use App\Models\theatre;
use App\Models\Show;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dashboard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $user = User::count();
        view()->share('user',$user);
        
        $show = Show::where('is_disabled',Show::STATUS_ACTIVE)->count();
        view()->share('show',$show);
        
        $theatre = Theatre::count();
        view()->share('theatre',$theatre);
        
        $collection = Collection::count();
        view()->share('collection',$collection);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard');
    }
}
