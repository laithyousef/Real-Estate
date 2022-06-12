<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\House;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favorites=Favorite::all()->where('user_id',Auth::user()->id);
        return view('favorites.index',['favorites'=>$favorites]);
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
    public function store( )
    {

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
    public function edit($id)
    {
        $admin = User::where('is_admin',1)->first();
        $admin->new_appointments_number =  $admin->new_appointments_number + 1;
        $admin->save();

        $favorite = Favorite::where('house_id',$id)->where('user_id',Auth::user()->id)->first();

        if ($favorite === null) {

            $favorite =new Favorite();
            $favorite->house_id=$id;
            $favorite->user_id=Auth::user()->id;
            $favorite->save();
            return redirect()->route('house.index')->withStatus('تمت اضافة المنزل إلى المفضلة');
        }

        return redirect()->route('house.index')->withStatus('المنزل موجود مسبقا ضمن المفضلة');
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
    public function destroy(Favorite $favorite)
    {
        $favorite->delete();
        return redirect()->route('favorite.index')->withStatus('تم إزالة المنزل من المفضلة');
    }
}
