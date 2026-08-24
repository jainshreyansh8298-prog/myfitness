<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $services = Service::where('is_featured', 1)->latest()->take(8)->get();
        if ($services->isEmpty()) {
            $services = Service::latest()->take(8)->get();
        }
        $blogs = \Illuminate\Support\Facades\Cache::remember('home_recent_blogs', 60, function () {
            return Blog::with(['category:id,name'])->select('id', 'slug', 'title', 'excerpt', 'image', 'created_at', 'category_id')->latest()->take(10)->get();
        });
        $testimonials = \App\Models\Testimonial::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        $categories = Category::withCount('services')->get();
        
        $faqs = \App\Models\Faq::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        
        return view('front.home', compact('services','blogs','testimonials', 'categories', 'faqs'));
    }

    public function about()
    {
        $page = \App\Models\Page::where('slug', 'about-us')->first();
        $introPage = \App\Models\Page::where('slug', 'about-us-intro')->first();
        $categories = Category::withCount('services')->limit(10)->get();
        return view('front.about',compact('categories', 'page', 'introPage'));
    }

    public function coaches()
    {
        $coaches = \Illuminate\Support\Facades\Schema::hasTable('coaches')
            ? \App\Models\Coach::where('is_active', true)
                ->orderBy('sort_order', 'asc')
                ->latest()
                ->get()
            : collect();
        return view('front.coaches', compact('coaches'));
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function privacyPolicy()
    {
        $page = \App\Models\Page::where('slug', 'privacy-policy')->first();
        return view('front.privacy-policy', compact('page'));
    }

    public function termsConditions()
    {
        $page = \App\Models\Page::where('slug', 'terms-conditions')->first();
        return view('front.terms-conditions', compact('page'));
    }

    public function cookiePolicy()
    {
        $page = \App\Models\Page::where('slug', 'cookie-policy')->first();
        return view('front.cookie-policy', compact('page'));
    }

    public function serviceDelivery()
    {
        $page = \App\Models\Page::where('slug', 'service-delivery')->first();
        return view('front.service-delivery', compact('page'));
    }

    public function login()
    {
        return view('front.login');
    }

    public function register()
    {
        return view('front.register');
    }

    public function blogs()
    {
        $blogs = Blog::with(['category'])->paginate(9);

        return view('front.blogs',compact('blogs'));
    }

    public function singleBlog(Blog $blog)
    {
        $blog->load('category');

        $blogs = Blog::latest()->where('category_id',$blog->category_id)
        ->where('id','<>',$blog->id)
        ->take(3)->get();

        return view('front.single-blog',compact('blog','blogs'));
    }

    public function services(Request $request)
    {
        $services = Service::query();

        if($request->filled('area_id')){
            $services->whereHas('areas',function ($services) use ($request){
                $services->where('id',$request->query('area_id'));
            });
        }

        if($request->filled('category_id')){
            $services->whereHas('category',function($services) use ($request){
                $services->where('id',$request->query('category_id'));
            });
        }

        return view('front.services',[
            'services'                  =>$services->paginate(9),
            'areas'                     =>Area::select('id','name')->get(),
            'categories'                =>Category::select('id','name')->get(),
        ]);
    }

    public function faq()
    {
        $faqs = \App\Models\Faq::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        return view('front.faqs', compact('faqs'));
    }

    public function serviceDetails(Service $service)
    {
        $service->load([
            'areas','category',
        ]);

        $areas = \App\Models\Area::orderBy('name', 'asc')->get();

        return view('front.single-service',compact('service', 'areas'));
    }

    public function forgot()
    {
        return view('front.forgot');
    }
}
