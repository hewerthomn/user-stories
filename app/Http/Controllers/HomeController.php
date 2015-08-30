<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Story;
use App\Bug;
use App\Http\Controllers\Controller;
use Config, Session;


class HomeController extends Controller
{
    public function __construct(Project $project, Story $story, Bug $bug)
    {
        $this->project = $project;
        $this->story = $story;
        $this->bug = $bug;
    }

    /**
     * index
     *
     * @return Response
     */
    public function index()
    {
        $v['title'] = trans('app.home');

        $v['favoritedProjects'] = $this->project->get();
        $v['myProjects'] = $this->project->get();

        return view('home.index', $v);
    }

    public function profile()
    {
        $v['title'] = trans('app.profile');

        return view('home.profile', $v);
    }

    public function lang($locale)
    {
        if (array_key_exists($locale, Config::get('languages')))
        {
            Session::set('appLocale', $locale);
        }

        return back();
    }
}
