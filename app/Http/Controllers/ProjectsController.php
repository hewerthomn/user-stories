<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Story;
use App\StatusStory;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Controllers\Controller;
use Auth, Notification;

class ProjectsController extends Controller
{
    public function __construct(Project $project, Story $story, StatusStory $statusStory)
    {
        $this->project = $project;
        $this->story = $story;
        $this->statusStory = $statusStory;
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
        $project->uid = str_random(12);
        $project->owner_id = Auth::user()->id;

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
    public function show(Request $request, $uid)
    {
        $v['project'] = $this->project->findByUid($uid);
        $v['status'] = $this->statusStory->get();

        $v['title'] = trans('app.project.single');

        return view('projects.show', $v);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($uid)
    {
        $v['title'] = trans('app.project.edit');
        $v['project'] = $this->project->findByUid($uid);

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

        if ($project->save())
        {
            Notification::success(trans('messages.project.edited'));
            return redirect()->route('projects.show', $project->uid);
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
