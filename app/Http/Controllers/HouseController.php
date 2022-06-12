<?php

namespace App\Http\Controllers;

use App\HouseSearch\HouseSearch;
use App\HouseSearchHistoryFilter\HouseSearchHistoryFilter;
use App\Models\CollegeSpeciality;
use App\Models\House;
use App\Models\HouseImage;
use App\Models\HouseSearchesWithColleague;
use App\Models\HouseVideo;
use App\Models\Owner;
use App\Models\Place;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class HouseController extends Controller
{


    public function __construct(){

        $this->middleware('admin')->except(['index','show','search','search2','viewUsers']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $houses = House::orderBy('created_at','desc')->paginate(4);
        $places = Place::all();
        $collegeSpecialities = CollegeSpeciality::all();
        return view('houses.index',compact('houses', 'places', 'collegeSpecialities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Place $places,Owner $owners)
    {

        return view('houses.create',['places'=>$places->all(),'owners'=>$owners->all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,House $house)
    {



        $this->houseValidator($request);
        $added_house=  $house::create($request->all());

        if($request->hasFile('houseImages')){
            foreach($request->houseImages as $house_image){

                //get the file name with the extension
                $fileNameWithExt = $house_image->getClientOriginalName();


                //Get just name
                $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
                //Get the extension

                $extension = $house_image->getClientOriginalExtension();
                $fileNameToStore=$fileName.'_'.time().'.'.$extension;
                // store image to directory.
                $path = $house_image->storeAs('houses_images',$fileNameToStore,'public');

                // store image to database.
                $image=new HouseImage();
                $image->create(['img_url'=>$path,'house_id'=>$added_house->id]);

            }
        }

        if($request->hasFile('houseVideo')){
            //get the file name with the extension
            $fileNameWithExt =  $request->file('houseVideo')->getClientOriginalName();


            //Get just name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //Get the extension

            $extension =  $request->file('houseVideo')->getClientOriginalExtension();
            $fileNameToStore=$fileName.'_'.time().'.'.$extension;
            // store image to directory.
            $path =  $request->file('houseVideo')->storeAs('house_videos',$fileNameToStore,'public');

            // store image to database.
            $video=new HouseVideo();
            $video->create(['video_url'=>$path,'house_id'=>$added_house->id]);
        }





        return redirect()->route('house.index')->withStatus('تم اضافة المنزل بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(House $house)
    {

        return view('houses.show',['house'=>$house]);
    }

    public function search(Request $request)
    {
        $founded_houses = HouseSearch::apply($request);

            $houses = $founded_houses->paginate($founded_houses->count()) ;
            $places = Place::all();
            $collegeSpecialities = CollegeSpeciality::all();
            return view('houses.index',compact('houses', 'places', 'collegeSpecialities'));

    }

    public function search2(Request $request,HouseSearchesWithColleague $houseSearchesWithColleague)
    {
        $user_id= Auth::user()->id;

         $similarSearches = HouseSearchHistoryFilter::apply($request);

        $similarSearchesExcluded =  $similarSearches->whereNotIn('user_id', array(Auth::user()->id))
            ->get()->unique('user_id');
         $founded_houses = HouseSearch::apply($request);

         $colleagues_number = $similarSearchesExcluded->count();


          $houseSearchesWithColleague::create($request->all()+['user_id'=>$user_id]);


            $this->sendEmails($similarSearchesExcluded , $colleagues_number);



        return view('houses.index2',[
            'houses'=>$founded_houses->paginate($founded_houses->count()),
            'colleagues_number'=>$colleagues_number,
            'similar_searches'=>$similarSearchesExcluded
        ]);


    }
public  function viewUsers( $users_searches ){

        return $users_searches;
}


public function sendEmails($users ,$colleagues_number){

        foreach ($users as $user){
            $the_user = $user->user;

            if ($user->colleagues_number == $colleagues_number){
                $data = array('name'=>' لقد اكتمل عدد الزملاء اللذين يتوافق طلبهم مع طلبك قم بتفقد حسابك', "body" => "اكتمل العدد");
            }
            else{
                $data = array('name'=>' أشخاص يتطابق طلبهم مع طلبك قم بتفقد حسابك'.$colleagues_number, "body" => "مستخدم جديد");
            }

            $the_user->new_notification_number = $the_user->new_notification_number + 1;
            $the_user->save();

            $to_name = $user->user->name;

            $to_email = str_replace(' ', '', $user->user->email);

            Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                    ->subject('مستخدم جديد يبحث عن منزل مع زميل يوافق بحثك');
                $message->from('ikarirealestate@gmail.com','مستخدم جديد');
            });
    }

}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(House $house,Place $places,Owner $owners)
    {
        return view('houses.edit',['house'=>$house,'places'=>$places->all(),'owners'=>$owners->all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, House $house)
    {

      //  $this->houseValidator($request);
        $house->update($request->all());

        return redirect()->route('house.index')->withStatus('تم تعديل معلومات المنزل بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(House $house)
    {
        $house->delete();
        return redirect()->route('house.index')->withStatus('تم حذف المنزل بنجاح');
    }

    public function houseValidator(Request $request){
        $this->validate($request,[
            'price'=>'required',
            'space'=>'required',
            'direction'=>'required',
            'floor_no'=>'required',
            'rooms_no'=>'required',
            'place_id'=>'required',
            'owner_id'=>'required',

        ]);
    }



}
