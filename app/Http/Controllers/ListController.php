<?php

namespace App\Http\Controllers;

use App\Models\ListModel;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index() {
        $lists = ListModel::all();
        return view('lists.index', ['listsForView' => $lists]);
    }

    public function create() {
        return view("lists.create");
    }

    public function store(Request $request) {
        $data = $request->all();
        if($request->hasfile('image')) {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move(public_path().'/images/uploads', $filename);           
            $data['image'] = $filename;
        }
        // dd($data);
        $newData = ListModel::create([
            'tasks' => $data['tasks'],
            'status' => $data['status'],
            'priority' => $data['priority'],
            'image' => $data['image'],
        ]);

        return redirect()->route('lists_index')->withMessage("Successfully submitted new task");
    }

    public function edit($list_id) {
        $task = ListModel::where("id", $list_id)->first();
        return view('lists.edit', compact("task"));
        // compact("task") : ["task" => $task]
    }

    public function update(Request $request) {
        $data = $request->all();
        $task = ListModel::where("id", $data['task_id'])->first();
        $task->update([
            'tasks' => $data['tasks'],
            'status' => $data['status'],
            'priority' => $data['priority'],
        ]);

        return redirect()->route("lists_index")->withMessage("Successfully updated");
    }

    public function destroy($task_id) {
        // dd($task_id);
        $task = ListModel::where("id", $task_id)->first();
        $task->delete();
        
        return redirect()->route("lists_index")->withMessage("Successfully deleted");
    }
}
