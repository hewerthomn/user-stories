<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Story;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Controllers\Controller;
use Notification;

class ProjectsController extends Controller
{
    public function __construct(Project $project, Story $story)
    {
        $this->project = $project;
        $this->story = $story;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $v['title'] = trans('app.project.plural');
        $projects = $this->project;

        $v['projects'] = $projects->get();

        return view('projects.index', $v);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $v['title'] = trans('app.project.new');

        return view('projects.create', $v);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ProjectStoreRequest $request)
    {
        $project = new Project;
        $project->name = $request->input('name');
        $project->url = $request->input('url');
        $project->about = $request->input('about');

        if ($project->save())
        {
            Notification::success(trans('messages.project.created'));
            return redirect()->route('projects.show', $project->id);
        }

        Notification::error(trans('messages.project.createFailed'));
        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Request $request, $id)
    {
        $v['title'] = trans('app.project.single').'#'.$id;
        $v['project'] = $this->project->findOrFail($id);

        if ($request->has('story_id'))
        {
            $v['story'] = $this->story->findOrFail($request->input('story_id'));
        }

        return view('projects.show', $v);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $v['title'] = trans('app.project.edit');
        $v['project'] = $this->project->findOrFail($id);

        return view('projects.edit', $v);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $project = $this->project->findOrFail($id);
        $project->name = $request->input('name');
        $project->url = $request->input('url');
        $project->about = $request->input('about');

        if ($project->save())
        {
            Notification::success(trans('messages.project.edited'));
            return redirect()->route('projects.show', $project->id);
        }

        Notification::error(trans('messages.project.editFailed'));
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
