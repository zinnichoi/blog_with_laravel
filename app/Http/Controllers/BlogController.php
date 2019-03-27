<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Services\BlogServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    private $blogServiceInterface;

    /**
     * BlogController constructor.
     * @param BlogServiceInterface $blogServiceInterface
     */
    public function __construct(BlogServiceInterface $blogServiceInterface)
    {
        $this->blogServiceInterface = $blogServiceInterface;
    }

    /**
     * return view to create new blog
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $id = Auth::user()->getAuthIdentifier();
        return view('blog\create_blog', ['id' => $id]);
    }

    /**
     * Get input data and create new blog
     * @param BlogRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BlogRequest $request)
    {
        $result = $this->blogServiceInterface->create($request->toBlog());
        if ($result) {
            return redirect()->intended('home')->with('message', trans('blog.create_complete'));
        }
        return redirect()->back()->with('message', trans('blog.create_fail'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $blogs = $this->blogServiceInterface->getAll();
        return view('blog/index', compact('blogs'));
    }

    /**
     * @param Blog $blog
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Blog $blog)
    {
        $action = 'view';
        if ($this->blogServiceInterface->canDo($action, $blog)) {
            return view('blog/single', compact('blog'));
        }
        return redirect()->back()->with('message', trans('blog.can_not_view'));
    }

    /**
     * @param Blog $blog
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Blog $blog)
    {
        if ($this->blogServiceInterface->canDo('update', $blog)) {
            return view('blog/edit', ['blog' => $blog]);
        }
        return redirect()->back()->with('message', trans('blog.can_not_edit'));
    }

    /**
     * @param BlogRequest $request
     * @param Blog $blog
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        $data = $request->all();
        $result = $this->blogServiceInterface->update($blog, $data);
        if ($result) {
            return redirect()->intended('home')->with('message', trans('blog.update_complete'));
        }
        return redirect()->intended('home')->with('message', trans('blog.update_fail'));
    }

    /**
     * @param Blog $blog
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Blog $blog)
    {
        $action = 'delete';
        if ($this->blogServiceInterface->canDo($action, $blog)) {
            $this->blogServiceInterface->delete($blog);
            return redirect()->intended('home')->with('message', trans('blog.delete_complete'));
        }
        return redirect()->intended('home')->with('message', trans('blog.delete_fail'));
    }


    /**
     * Filter by age limit
     * @param int $age
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function filterByAgeLimit(int $age)
    {
        $column = 'age_limit';
        $blogs = $this->blogServiceInterface->filter($column, $age);
        return view('blog.filter', compact('blogs', 'age'));
    }

    /**
     * Filter by gender limit
     * @param int $gender
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function filterByGenderLimit(int $gender)
    {
        $column = 'gender_limit';
        $blogs = $this->blogServiceInterface->filter($column, $gender);
        return view('blog.filter', compact('blogs', 'gender'));
    }

    /**
     * Search blog
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $searchData = $request->except('_token');
        $blogs = $this->blogServiceInterface->search($searchData);
        return view('blog/search', compact('blogs', 'searchData'));
    }
}
