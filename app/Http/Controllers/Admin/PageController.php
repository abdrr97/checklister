<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PageController extends Controller
{

    public function index(): View
    {
        $pages = Page::all(); 

        return view('pages.index', compact('pages'));
    }

    public function create(): View
    {
        return view('pages.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Page::create($request->validated()); 

        return redirect()->route('pages.index');
    }

    public function show(Page $page): View
    {
        return view('pages.show',compact('pages'));
    }

    public function edit(Page $page): View
    {
        return view('pages.edit',compact('pages'));
    }

    public function update(Request $request, Page $page): RedirectResponse
    {
       $page->update($request->validated()); 

        return redirect()->route('pages.index',compact('pages'));
    }

    public function destroy(Page $page): RedirectResponse
    {
        $page->delete();

        return redirect()->route('pages.index');
    }
}
