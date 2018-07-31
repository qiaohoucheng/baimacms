<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function __construct()
    {

    }

    //:get
    public function index()
    {
        return view('admin.default.website.index');
    }
    //:get    :route /website/create
    public function create()
    {

    }
    //:post   :route /website
    public function store()
    {

    }
    //:delete  :route /website/{id}
    public function destroy()
    {

    }
    //:get  :route /website/{id}/edit
    public function edit()
    {

    }
    //:put or patch  :route /website/{id}
    public function save()
    {

    }
    //:get   :route /webiste/{id}
    public function show()
    {

    }
}
