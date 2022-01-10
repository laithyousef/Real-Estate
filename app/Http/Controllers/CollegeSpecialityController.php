<?php

namespace App\Http\Controllers;

use App\Models\CollegeSpeciality;
use Illuminate\Http\Request;

class CollegeSpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CollegeSpeciality $collegeSpecialities)
    {
        return view('college_specialities.index',['college_specialities'=>$collegeSpecialities->paginate(4)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('college_specialities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
           'name'=>'required'
        ]);
        CollegeSpeciality::create(($request->all()));
        return redirect()->route('college_speciality.index')->withStatus('تم اضافة الاختصاص بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CollegeSpeciality $collegeSpeciality)
    {
        return view('college_specialities.edit',['college_Speciality'=>$collegeSpeciality]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CollegeSpeciality $collegeSpeciality)
    {
        $this->validate($request,[
            'name'=>'required'
        ]);
        $collegeSpeciality->update($request->all());
        return redirect()->route('college_speciality.index')->withStatus('تم تعديل الاختصاص بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CollegeSpeciality $collegeSpeciality)
    {
        $collegeSpeciality->delete();
        return redirect()->route('college_speciality.index')->withStatus('تم حذف الاختصاص بنجاح');
    }
}
