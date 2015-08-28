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
     * dashboard
     *
     * @return Response
     */
    public function dashboard()
    {
        $v['title'] = trans('app.dashboard');
        $v['totalProjects'] = $this->project->count();
        $v['totalStories'] = $this->story->count();
        $v['totalBugs'] = $this->bug->count();

        return view('home.dashboard', $v);
    }

    public function profile()
    {
        $v['title'] = 'Profile';

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
