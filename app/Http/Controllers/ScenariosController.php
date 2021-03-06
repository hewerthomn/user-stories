<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Story;
use App\Scenario;
use App\ScenarioDetail;
use App\Http\Requests\ScenarioStoreRequest;
use App\Http\Requests\ScenarioUpdateRequest;
use App\Http\Controllers\Controller;
use Notification;

class ScenariosController extends Controller
{
    public function __construct(Scenario $scenario, Story $story, ScenarioDetail $scenarioDetail)
    {
        $this->scenario = $scenario;
        $this->scenarioDetail = $scenarioDetail;
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
    public function create(Request $request, $story_id)
    {
        $v['title'] = trans('app.scenario.new');
        $v['story'] = $this->story->findByUid($story_id);

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
            $details = $request->input('details');
            if (count($details) > 0)
            {
                foreach ($details as $key => $detail)
                {
                    $details[$key]['scenario_id'] = $scenario->id;
                    $details[$key]['created_at'] = new \DateTime;
                    $details[$key]['updated_at'] = new \DateTime;
                }
                $this->scenarioDetail->insert($details);
            }

            Notification::success(trans('messages.scenario.created'));
            return redirect()->route('stories.show', ['uid' => $scenario->story->uid]);
        }

        Notification::error(trans('messages.scenario.createFailed'));
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
    public function edit($story_id, $id)
    {
        $v['title'] = trans('app.scenario.edit');
        $v['scenario'] = $this->scenario->findOrFail($id);
        $v['story'] = $v['scenario']->story;

        return view('scenarios.edit', $v);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ScenarioUpdateRequest $request, $id)
    {
        $scenario = $this->scenario->findOrFail($id);
        $scenario->title = $request->input('title');
        $scenario->given = $request->input('given');
        $scenario->when = $request->input('when');
        $scenario->then = $request->input('then');

        if ($scenario->save())
        {
            $scenario->details()->delete();

            $details = $request->input('details');
            if (count($details) > 0)
            {
                foreach ($details as $key => $detail)
                {
                    $details[$key]['scenario_id'] = $scenario->id;
                    $details[$key]['created_at'] = new \DateTime;
                    $details[$key]['updated_at'] = new \DateTime;
                }
                $this->scenarioDetail->insert($details);
            }

            Notification::success(trans('messages.scenario.edited'));
            return redirect()->route('stories.show', ['uid' => $scenario->story->uid]);
        }

        Notification::error(trans('messages.scenario.editFailed'));
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
        try {
            $scenario = $this->scenario->findOrFail($id);
            $story_id = $scenario->story_id;
            $project_id = $scenario->story->project_id;

            if ($scenario->delete())
            {
                Notification::success(trans('messages.scenario.deleted'));
                return redirect()->route('projects.show', ['id' => $scenario->story->project_id, 'story_id' => $scenario->story_id]);
            }

            Notification::error(trans('messages.scenario.deleteFailed'));
        } catch (Exception $e) {
            Notification::error($e->getMessage());
        }

        return back();
    }
}
