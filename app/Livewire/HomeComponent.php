<?php

namespace App\Livewire;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $slider_news=Post::where('slider_news',1)->limit(4)->get();
        $bracking_news=Post::where('bracking_news',1)->limit(4)->get();
        $tags=Tag::where('status',1)->get();
        $all_posts=Post::limit(4)->get();
        $latest_news=Post::latest()->limit(6)->get();
        return view('livewire.home-component',['slider_news'=>$slider_news,'bracking_news'=>$bracking_news,'tags'=>$tags,'all_posts'=>$all_posts,'latest_news'=>$latest_news]);
    }
}
