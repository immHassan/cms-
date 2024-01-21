<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Services;
use App\Models\Forms;
use App\Models\Blog;
use App\Models\Question;
use App\Models\News;
use App\Models\Page;
use App\Models\Event;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use App\Models\Hit_Record;
use Carbon\Carbon;


class Dashboard extends Controller
{
    function index(){
        $user_count = User::count();
        $service_count = Services::count();
        $forms_count = Forms::count();
        $blogs = Blog::all();
        $news_count = News::count();
        $pages = Page::all();
        $events_count = Event::count(); 
        $blog_count = count($blogs);
        $pages_count = count($pages);
        
        $questions = Question::withCount('options', 'votes')->orderBy('votes_count','desc')->get()->map(function ($question){
            $question->isComingSoon = $question->isComingSoon();
            $question->isRunning = $question->isRunning();
            $question->hasEnded = $question->hasEnded();                       
            $total = $question->votes->count();
            $results = $question->results()->grab();
            $options = collect($results)->map(function ($result) use ($total){
                return (object) [
                    'votes' => $result['votes'],
                    'percent' => $total === 0 ? 0 : ($result['votes'] / $total) * 100,
                    'name' => $result['option']->name
                ];
                
            });
            $question->options = $options;
            return $question;
        });
        $isComingSoon = 0;
        $hasEnded = 0;
        $isRunning = 0;
        foreach($questions as $question) {
            if($question->isRunning){
                $isRunning++;
            }
            if($question->hasEnded){
                $hasEnded++;
            }
            if($question->isComingSoon){
                $isComingSoon++;
            }  
        }
        $count_record =$questions->take(3);
        

        //start trending blog 
        $trending_blog = Blog::withCount('hits')->orderBy('hits_count','desc')->get()->take(1)->map(function ($item){             
            $item->hits = $item->hits;
            return $item;
        })->first();
        $total_count_for_trending = $trending_blog->hits->where('entity_name', 'Blog')->sortBy(function ($item) {
            return $item->created_at->month;
        })->groupBy(function ($item) {
            return $item->created_at->format("F");
        })->map->count()->toArray();
       
        $hits_counts = implode(',' , $total_count_for_trending);
             

        $trend_count = $trending_blog->hits_count;

        $count_auth_blog=0;
        
        foreach($trending_blog->hits->toArray() as $check_user){
            if (User::where('id', '=', $check_user['user_id'])->exists()) {
                $count_auth_blog++;
             }
        }
        
        $unique_user_blog = $trending_blog->hits->unique('user_id')->count('user_id');
         
        $count_non_auth_blog = $trend_count-$count_auth_blog;
        $blog_name = $trending_blog->title;
               
        $trending_month = [];
        foreach($total_count_for_trending as $key => $trend_month){
            $trending_month[] = "'".$key."'";
        }
        $trending_month = implode(',',$trending_month);        
    
        // end Tranding blog

        //start trending page

        $trending_page = Page::withCount('hits')->orderBy('hits_count','desc')->get()->take(1)->map(function ($item){             
            $item->hits = $item->hits;
            return $item;
        })->first();
        
        $total_count_for_trending_page = $trending_page->hits->where('entity_name', 'Page')->sortBy(function ($item) {
            return $item->created_at->month;
        })->groupBy(function ($item) {
            return $item->created_at->format("F");
        })->map->count()->toArray();
        
        $hits_counts_page = implode(',' , $total_count_for_trending_page);
        
        $trend_count_page = $trending_page->hits_count;
        
        $count_auth_page=0;
        
        foreach($trending_page->hits->toArray() as $check_user){
            if (User::where('id', '=', $check_user['user_id'])->exists()) {
                $count_auth_page++;
             }
        }
        $unique_user_page = $trending_page->hits->unique('user_id')->count('user_id');
        
         
        $count_non_auth_page = $trend_count_page-$count_auth_page;
                
        $page_name = $trending_page->name;
               
        $trending_page_month = [];
        foreach($total_count_for_trending_page as $key => $trend_month){
            $trending_page_month[] = "'".$key."'";
        }
        $trending_page_month = implode(',',$trending_page_month);        
    

        //End trending page

        // start Total created month wise
        $Blog_Record = Blog::all()->sortBy(function ($item) {
            return $item->created_at->month;
            })->groupBy(function ($item) {
                    return $item->created_at->format("F");
            })->map->count()->toArray();
        
        
        $created_counts =[];
        $month =[];
        foreach($Blog_Record as $key => $counts)
        {
            $month[]= "'".$key."'";
            $created_counts[] = $counts;
        }
        
        $created_counts = implode(',' , $created_counts);
        $month = implode(',',$month);

        // End total created month wise
        return view('admin.dashboard.index',
            compact('blogs', 'pages', 'unique_user_blog',
            'count_non_auth_blog', 'count_auth_blog',
            'unique_user_page', 'count_non_auth_page',
            'count_auth_page', 'blog_name', 'page_name',
            'trend_count', 'trend_count_page', 'trending_month',
            'trending_page_month', 'count_record', 'hits_counts',
            'hits_counts_page', 'month', 'created_counts',
            'questions', 'isComingSoon', 'hasEnded', 'isRunning',
            'events_count', 'user_count', 'service_count', 'forms_count',
            'blog_count', 'news_count', 'pages_count'
        ));
    }
    public function check_trending_page($id){
        //start trending page

        $trending_page = Page::where('id',$id)->withCount('hits')->orderBy('hits_count','desc')->get()->take(1)->map(function ($item){             
            $item->hits = $item->hits;
            return $item;
        })->first();
        
        $total_count_for_trending_page = $trending_page->hits->where('entity_name', 'Page')->sortBy(function ($item) {
            return $item->created_at->month;
        })->groupBy(function ($item) {
            return $item->created_at->format("F");
        })->map->count()->toArray();

        $trend_count_page = $trending_page->hits_count;
        
        $count_auth_page=0;
        
        foreach($trending_page->hits->toArray() as $check_user){
            if (User::where('id', '=', $check_user['user_id'])->exists()) {
                $count_auth_page++;
                }
        }
        $unique_user_page = $trending_page->hits->unique('user_id')->count('user_id');
        $count_non_auth_page = $trend_count_page-$count_auth_page;                    
        $page_name = $trending_page->name;
        $trending_page_month = [];
        $hits_counts_page =[];
        foreach($total_count_for_trending_page as $key => $trend_hits){
            $trending_page_month[] = ''.$key.'';
            $hits_counts_page[] = $trend_hits;
        }
            
        return response()->json([
            'trending_page_month' => $trending_page_month,
            'page_name' => $page_name,
            'count_non_auth_page' => $count_non_auth_page,
            'unique_user_page' => $unique_user_page,
            'count_auth_page' => $count_auth_page,
            'hits_counts_page' => $hits_counts_page,
            'trend_count_page' => $trend_count_page
        ]);    
    }

    public function check_trending_blog($id){
        //start trending blog 
        $trending_blog = Blog::where('id',$id)->withCount('hits')->orderBy('hits_count','desc')->get()->take(1)->map(function ($item){             
            $item->hits = $item->hits;
            return $item;
        })->first();
        
        $total_count_for_trending_blog = $trending_blog->hits->where('entity_name', 'Blog')->sortBy(function ($item) {
            return $item->created_at->month;
        })->groupBy(function ($item) {
            return $item->created_at->format("F");
        })->map->count()->toArray();

        $trend_count_blog = $trending_blog->hits_count;
        
        $count_auth_blog=0;
        
        foreach($trending_blog->hits->toArray() as $check_user){
            if (User::where('id', '=', $check_user['user_id'])->exists()) {
                $count_auth_blog++;
                }
        }
        $unique_user_blog = $trending_blog->hits->unique('user_id')->count('user_id');
        $count_non_auth_blog = $trend_count_blog-$count_auth_blog;                    
        $blog_name = $trending_blog->title;
        $trending_blog_month = [];
        $hits_counts_blog =[];
        foreach($total_count_for_trending_blog as $key => $trend_hits){
            $trending_blog_month[] = ''.$key.'';
            $hits_counts_blog[] = $trend_hits;
        }
            
        return response()->json([
            'trending_blog_month' => $trending_blog_month,
            'blog_name' => $blog_name,
            'count_non_auth_blog' => $count_non_auth_blog,
            'unique_user_blog' => $unique_user_blog,
            'count_auth_blog' => $count_auth_blog,
            'hits_counts_blog' => $hits_counts_blog,
            'trend_count_blog' => $trend_count_blog
        ]);   
    
        // end Tranding blog
    
    }
    public function switchLang($lang)
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
        }
        return redirect()->back();
    }
}
