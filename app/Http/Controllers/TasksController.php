<?php

namespace App\Http\Controllers;
use DB;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $people = Person::all();
      $people = Person::join('tasks', 'people.id', '=' , 'tasks.person_id')
                ->get(['people.id', 'people.name', 'people.email','tasks.status','tasks.deadline']);
       
        
        return view('index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
      
        $people = new Person($this->validatePerson());
        $people -> save();
       

        return redirect('/persons')->with('completed', 'Person has been saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $tasks)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $people)
    {
        $people = Person::findOrFail();
        return view('edit', compact('people'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        $updateData = $request->validate([

            'name' => 'required',
            'email' => 'requored',
            'status' => 'required'
        ]);

        Person::whereId()->update($updateData);
        return redirect('/persons')->with('completed','Person has been udpated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $people)
    {
        $people = Person::findOrFail();
        $people -> delete();

        return redirect('/persons')->with('completed', 'Person has been deleted!');
    }

    protected function validatePerson(){
        return request()->validate([

            'name'=> 'required',
            'email' => 'required',
            'deadline' => 'required'
        ]);
    }
}
