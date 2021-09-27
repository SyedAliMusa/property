<?php

namespace App\Http\Controllers\backEnd\Blogs;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\Category;
use App\Models\Comments;
use App\Models\Property;
use App\Models\PropertyFeatures;
use App\Models\Tags;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function index() {
        $blogs = Blogs::all()->where('is_archived', false);
        return view('Admin.views.Blogs.blog_list', compact('blogs'));
    }

    public function addBlog(Request $request) {
        $categories = Category::all()->where('is_active', true);
        if ($request->getMethod() == "GET") {
            return view('Admin.views.Blogs.blog_add', compact('categories'));
        } else {
            $blog = new Blogs();
            $blog->user_id = 2;
            $blog->views = 0;// auth()->user()->id;
            $blog->category_id = $request->get('category'); // auth()->user()->id;
            $blog->title = $request->get('title');
            $blog->meta_title = $request->get('metaTitle');
            $blog->slug = $request->get('slug');
            $blog->summary = $request->get('summary');
            $blog->published = true;
            $blog->content = $request->get('content');

            $path = public_path() . '/BlogsImages';
            if ($request->hasfile('fImage')) {
                $fName = $request->file('fImage')->getClientOriginalName();
                $fileNameF = pathinfo($fName, PATHINFO_FILENAME);
                $extensionF = pathinfo($fName, PATHINFO_EXTENSION);
                $fName = md5(time() . $fileNameF) . '.' . $extensionF;
                if ($request->file('fImage')->move($path, $fName)) {
                    $img = Image::make($path . '/' . $fName);
                    $img->resize(787, 344);
                    $img->save($path . '/' . $fName);
                }
                $blog->banner_image = $fName;
            }

            if ($request->hasfile('rImage')) {
                $hName = $request->file('rImage')->getClientOriginalName();
                $fileNameH = pathinfo($hName, PATHINFO_FILENAME);
                $extensionH = pathinfo($hName, PATHINFO_EXTENSION);
                $hName = md5(time() . $fileNameH) . '.' . $extensionH;
                $sName = 's_'.md5(time() . $fileNameH) . '.' . $extensionH;
                $img = Image::make($request->file('rImage')->path());

                $img->resize(246, 155)->save($path . '/' . $hName);
                $img->resize(84, 64)->save($path . '/' . $sName);
                $blog->recent_image = $hName;
                $blog->small_image = $sName;
            }

            $blog->save();

            if ($request->has('tags')) {
                $tags = explode(',', $request->get('tags'));
                foreach ($tags as $tag) {
                    $t = new Tags();
                    $t->blog_id = $blog->id;
                    $t->name = $tag;
                    $t->save();
                }
            }

            return redirect(route('adminAddBlogHtml'));
        }
    }

    public function show() {
        $popularPost = Blogs::where('is_archived', false)->latest()->take(5)->orderBy('views', 'desc')->get();
        $property = Property::featuredProperty(5);
        $blogs = Blogs::all()->where('is_archived', false);
        return view('frontEnd.views.Blogs.blogs', compact('blogs', 'popularPost', 'property'));
    }

    public function blogDetail(Blogs $blog) {
        $blog->views = ($blog->views + 1);
        $blog->save();
        $popularPost = Blogs::where('id', '!=', $blog->id)->where('is_archived', false)->latest()->take(5)->orderBy('views', 'desc')->get();
        $related_post = Blogs::where('id', '!=', $blog->id)->where('is_archived', false)->where('category_id', $blog->category_id)->latest()->take(3)->get();
        $property = Property::featuredProperty(5);
        if ($related_post)
            $related_post = Blogs::where('id', '!=', $blog->id)->where('is_archived', false)->latest()->take(3)->get();
        return view('frontEnd.views.Blogs.blog_detail', compact('blog', 'related_post', 'popularPost', 'property'));
    }

    public function addBlogComment(Request $request) {
        $comment = new Comments();

        $comment->blog_id = $request->get('blog_id');
        $comment->email = $request->get('email');
        $comment->name = $request->get('name');
        $comment->subject = $request->get('subject');
        $comment->message = $request->get('message');
        $comment->save();
        return redirect(route('blogDetail', $request->get('blog_id')));
    }

    public function editBlog(Request $request, Blogs $blog)
    {
        $categories = Category::all()->where('is_active', true);
        if ($request->getMethod() == "GET") {
            return view('Admin.views.Blogs.blog_edit', compact('categories', 'blog'));
        } else {
            $blog->user_id = auth()->user()->id;
            $blog->category_id = $request->get('category');
            $blog->title = $request->get('title');
            $blog->meta_title = $request->get('metaTitle');
            $blog->slug = $request->get('slug');
            $blog->summary = $request->get('summary');
            $blog->content = $request->get('content');

            $path = public_path() . '/BlogsImages';
            if ($request->hasfile('fImage')) {
                $fName = $request->file('fImage')->getClientOriginalName();
                $fileNameF = pathinfo($fName, PATHINFO_FILENAME);
                $extensionF = pathinfo($fName, PATHINFO_EXTENSION);
                $fName = md5(time() . $fileNameF) . '.' . $extensionF;
                if ($request->file('fImage')->move($path, $fName)) {
                    $img = Image::make($path . '/' . $fName);
                    $img->resize(787, 344);
                    $img->save($path . '/' . $fName);
                }
                $blog->banner_image = $fName;
            }

            if ($request->hasfile('rImage')) {
                $hName = $request->file('rImage')->getClientOriginalName();
                $fileNameH = pathinfo($hName, PATHINFO_FILENAME);
                $extensionH = pathinfo($hName, PATHINFO_EXTENSION);
                $hName = md5(time() . $fileNameH) . '.' . $extensionH;
                $sName = 's_' . md5(time() . $fileNameH) . '.' . $extensionH;
                $img = Image::make($request->file('rImage')->path());

                $img->resize(246, 155)->save($path . '/' . $hName);
                $img->resize(84, 64)->save($path . '/' . $sName);
                $blog->recent_image = $hName;
                $blog->small_image = $sName;
            }

            $blog->save();

            if ($request->has('tags')) {
                Tags::where('blog_id', $blog->id)->delete();
                $tags = explode(',', $request->get('tags'));
                foreach ($tags as $tag) {
                    $t = new Tags();
                    $t->blog_id = $blog->id;
                    $t->name = $tag;
                    $t->save();
                }
            }
        }
        return redirect(route('adminAddBlogHtml'));
    }

    public function deleteBlog(Blogs $blog) {
        $blog->is_archived = true;
        $blog->save();
        return redirect(route('adminBlogsList'));
    }

    public function addBlogCategory(Request $request) {
        if ($request->getMethod() == 'GET') {
            return view('Admin.views.Blogs.category_add');
        }

        $cat = new Category();
        $cat->name = $request->get('title');
        $cat->meta_title = $request->get('metaTitle');
        $cat->slug = $request->get('slug');
        $cat->save();

        return back();
    }

    public function showCategory() {
        $categories = Category::all()->sortByDesc('id');

        return view('Admin.views.Blogs.category_list', compact('categories'));
    }

    public function changeCategoryStatus(Category $cat) {
        $cat->is_active = !$cat->is_active;
        $cat->save();
        return redirect(route('showCategory'));
    }

}
