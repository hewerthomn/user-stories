<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Story;
use App\Project;
use App\Http\Requests\StoryStoreRequest;
use App\Http\Requests\StoryUpdateRequest;
use App\Http\Controllers\Controller;
use Notification;

class StoriesController extends Controller
{
    public function __construct(Story $story, Project $project)
    {
        $this->story = $story;
        $this->project = $project;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $v['title'] = 'Add new story';
        $v['projects'] = $this->project->lists('name', 'id');

        if ($request->has('project_id'))
        {
            $v['project'] = $this->project->findOrFail($request->input('project_id'));
        }

        return view('stories.create', $v);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(StoryStoreRequest $request)
    {
        $story = new Story;
        $story->project_id = $request->input('project_id');
        $story->title = $request->input('title');
        $story->who = $request->input('who');
        $story->what = $request->input('what');
        $story->why = $request->input('why');

        if ($story->save())
        {
            Notification::success('New story added!');
            return redirect()->route('projects.show', ['id' => $story->project_id, 'story_id' => $story->id]);
        }

        Notification::error('Failed to add new story.');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $v['title'] = 'Edit Story';
        $v['story'] = $this->story->findOrFail($id);

        return view('stories.edit', $v);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(StoryUpdateRequest $request, $id)
    {
        $story = $this->story->findOrFail($id);
        $story->title = $request->input('title');
        $story->who = $request->input('who');
        $story->what = $request->input('what');
        $story->why = $request->input('why');

        if ($story->save())
        {
            Notification::success('Story saved!');
            return redirect()->route('projects.show', ['id' => $story->project_id, 'story_id' => $id]);
        }

        Notification::error('Failed to add new story.');
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
        $story = $this->story->findOrFail($id);

        try {
            if($story->delete())
            {
                Notification::success('Story deleted');
                return redirect()->route('projects.show', $request->input('project_id'));
            }

            Notification::error('Failed to delete story');
        } catch (Exception $e) {
            Notification::error($e->getMessage());
        }

        return back();
    }
}
