<?php
namespace App\Http\Composers;

use App\Incoming_event;
use App\Incoming_event as Incoming;
use App\Navbar;
use App\Post;
use App\Setting;
use Illuminate\View\View;

class NavigationComposer {
    // compose
    public function compose($view) {
        $view->with('fast_links', Setting::where('set_type',1)->get());
        $view->with('links', Setting::where('set_type',2)->get());
    }

    // navbar
    public function navbar($view) {
        $Navs= Navbar::where('parent_id',0)->get()->toArray();
        for($i=0 ; $i<count($Navs);$i++) {
            $childNav = Navbar::where('parent_id', $Navs[$i]['id'])->get()->toArray();
            $Navs[$i]['childs'] = $childNav;
            for ($j = 0; $j < count($childNav); $j++) {
                $subChildNav = Navbar::where('parent_id', $childNav[$j]['id'])->get()->toArray();
                $Navs[$i]['childs'][$j]['childs'] = $subChildNav;
            }
        }
        $view->with('navbar',$Navs );
    }

    // slider
    public function slider($view) {
        $SliderItems= Post::where('addToSlider',1)->limit(10)->get();
        $view->with('Items',$SliderItems );
    }
    // homepage
    public function homepage($view) {
        $arr = [
            'hot_news' => Post::where('priority',1)->orderBy('created_at','DESC')->limit(10)->get(),
            'posts' => Post::where('post_type',1)->orderBy('created_at','DESC')->limit(6)->get(),
            'notfications' => Post::where('post_type',3)->orderBy('created_at','DESC')->limit(6)->get(),
            'seminars' => Post::where('post_type',4)->orderBy('created_at','DESC')->limit(6)->get(),
            'others' => Post::where('post_type',5)->orderBy('created_at','DESC')->limit(6)->get(),
            'incomings' => Incoming::where('expired_date','>',\Carbon\Carbon::now())->orderBy('expired_date','desc')->get()
        ];
        $view->with($arr);
    }

    // post
    public function post($view) {
        $arr = [
            'hot_news' => Post::where('priority',1)->orderBy('created_at','DESC')->limit(10)->get(),
        ];
        $view->with($arr);
    }
}
