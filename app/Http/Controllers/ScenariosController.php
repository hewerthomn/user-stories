<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Story;
use App\Scenario;
use App\Http\Requests\ScenarioStoreRequest;
use App\Http\Controllers\Controller;
use Notification;

class ScenariosController extends Controller
{
    public function __construct(Scenario $scenario, Story $story)
    {
        $this->scenario = $scenario;
        $this->story = $story;
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
        $v['title'] = 'Add new scenario to story';

        if ($request->has('story_id'))
        {
            $v['story'] = $this->story->findOrFail($request->input('story_id'));
        }

        return view('scenarios.create', $v);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ScenarioStoreRequest $request)
    {
        $scenario = new Scenario;
        $scenario->story_id = $request->input('story_id');
        $scenario->title = $request->input('title');
        $scenario->given = $request->input('given');
        $scenario->when = $request->input('when');
        $scenario->then = $request->input('then');

        if ($scenario->save())
        {
            Notification::success('New scenario added!');
            return redirect()->route('projects.show', ['id' => $scenario->story->project_id, 'story_id' => $scenario->story_id]);
        }

        Notification::error('Failed to add new scenario.');
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
        $v['title'] = 'Edit scenario of story';
        $v['scenario'] = $this->scenario->findOrFail($id);

        return view('scenarios.edit', $v);
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
        //
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
