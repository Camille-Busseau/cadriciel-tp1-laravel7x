<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::Select()
            ->orderBy('name')
            ->paginate(10);
        return view('maisonneuve.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::selectCity();
        return view('maisonneuve.create', ['cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newStudent = Student::create([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'bday' => $request->bday,
            'city_id' => $request->city_id,
        ]);

        // redirect permet de reprendre la route du début, permet le traitement de show du début VS return view('blog.show', ['blogPost'=> $newPost]) qui s'y rend directement.
        return redirect(route('maisonneuve.show', $newStudent->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $cities = City::selectCity();
        return view('maisonneuve.show', ['student' => $student, 'cities' => $cities]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $cities = City::selectCity();
        return view('maisonneuve.edit', ['student' => $student, 'cities' => $cities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'bday' => $request->bday,
            'city_id' => $request->city_id
        ]);
        $cities = City::selectCity();

        return redirect(route('maisonneuve.show', $student->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect(route('maisonneuve.index'));
    }
}
