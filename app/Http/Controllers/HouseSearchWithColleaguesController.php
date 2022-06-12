<?php

namespace App\Http\Controllers;

use App\HouseSearchHistoryFilter\HouseSearchHistoryFilter;
use App\Models\HouseSearchesWithColleague;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HouseSearchWithColleaguesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( )
    {
        $search_history = HouseSearchesWithColleague::get()->unique('user_id');
      return view('search_history.index',[ 'search_history'=> $search_history ]);
    }

    public function index2( )
    {
        $user_id = Auth::user()->id;
        $search_history = HouseSearchesWithColleague::where('user_id',$user_id)->get();
        $user = User::find($user_id);

        $user->old_notification_number = $user->new_notification_number;
        $user->save();

        return view('search_history.index2',[
            'search_history'=>
                $search_history
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(HouseSearchesWithColleague $houseSearchesWithColleague)
    {


        $myRequest = new Request();
        $myRequest->setMethod('POST');
        $myRequest->request->add(
            [
            'colleagues_number' => $houseSearchesWithColleague->colleagues_number,
            'lowest_price'=>$houseSearchesWithColleague->lowest_price,
                'highest_price'=>$houseSearchesWithColleague->highest_price,
                'place_id'=>$houseSearchesWithColleague->place_id,
                'rooms_number'=> $houseSearchesWithColleague->rooms_number,
                'sex'=>$houseSearchesWithColleague->sex,
                'are_students'=>$houseSearchesWithColleague->are_students
            ]
        );


    
        $similar_searches = HouseSearchHistoryFilter::apply($myRequest);
        $similarSearchesExcluded =  $similar_searches->whereNotIn('user_id', array(Auth::user()->id))
            ->get()->unique('user_id');

        $colleagues_number = $similarSearchesExcluded->count();

        return view('search_history.show',[
            'similar_searches'=>$similarSearchesExcluded,
            'colleagues_number'=>$colleagues_number,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,HouseSearchesWithColleague $houseSearchesWithColleague)
    {
        $houseSearchesWithColleague->whereIn('user_id', [$id])->delete();

        return redirect()->route('search_history.index')->withStatus('تم حذف السجل بنجاح');
    }

    public function destroy2(HouseSearchesWithColleague $search)
    {
        $search->delete();

        return redirect()->route('search_history.index2')->withStatus('تم حذف السجل بنجاح');
    }
}
