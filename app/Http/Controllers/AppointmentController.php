<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Favorite;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Appointment $appointements)
    {
        $user = User::find(Auth::user()->id);
        $user->old_appointments_number =  $user->new_appointments_number;
        $user->save();

        if(Auth::user()->is_admin){
            $favorite = new Favorite();
            $appointments_requests = $favorite->where('had_appointment',0);

            return view('appointments.index',[
               'appointments'=>$appointements->paginate(4),
                'appointments_requests'=>$appointments_requests->paginate(4)
            ]);
        }
        $user = User::find(Auth::user()->id);
        $user->old_appointments_number =  $user->new_appointments_number;
        $user->save();

        return    view('appointments.index',['appointments'=>$appointements
        ->where('user_id',Auth::user()->id)->paginate(4),
            'appointments_requests'=>[]
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }
    public function createAppointment(Favorite $appointment_request)
    {

        return view('appointments.create',['appointment_request'=>$appointment_request]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAppointment(Request $request , Favorite $appointment_request,Appointment $appointment)
    {
        $user_id = $appointment_request->user_id;
        $owner_id = $appointment_request->house->owner->id;
        $appointment->create(array_merge($request->all(),['user_id'=>$user_id,'owner_id'=>$owner_id]));

        $appointment_request->had_appointment = 1;
        $appointment_request->save();

        $user = User::find($user_id);
        $user->new_appointments_number =  $user->new_appointments_number+1;
        $user->save();

        $this->sendEmail($user,'تم تحديد موعد لك مع أحد أصحاب المنازل راجع حسابك' );
        return redirect()->route('appointment.index')->withStatus('تم إضافة الموعد بنجاح');
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
    public function edit(Appointment $appointment)
    {
       return view('appointments.edit',['appointment'=>$appointment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        $appointment->update($request->all());

        $user_id = $appointment->user_id;
        $user = User::find($user_id);
        $this->sendEmail($user, 'تم تغيير موعد لك مع أحد أصحاب المنازل راجع حسابك' );

        return redirect()->route('appointment.index')->withStatus('تم تعديل الموعد بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointment.index')->withStatus('تم الغاء الموعد بنجاح');
    }

    public function sendEmail($user ,$email_message){



        $to_name = $user->name;

        $to_email = str_replace(' ', '', $user->email);
        $data = array('name'=>$email_message, "body" => "موعد جديد");
        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('موعد');
            $message->from('ikarirealestate@gmail.com','موعد جديد');
        });


    }
}
