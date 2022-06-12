@extends('layouts.app', ['activePage' => 'appointments', 'titlePage' => __('  المواعيد ')])

@section('content')
    <div style="margin-top:70px; ">
        <div style="margin: 20px" >
            <div class="row">
                <div class="col-md-12">
                    @if(Auth::user()->is_admin)
                    <div class="card">
                        <div class="card-header card-header-success">

                                <h4 class="card-title ">{{ __(' طلبات الحصول على مواعيد') }}</h4>

                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="material-icons">close</i>
                                            </button>
                                            <span>{{ session('status') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="row">


                            </div>
                                @if($appointments_requests->count() > 0)
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class=" text-success">
                                            <th>
                                                {{ __('المستخدم') }}
                                            </th>
                                            <th>
                                                {{ __('مالك المنزل') }}
                                            </th>
                                            <th>
                                                {{ __('المساحة') }}
                                            </th>
                                            <th>
                                                {{ __('الاتجاه') }}
                                            </th>
                                            <th>
                                                {{ __('الطابق') }}
                                            </th>
                                            <th>
                                                {{ __('عدد الغرف') }}
                                            </th>
                                            <th>
                                                {{ __('المنطقة') }}
                                            </th>
                                            <th class="text-right">
                                                {{ __('الأفعال') }}
                                            </th>
                                            </thead>
                                            <tbody>

                                            @foreach($appointments_requests as $appointments_request)
                                                <tr>
                                                    <td>
                                                        {{ $appointments_request->user->name }}  {{ $appointments_request->user->last_name }}
                                                    </td>
                                                    <td>
                                                        {{ $appointments_request->house->owner->first_name }}  {{ $appointments_request->house->owner->last_name }}
                                                    </td>
                                                    <td>
                                                        {{ $appointments_request->house->space }}
                                                    </td>
                                                    <td>
                                                        {{ $appointments_request->house->direction }}
                                                    </td>
                                                    <td>
                                                        {{$appointments_request->house->floor_no }}
                                                    </td>
                                                    <td>
                                                        {{ $appointments_request->house->rooms_no }}
                                                    </td>
                                                    <td>
                                                        {{ $appointments_request->house->place->name }}
                                                    </td>
                                                    <td class="td-actions text-right">

                                                        <a rel="tooltip" data-toggle="tooltip" data-placement="top" title="إعطاء موعد"
                                                        class="btn btn-success btn-link" href="{{ route('appointment.createAppointment', $appointments_request) }}" data-original-title="" title="">
                                                        <i class="material-icons">add</i>
                                                        <div class="ripple-container"></div>
                                                        </a>

                                                    </td>


                                                </tr>
                                            @endforeach
                                            </tbody>
                                            {{$appointments_requests->links()}}
                                        </table>
                                    </div>
                                    @else
                                    لا يوجد طلبات جديدة
                                @endif



                        </div>
                    </div>
                    @endif

                    <div class="card">
                        <div class="card-header card-header-success">
                            @if(Auth::user()->is_admin)
                                <h4 class="card-title ">{{ __('المواعيد') }}</h4>
                            @else
                                <h4 class="card-title ">{{ __('مواعيدك') }}</h4>
                            @endif
                        </div>
                        @if($appointments->count() > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-success">
                                <th >
                                    {{ __('الوقت') }}
                                </th>
                                <th>
                                    {{ __('التاريخ') }}
                                </th>
                                <th>
                                    {{ __('المكان') }}
                                </th>
                                <th>
                                    {{ __('مالك المنزل') }}
                                </th>
                                </th>
                                @if(Auth::user()->is_admin)
                                <th class="text-right">
                                    {{ __('الأفعال') }}
                                </th>
                                @endif
                                </thead>
                                <tbody>

                                @foreach($appointments as $appointment)
                                    <tr>
                                        <td>
                                            {{ $appointment->time }}
                                        </td>
                                        <td>
                                            {{ $appointment->date }}
                                        </td>
                                        <td>
                                            {{ $appointment->location }}
                                        </td>
                                        <td>
                                            {{ $appointment->owner->first_name }}  {{ $appointment->owner->last_name }}
                                        </td>
                                        @if(Auth::user()->is_admin)
                                        <td class="td-actions text-right">



                                            <a rel="tooltip" data-toggle="tooltip" data-placement="top" title="تعديل"
                                            class="btn btn-success btn-link" href="{{ route('appointment.edit', $appointment) }}" data-original-title="" title="">
                                            <i class="material-icons">edit</i>
                                            <div class="ripple-container"></div>
                                            </a>
                                            <a
                                            rel="tooltip"  data-placement="top" title="حذف"
                                            class="btn btn-danger btn-link" data-original-title="" title=""
                                            data-toggle="modal"  onclick="deleteData({{$appointment->id}})" data-target="#exampleModal"

                                            >
                                            <i class="material-icons">delete</i>
                                            <div class="ripple-container"></div>
                                            </a>






                                        </td>
                                     @endif

                                    </tr>
                                @endforeach
                                </tbody>
                                {{$appointments->links()}}
                            </table>
                        </div>
                        @else
                        لا يوجد مواعيد
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="" id="deleteForm" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    هل أنت متأكد من انك تريد حذف هذا الموعد ؟
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="material-icons">close</i> إغلاق</button>
                    <button type="button"  onclick="formSubmit()" class="btn btn-danger"><i class="material-icons">delete</i> حذف</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function deleteData(id)
        {
            var id = id;
            var url = '{{ route("appointment.destroy", ":id") }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit()
        {
            $("#deleteForm").submit();
        }
    </script>

@endsection