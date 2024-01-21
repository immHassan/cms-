<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use App\Models\Gallery;
use Auth;
use Str;

class EventController extends Controller
{


    function __construct()
    {
          $this->middleware('permission:event-read', ['only' => ['index']]);
    }


/**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
       
        $end = Carbon::parse(Carbon::now())->endOfMonth();
        $data = Event::whereMonth('start', Carbon::now()->month)->orderBy('start', 'asc')->get(['id', 'title', 'className', 'organizer', 'content', 'start', 'end']);
        $upcomming = Event::whereDate('start', '>=', Carbon::now())->whereDate('end', '<=', $end )->orderBy('start', 'asc')->get(['id', 'title','content', 'organizer', 'start', 'end']);
        
        if($request->ajax()) {
            $data = Event::whereDate('start', '>=', $request->start)
            ->whereDate('end',   '<=', $request->end)
            ->get(['id', 'title', 'className', 'organizer', 'content', 'start', 'end']);
             return response()->json($data);
        }
  
        return view('admin.events.index',compact('data', 'upcomming'));
    }
 
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function ajax(Request $request)
    {
 
        switch ($request->action) {
           case 'add':
          
            $start = $request->start;
            $end = $request->end;

            if($request->start_time){
               $start =  $start.' ' .$request->start_time;
            }
            if($request->end_time){
                $end =  $end.' ' .$request->end_time;

            }
            $event = Event::create([
                  'title' => $request->title,
                  'className' => $request->className,
                  'content' => $request->content,
                  'organizer' => $request->organizer,
                  'location_or_url' => $request->location_or_url,
                  'start' => $start,
                  'end' => $end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'update':
            
                if($request->has('start') && $request->has('end')){
                    $start = $request->start;
                    $end = $request->end;

                    if($request->start_time){
                    $start =  $start.' ' .$request->start_time;
                    }
                    if($request->end_time){
                        $end =  $end.' ' .$request->end_time;

                    }
                   
                    $event = Event::find($request->id)->update([
                        'title' => $request->title,
                        'className' => $request->className,
                        'content' => $request->content,
                        'organizer' => $request->organizer,
                        'location_or_url' => $request->location_or_url,
                        'start' => $start,
                        'end' => $end,
                    ]);
                }else{
                    
                    $event = Event::find($request->id)->update([
                        'title' => $request->title,
                        'className' => $request->className,
                        'organizer' => $request->organizer,                        
                        'content' => $request->content,                        
                    ]);

                }
 
              return response()->json($event);
             break;
  
           case 'delete':

            
            if(!auth()->user()->can('event-delete')){
                abort(403);
            }

              $event = Event::find($request->id)->delete();
  
              return response()->json($event);
             break;
             
           default:
             
             break;
        }
    }

    function checkEventGallery($id){
        $event = Event::findOrFail($id);
        $gallery = Gallery::where('event_id', $id)->first();
        if ($gallery) {
            return redirect(route('gallery.images',$gallery->id));
        } else {
            
            $data = [
                'title' => $event->title,
                'slug' => Str::slug($event->title),
                'content' => $event->content,
                'is_visible' => 1,
                'event_id' => $event->id,
                'start_date' => $event->start,
                'created_by' => Auth::user()->id,
            ];    
        $inserted = Gallery::create($data);

        return redirect(route('gallery.images',$inserted->id));        

        }
    }

   }
