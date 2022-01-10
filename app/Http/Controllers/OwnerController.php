<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Owner $owners)
    {
        return view('owners.index', ['owners' => $owners->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('owners.create');
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
            'first_name'=>['required','min:2'],
           'last_name'=>['required','min:2'] ,
            'phone_no'=>['required','min:10','max:15'],
            'address'=>['required']
        ]);

        Owner::create($request->all());
        return redirect()->route('owner.index')->withStatus('تم اضافة المالك بنجاح');

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
    public function edit(Owner $owner)
    {
        return view('owners.edit',['owner'=>$owner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {

        $this->validate($request,[
            'first_name'=>['required','min:2'],
            'last_name'=>['required','min:2'] ,
            'phone_no'=>['required','min:10','max:15'],
            'address'=>['required']
        ]);

        $owner->update($request->all());
        return redirect()->route('owner.index')->withStatus('تم تعديل معلومات المالك بمجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $owner=Owner::find($id);
        $owner->delete();
        return redirect()->route('owner.index')->withStatus('تم حذف المالك بنجاح');
    }
}
