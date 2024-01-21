<?php
use Illuminate\Http\Request;

use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\News;
use App\Http\Controllers\Admin\Clients;
use App\Http\Controllers\Admin\Roles;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\Users;
use App\Http\Controllers\Admin\Banners;
use App\Http\Controllers\Admin\Services;
use App\Http\Controllers\Admin\PollController;
use App\Http\Controllers\Admin\Forms;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\FileManagerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Navbar;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BlogController;  
use App\Http\Controllers\Admin\PollManagerController;  
use App\Http\Controllers\Admin\VoteManagerController;  
use App\Http\Controllers\Admin\CommentController;  
use App\Http\Controllers\Admin\EventController;  
   

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
 

Route::get('lang/{lang}', [Dashboard::class, 'switchLang'])->name('lang.switch');
Route::get('filemanager', [FileManagerController::class, 'index']);
Route::post('filemanager', [FileManagerController::class, 'store']);

Route::group(['middleware' => 'web'], function() {       
    // search
    Route::get('/search', function(Request $request){
        $begin = microtime(true);
        $keyword=$request->search;
        if($keyword){
            $result = LaravelGlobalSearch::search($keyword);
            $end = microtime(true) - $begin;
            $response_time = round($end,3);
            $total_count=0;
            foreach ($result as $arr) {
                $total_count+=count($arr);
            }
            return view('admin.search.result',compact('total_count','result','response_time','keyword'));
        }
        else{
            return view('admin.search.result');            
        }
    })->middleware(['auth']);
 
    //baanner routes
    Route::get('/banners', [Banners::class, 'index'])->name('banners.list')->middleware(['auth']);
    Route::post('/banners', [Banners::class, 'ajax'])->name('banners.ajax')->middleware(['auth']);
    Route::get('/banners/{id}', [Banners::class, 'by_id'])->name('banners.by_id')->middleware(['auth']);
    Route::delete('/banners/{id}', [Banners::class, 'delete'])->name('banners.delete')->middleware(['auth']);
    Route::put('/banner-publish/{id}', [Banners::class, 'publish'])->name('banners.publish')->middleware(['auth']);
        
    //services routes
    Route::get('/services', [Services::class, 'index'])->name('services.list')->middleware(['auth']);
    Route::post('/services', [Services::class, 'ajax'])->name('services.ajax')->middleware(['auth']);
    Route::delete('/services/{id}', [Services::class, 'delete'])->name('services.delete')->middleware(['auth']);
    Route::get('/services/{id}', [Services::class, 'by_id'])->name('services.by_id')->middleware(['auth']);
    Route::put('/service-publish/{id}', [Services::class, 'publish'])->name('services.publish')->middleware(['auth']);
        
    //forms routes
    Route::get('/forms', [Forms::class, 'index'])->name('forms.list')->middleware(['auth']);
    Route::get('/form/new', [Forms::class, 'design_form'])->name('forms.design_form')->middleware(['auth']);
    Route::post('/forms', [Forms::class, 'create'])->name('forms.create')->middleware(['auth']);
    Route::get('/form/view/{slug}', [Forms::class, 'form_view'])->name('forms.form_view')->middleware(['auth']);
    Route::get('/form/edit/{slug}', [Forms::class, 'edit'])->name('forms.edit')->middleware(['auth']);
    Route::put('/forms', [Forms::class, 'update'])->name('forms.update')->middleware(['auth']);
    Route::post('/form/submit/{slug}', [Forms::class, 'submit_form'])->name('forms.update.submit_form')->middleware(['auth']);
     Route::get('/form/records/{slug}', [Forms::class, 'form_records'])->name('forms.form_records')->middleware(['auth']);
    Route::get('/forms/{id}', [Forms::class, 'by_id'])->name('forms.by_id')->middleware(['auth']);
    Route::delete('/forms/{id}', [Forms::class, 'delete'])->name('forms.delete')->middleware(['auth']);
    Route::put('/form-publish/{id}', [Forms::class, 'publish'])->name('forms.publish')->middleware(['auth']);

    //News routes
    Route::get('/news', [News::class, 'index'])->name('news.list')->middleware(['auth']);
    Route::post('/news', [News::class, 'ajax'])->name('news.ajax')->middleware(['auth']);
    Route::get('/news/{id}', [News::class, 'by_id'])->name('news.by_id')->middleware(['auth']);
    Route::delete('/news/{id}', [News::class, 'delete'])->name('news.delete')->middleware(['auth']);
    Route::put('/news-publish/{id}', [News::class, 'publish'])->name('news.publish')->middleware(['auth']);
        

    //Events Route
    Route::get('/events', [EventController::class, 'index'])->name('events.list')->middleware(['auth']);
    Route::post('events', [EventController::class, 'ajax'])->middleware(['auth']);
    Route::get('/check-event-gallery/{id}', [EventController::class, 'checkEventGallery'])->name('event.checkGallery')->middleware(['auth']);

    //Poll routes
    Route::get('/polls', [PollController::class, 'index'])->name('poll.list')->middleware(['auth']);
    Route::post('/poll', [PollController::class, 'ajax'])->name('poll.ajax')->middleware(['auth']);
    Route::get('/poll/{id}', [PollController::class, 'by_id'])->name('poll.by_id')->middleware(['auth']);
    Route::delete('/poll/{id}', [PollController::class, 'delete'])->name('poll.delete')->middleware(['auth']);
    Route::put('/poll-publish/{id}', [PollController::class, 'publish'])->name('poll.publish')->middleware(['auth']);
        

    //Poll questions
    Route::get('/poll/questions/{id}', [PollManagerController::class, 'index'])->name('question.index')->middleware(['auth']);
    Route::get('/questions/create/{id}', [PollManagerController::class, 'create'])->name('question.create')->middleware(['auth']);
    Route::post('/questions', [PollManagerController::class, 'store'])->name('question.store')->middleware(['auth']);
    Route::get('/questions/{question}', [PollManagerController::class, 'edit'])->name('question.edit')->middleware(['auth']);
    Route::get('/questions/result/{question}', [PollManagerController::class, 'result'])->name('question.result')->middleware(['auth']);
    Route::patch('/questions/{question}', [PollManagerController::class, 'update'])->name('question.update')->middleware(['auth']);
    Route::delete('/questions/{question}', [PollManagerController::class, 'remove'])->name('question.remove')->middleware(['auth']);
    Route::patch('/questions/{question}/lock', [PollManagerController::class, 'lock'])->name('question.lock')->middleware(['auth']);
    Route::patch('/questions/{question}/unlock', [PollManagerController::class, 'unlock'])->name('question.unlock')->middleware(['auth']);
        
    //Vote
    Route::get('/vote/{id}', [PollManagerController::class, 'voteform'])->name('question.voteform');
    Route::post('/poll/vote/{poll}', [VoteManagerController::class, 'vote'])->name('question.vote');
    
    //Blog Category routes
    Route::get('/categories', [CategoryController::class, 'index'])->name('category.list')->middleware(['auth']);
    Route::post('/category', [CategoryController::class, 'create'])->name('category.create')->middleware(['auth']);
    Route::patch('/category-update', [CategoryController::class, 'update'])->name('category.update')->middleware(['auth']);
    Route::get('/category/{id}', [CategoryController::class, 'by_id'])->name('category.by_id')->middleware(['auth']);
    Route::delete('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete')->middleware(['auth']);
    Route::put('/category', [CategoryController::class, 'update'])->name('category.update')->middleware(['auth']);
    
    //Blog routes
    Route::get('/blog', [BlogController::class, 'index'])->name('blog.list')->middleware(['auth']);
    Route::post('/blog', [BlogController::class, 'ajax'])->name('blog.ajax')->middleware(['auth']);
    Route::get('/blog/{id}', [BlogController::class, 'by_id'])->name('blog.by_id')->middleware(['auth']);
    Route::delete('/blog/{id}', [BlogController::class, 'delete'])->name('blog.delete')->middleware(['auth']);
    Route::put('/blog-publish/{id}', [BlogController::class, 'publish'])->name('blog.publish')->middleware(['auth']);
    
    //Blog Comments
    Route::get('/blog/{id}/{slug}', [BlogController::class, 'view'])->name('blog.view')->middleware(['auth']);
    Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.add')->middleware(['auth']);
    Route::post('/reply/store', [CommentController::class, 'replyStore'])->name('reply.add')->middleware(['auth']);
    Route::post('/comment/like_unlike', [CommentController::class, 'like_unlike'])->name('comment.like_unlike')->middleware(['auth']);
    
    //rateing
    Route::post('/blog/rate', [BlogController::class, 'blogRating'])->name('blog.rating')->middleware(['auth']);

    //Galerry routes
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.list')->middleware(['auth']);
    Route::post('/gallery', [GalleryController::class, 'create'])->name('gallery.create')->middleware(['auth']);
    Route::post('/gallery/media', [GalleryController::class, 'addmedia'])->name('gallery.addmedia')->middleware(['auth']);
    Route::post('/gallery/upload', [GalleryController::class, 'upload'])->name('gallery.upload')->middleware(['auth']);
    Route::get('/gallery/{id}', [GalleryController::class, 'by_id'])->name('gallery.by_id')->middleware(['auth']);
    Route::delete('/gallery/{id}', [GalleryController::class, 'delete'])->name('gallery.delete')->middleware(['auth']);
    Route::delete('/gallerymedia/{id}', [GalleryController::class, 'deletemedia'])->name('gallery.media.delete')->middleware(['auth']);
    Route::put('/gallery', [GalleryController::class, 'update'])->name('gallery.update')->middleware(['auth']);
    Route::get('/gallery/images/{id}', [GalleryController::class, 'gallery_images'])->name('gallery.images')->middleware(['auth']);
    Route::delete('/gallery/media/{id}', [GalleryController::class, 'deletemultiimages'])->name('gallery.deletemultiimages.delete')->middleware(['auth']);
    Route::put('/gallery-publish/{id}', [GalleryController::class, 'publish'])->name('gallery.publish')->middleware(['auth']);
        
    //File Manager routes
    Route::get('/file-manager', [MediaController::class, 'index'])->name('file_manager.list')->middleware(['auth']);
    
    Route::get('/', [Dashboard::class, 'index'])->name('index')->middleware(['auth']);
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard')->middleware(['auth']);
    Route::get('/check-trending-page/{id}', [Dashboard::class, 'check_trending_page'])->middleware(['auth']);
    Route::get('/check-trending-blog/{id}', [Dashboard::class, 'check_trending_blog'])->middleware(['auth']);
    
    //client routes
    Route::get('/clients', [Clients::class, 'index'])->name('clients.list')->middleware(['auth']);
    Route::post('/clients', [Clients::class, 'create'])->name('clients.create')->middleware(['auth']);
    Route::get('/clients/{id}', [Clients::class, 'by_id'])->name('clients.by_id')->middleware(['auth']);
    Route::delete('/clients/{id}', [Clients::class, 'delete'])->name('clients.delete')->middleware(['auth']);
    Route::put('/clients', [Clients::class, 'update'])->name('clients.update')->middleware(['auth']);
    Route::put('/clients/assign-resource', [Clients::class, 'assign_resource'])->name('clients.assign-resource')->middleware(['auth']);
    
    //Users
    Route::get('/users', [Users::class, 'index'])->name('users.list')->middleware(['auth']);
    Route::post('/users', [Users::class, 'create'])->name('users.create')->middleware(['auth']);
    Route::get('/users/{id}', [Users::class, 'by_id'])->name('users.by_id')->middleware(['auth']);
    Route::delete('/users/{id}', [Users::class, 'delete'])->name('users.delete')->middleware(['auth']);
    Route::put('/users', [Users::class, 'update'])->name('users.update')->middleware(['auth']);
    Route::put('/users/update-password', [Users::class, 'update_password'])->name('users.update_password')->middleware(['auth']);
    Route::put('/user-publish/{id}', [Users::class, 'publish'])->name('users.publish')->middleware(['auth']);
        
    
    //Roles
    Route::get('/roles', [Roles::class, 'index'])->name('roles.list')->middleware(['auth']);
    Route::post('/roles', [Roles::class, 'create'])->name('roles.create')->middleware(['auth']);
    Route::get('/roles/{id}', [Roles::class, 'by_id'])->name('roles.by_id')->middleware(['auth']);
    Route::delete('/roles/{id}', [Roles::class, 'delete'])->name('roles.delete')->middleware(['auth']);
    Route::put('/roles', [Roles::class, 'update'])->name('roles.update')->middleware(['auth']);
    Route::get('/role/new', [Roles::class, 'new'])->name('roles.new')->middleware(['auth']);
    Route::get('/role/edit/{id}', [Roles::class, 'edit'])->name('roles.edit')->middleware(['auth']);
    

    //CMS
    Route::get('/cms/pages',[PagesController::class, 'index'])->name('cms.list')->middleware(['auth']);
    Route::post('/cms/new',[PagesController::class, 'create'])->name('cms.new')->middleware(['auth']);
    Route::get('/cms/edit/{slug}',[PagesController::class, 'edit'])->name('cms.edit')->middleware(['auth']);
    Route::get('/cms/view/{slug}',[PagesController::class, 'view'])->name('cms.view')->middleware(['auth']);
    Route::post('/cms/save',[PagesController::class, 'save'])->name('cms.save')->middleware(['auth']);
    Route::get('/page/{slug}',[PagesController::class, 'page_view'])->name('cms.page_view')->middleware(['auth']);

    Route::delete('/cms/{id}', [PagesController::class, 'delete'])->name('cms.delete')->middleware(['auth']);
    Route::get('/cms/{id}', [PagesController::class, 'by_id'])->name('cms.by_id')->middleware(['auth']);
    Route::put('/cms/update', [PagesController::class, 'update'])->name('cms.update')->middleware(['auth']);
    Route::post('/cms/get_component',[PagesController::class, 'get_component'])->name('cms.get_component')->middleware(['auth']);
 
    Route::post('/cms/publish/page',[PagesController::class, 'publish_page'])->name('cms.publish_page')->middleware(['auth']);
 
    Route::post('/cms/version',[PagesController::class, 'create_version'])->name('cms.create_version')->middleware(['auth']);
    Route::put('/cms/version',[PagesController::class, 'update_version'])->name('cms.update_version')->middleware(['auth']);
    Route::post('/cms/block',[PagesController::class, 'create_block'])->name('cms.create_block')->middleware(['auth']);
    Route::post('/cms/validate-slug',[PagesController::class, 'validate_slug'])->name('cms.validate_slug')->middleware(['auth']);
    Route::put('/cms-publish/{id}', [PagesController::class, 'publish'])->name('cms.publish')->middleware(['auth']);
        
    //Navbar Methods
    Route::get('/navbar', [Navbar::class, 'index'])->name('navbar.list')->middleware(['auth']);
    Route::get('/navbar/create', [Navbar::class, 'create'])->name('navbar.create')->middleware(['auth']);
    Route::post('/navbar', [Navbar::class, 'save'])->name('navbar.save')->middleware(['auth']);
    Route::get('/navbar/{slug}', [Navbar::class, 'by_id'])->name('navbar.by_id')->middleware(['auth']);
    Route::put('/navbar', [Navbar::class, 'update'])->name('navbar.update')->middleware(['auth']);
    Route::post('/get-navbar', [Navbar::class, 'get_navbar'])->name('navbar.get_navbar')->middleware(['auth']);

    Route::delete('/navbar/{id}', [Navbar::class, 'delete'])->name('navbar.delete')->middleware(['auth']);
    Route::put('/navbar/status', [Navbar::class, 'update_status'])->name('navbar.update_status')->middleware(['auth']); 
    Route::put('/navbar-publish/{id}', [Navbar::class, 'publish'])->name('navbar.publish')->middleware(['auth']);
    });



//Clear Cache facade value:
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function () {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function () {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function () {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function () {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function () {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

require __DIR__ . '/auth.php';
 
// Route::fallback(function(){
// abort(404);
// });