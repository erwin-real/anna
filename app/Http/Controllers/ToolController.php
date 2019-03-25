<?php

namespace App\Http\Controllers;

use App\SingleTool;
use App\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() { $this->middleware('auth'); }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('pages.tools.index')->with('tools', Tool::orderBy('updated_at', 'desc')->paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() { return view('pages.tools.create'); }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'numbers' => 'required',
            'periods' => 'required',
            'names' => 'required'
        ]);

        $tool = new Tool(array( 'name' => $validatedData['name'] ));
        $tool->save();

        for ($i = 0; $i < count($validatedData['names']); $i++) {
            $singleTool = new SingleTool(array(
                'tool_id' => $tool->id,
                'name' => $validatedData['names'][$i],
                'number' => $validatedData['numbers'][$i],
                'period' => $validatedData['periods'][$i]
            ));
            $singleTool->save();
        }

        return redirect('/tools')
            ->with('success', 'Added New Tool '. $validatedData['name'] .' Successfully!')
            ->with('tools', Tool::orderBy('updated_at', 'desc')->paginate(20));
    }

    /**
     * Display the specified resource.
     *
     * int id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return view('pages.tools.show')->with('tool', Tool::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        return view('pages.tools.edit')->with('tool', Tool::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required',
            'numbers' => 'required',
            'periods' => 'required',
            'names' => 'required'
        ]);

        $tool = Tool::find($id);
        $tool->name = $validatedData['name'];
        $tool->save();

        foreach ($tool->singleTools as $singleTool) $singleTool->delete();

        for ($i = 0; $i < count($validatedData['names']); $i++) {
            $singleTool = new SingleTool(array(
                'tool_id' => $tool->id,
                'name' => $validatedData['names'][$i],
                'number' => $validatedData['numbers'][$i],
                'period' => $validatedData['periods'][$i]
            ));
            $singleTool->save();
        }

        return redirect('/tools')
            ->with('success', 'Updated Tool '. $validatedData['name'] .' Successfully!')
            ->with('tools', Tool::orderBy('updated_at', 'desc')->paginate(20));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $tool = Tool::find($id);
        foreach ($tool->singleTools as $singleTool) $singleTool->delete();
        $tool->delete();

        return redirect('/tools')
            ->with('success', 'Deleted Tool Successfully!');
    }
}
