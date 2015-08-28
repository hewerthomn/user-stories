<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Bug;
use App\Project;
use App\Http\Requests\BugStoreRequest;
use App\Http\Requests\BugUpdateRequest;
use App\Http\Controllers\Controller;
use Notification;

class BugsController extends Controller
{
    public function __construct(Bug $bug, Project $project)
    {
        $this->bug = $bug;
        $this->project = $project;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $v['title'] = 'Report bug';
        $v['projects'] = $this->project->lists('name', 'id');

        if ($request->has('project_id'))
        {
            $v['project'] = $this->project->findOrFail($request->input('project_id'));
        }

        return view('bugs.create', $v);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(BugStoreRequest $request)
    {
        $bug = new Bug;
        $bug->project_id = $request->input('project_id');
        $bug->title = $request->input('title');
        $bug->pre_conditions = $request->input('pre_conditions');
        $bug->version = $request->input('version');
        $bug->steps_to_reproduce = $request->input('steps_to_reproduce');
        $bug->description = $request->input('description');
        $bug->desired_situation = $request->input('desired_situation');

        try {
            if ($bug->save())
            {
                Notification::success('Bug reported!');
                return redirect()->route('bugs.show', $bug->id);
            }
            Notification::error('Failed to report bug.');
        } catch (Exception $e) {
            Notification::error($e->getMessage());
        }

        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $v['title'] = 'Bug #'.$id;
        $v['bug'] = $this->bug->findOrFail($id);

        return view('bugs.show', $v);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $v['title'] = 'Edit bug';
        $v['bug'] = $this->bug->find($id);

        return view('bugs.edit', $v);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(BugUpdateRequest $request, $id)
    {
        $bug = $this->bug->findOrFail($id);
        $bug->title = $request->input('title');
        $bug->pre_conditions = $request->input('pre_conditions');
        $bug->version = $request->input('version');
        $bug->steps_to_reproduce = $request->input('steps_to_reproduce');
        $bug->description = $request->input('description');
        $bug->desired_situation = $request->input('desired_situation');

        try {
            if ($bug->save())
            {
                Notification::success('Bug edited!');
                return redirect()->route('bugs.show', $bug->id);
            }
            Notification::error('Failed to edit bug.');
        } catch (Exception $e) {
            Notification::error($e->getMessage());
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        $bug = $this->bug->findOrFail($id);

        try {
            if($bug->delete())
            {
                Notification::success('Bug deleted!');
                return redirect()->route('projects.show', $request->input('project_id'));
            }

            Notification::error('Failed to delete bug');
        } catch (Exception $e) {
            Notification::error($e->getMessage());
        }

        return back();
    }
}
