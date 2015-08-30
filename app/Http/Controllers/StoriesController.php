<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Story;
use App\Project;
use App\StatusStory;
use App\Http\Requests\StoryStoreRequest;
use App\Http\Requests\StoryUpdateRequest;
use App\Http\Controllers\Controller;
use Notification;

class StoriesController extends Controller
{
    public function __construct(Story $story, Project $project, StatusStory $statusStory)
    {
        $this->story = $story;
        $this->project = $project;
        $this->statusStory = $statusStory;
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
    public function create(Request $request, $project_uid = null)
    {
        $v['title'] = trans('app.story.new');
        $v['projects'] = $this->project->selectList();
        $v['status'] = $this->statusStory->selectList();

        if ($project_uid)
        {
            $v['project'] = $this->project->findByUid($project_uid);
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
        $project = $this->project->findByUid($request->input('project_uid'));

        $story = new Story;
        $story->project_id = $project->id;
        $story->uid = str_random(12);
        $story->title = $request->input('title');
        $story->who = $request->input('who');
        $story->what = $request->input('what');
        $story->why = $request->input('why');
        $story->status_id = $request->input('status_id');

        if ($story->save())
        {
            Notification::success(trans('messages.story.created'));
            return redirect()->route('stories.show', ['uid' => $story->uid]);
        }

        Notification::error(trans('messages.story.createFailed'));
        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($uid)
    {
        $v['story'] = $this->story->findByUid($uid);

        $v['title'] = trans('app.story.single');

        return view('stories.show', $v);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($uid)
    {
        $v['title'] = trans('app.story.edit');
        $v['story'] = $this->story->findByUid($uid);
        $v['project'] = $v['story']->project;
        $v['status'] = $this->statusStory->selectList();

        return view('stories.edit', $v);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(StoryUpdateRequest $request, $uid)
    {
        $story = $this->story->findByUid($uid);
        $story->title = $request->input('title');
        $story->who = $request->input('who');
        $story->what = $request->input('what');
        $story->why = $request->input('why');
        $story->status_id = $request->input('status_id');

        if ($story->save())
        {
            Notification::success(trans('messages.story.edited'));
            return redirect()->route('stories.show', ['uid' => $story->uid]);
        }

        Notification::error(trans('messages.story.editFailed'));
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
                Notification::success(trans('messages.story.deleted'));
                return redirect()->route('projects.show', $request->input('project_id'));
            }

            Notification::error(trans('messages.story.deleteFailed'));
        } catch (Exception $e) {
            Notification::error($e->getMessage());
        }

        return back();
    }
}
