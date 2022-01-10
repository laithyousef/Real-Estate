@extends('layouts.app', ['activePage' => 'houses', 'titlePage' => __(' المنازل')])

@section('content')
    <style>
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
    </style>


    <div style="margin-top:70px; ">
        <div >
            {{--search form--}}

                <div class="row">
                    <a class="btn btn-success btn-round btn-just-icon"
                            rel="tooltip"  data-placement="top" title="بحث متقدم"
                            data-original-title="" title=""
                            data-toggle="modal"  onclick="" data-target="#searchModal" >
                        <i class="material-icons" style="color: white;">search</i>
                        <div class="ripple-container"></div>
                    </a>

                    <a class="btn btn-success btn-round" href="{{route ('house.index' )}}">
                        <span style="color: white">
                             {{__('كل المنازل')}}
                        </span>

                    </a>
                </div>



            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title ">{{ __(' المنازل') }}</h4>
                            @if(Auth::User()->is_admin)
                                <p class="card-category"> {{ __(' هنا يمكنك إدارة   المنازل' ) }}</p>
                            @endif
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
                            @if(Auth::User()->is_admin)
                                <div class="row">
                                    <div class="col-12 text-right">
                                        <a href="{{ route('house.create') }}" class="btn btn-sm btn-success">
                                            <i class="material-icons">person_add</i>
                                            {{ __(' إضافة منزل جديد') }}</a>
                                    </div>

                                </div>
                            @endif
                            <div class="table-responsive">

                                @if($houses->count()>0)
                                <table class="table">
                                    <thead class=" text-success">
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
                                    <th>
                                        {{ __('المالك') }}
                                    </th>
                                    <th>
                                        {{ __('السعر') }}
                                    </th>
                                    <th>
                                        {{ __('متوفر') }}
                                    </th>

                                    <th >
                                        {{ __('الأفعال') }}
                                    </th>
                                    </thead>
                                    <tbody>

                                    @foreach($houses as $house)
                                        <tr>
                                            <td>
                                                {{ $house->space }} م2
                                            </td>
                                            <td>
                                                {{ $house->direction }}
                                            </td>
                                            <td>
                                                {{ $house->floor_no }}
                                            </td>
                                            <td>
                                                {{ $house->rooms_no }}
                                            </td>
                                            <td>
                                                {{ $house->place->name }}
                                            </td>
                                            <td>
                                                {{ $house->owner->first_name }} {{ $house->owner->last_name }}
                                            </td>
                                            <td>
                                                {{ $house->price }}
                                            </td>
                                            <td>
                                               @if($house->available )
                                                    <i class="material-icons">done_outline</i>
                                                @else
                                                    <i class="material-icons">not_interested</i>
                                                @endif
                                            </td>


                                            <td class="td-actions ">

                                                @if(Auth::User()->is_admin)

                                                    <a rel="tooltip" data-toggle="tooltip" data-placement="top" title="تعديل"
                                                       class="btn btn-success btn-link" href="{{ route('house.edit', $house) }}" data-original-title="" title="">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    <a
                                                            rel="tooltip"  data-placement="top" title="حذف"
                                                            class="btn btn-danger btn-link" data-original-title="" title=""
                                                            data-toggle="modal"  onclick="deleteData({{$house->id}})" data-target="#exampleModal">
                                                        <i class="material-icons">delete</i>
                                                        <div class="ripple-container"></div>
                                                    </a>



                                            @else
                                                    <a rel="tooltip"  data-placement="top" title="إضافة إلى المفضلة"  data-toggle="modal" data-target="#addToFavoriteModal"
                                                       class="btn btn-danger btn-link" onclick="addToFavorite({{$house->id}})" data-original-title="" title="">
                                                        <i class="material-icons">favorite</i>
                                                        <div class="ripple-container"></div>
                                                    </a>


                                            @endif
                                                    <a rel="tooltip" data-toggle="tooltip" data-placement="top" title="المزيد من التفاصيل"
                                                       class="btn btn-info btn-link" href="{{ route('house.show', $house) }}" data-original-title="" title="">
                                                        <i class="material-icons">visibility</i>
                                                        <div class="ripple-container"></div>
                                                    </a>

                                            </td>


                                        </tr>
                                    @endforeach
                                    </tbody>
                                    {{ $houses->links() }}
                                </table>
                                    @else
                                        لايوجد أي منزل يطابق عملية البحث
                                    @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--delete modal--}}

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
                        هل أنت متأكد من انك تريد حذف هذه المنزل ؟
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="material-icons">close</i> إغلاق</button>
                        <button type="button"  onclick="formSubmit()" class="btn btn-danger"><i class="material-icons">delete</i> حذف</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--add to favorite modal--}}

    <div class="modal fade" id="addToFavoriteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="" id="addingForm" method="post">
                    {{ csrf_field() }}
                    {{ method_field('GET') }}
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        عند إضافة هذا المنزل إلى المفضلة سيتم إعطاؤك موعد مع صاحبه قريبا
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="material-icons">close</i> إغلاق</button>
                        <button type="button"  onclick="addingFormSubmit()" class="btn btn-success"><i class="material-icons">add</i> إضافة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    {{--search modal--}}

    <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div role="tabpanel" class="w-100">
                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li role="presentation" class="active">
                                <a class="btn btn-success active"
                                   style="border-radius: 5px 0px 0px 5px"
                                   href="#alone" aria-controls="alone" role="tab" data-toggle="tab">
                                   لوحدك
                                </a>
                            </li>
                            <li role="presentation">
                                <a class="btn btn-success"
                                   style="border-radius: 0px;border-left: solid;border-right: solid; "
                                   href="#notAlone" aria-controls="notAlone" role="tab" data-toggle="tab">
                                    مع زملاء
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="alone">
                                <form method="post" action="{{ route('house.search') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')


                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="row">
                                                <label class=" col-sm-3 col-form-label">{{ __('أقل سعر ') }}</label>

                                                <div class="form-group{{ $errors->has('lowest_price') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('lowest_price') ? ' is-invalid' : '' }}"  name="lowest_price" id="input-lowest_price"
                                                           pattern="[0-9]*"
                                                           type="number"   placeholder="{{ __('أقل سعر') }}" value="{{ old('lowest_price') }}"    />
                                                    @if ($errors->has('lowest_price'))
                                                        <span id="lowest_price-error" class="error text-danger" for="input-lowest_price">{{ $errors->first('lowest_price') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">{{ __('أعلى سعر ') }}</label>

                                                <div class="form-group{{ $errors->has('highest_price') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('highest_price') ? ' is-invalid' : '' }}"  name="highest_price" id="input-highest_price"
                                                           pattern="[0-9]*"
                                                           type="number"   placeholder="{{ __('أعلى سعر') }}" value="{{ old('highest_price') }}" />
                                                    @if ($errors->has('highest_price'))
                                                        <span id="highest_price-error" class="error text-danger" for="input-highest_price">{{ $errors->first('highest_price') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <label class="col-sm-3 col-form-label">{{ __('المنطقة ') }}</label>
                                            <div class="col-sm-5">
                                                <select class="selectpicker" data-style="btn btn-info btn-success" name="place" id="places" title="Single Select" >
                                                    <option disabled selected> اختر المنطقة</option>
                                                    @foreach($places as $place)
                                                        <option value="{{$place->id}}" >{{$place->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('place_id'))
                                                    <span id="place_id-error" class="error text-danger" for="place_id">يجب أن تختار المنطقة</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6">
                                            <label class="col-sm-4 col-form-label">{{ __(' الغرف') }}</label>
                                            <div class="col-sm-5">
                                                <select class="selectpicker" data-style="btn btn-info btn-success" name="rooms_number" id="rooms" title="Single Select" >
                                                    <option disabled selected> اختر  عدد الغرف</option>
                                                    <option value="1" >1</option>
                                                    <option value="2" >2</option>
                                                    <option value="3" >3</option>
                                                    <option value="4" >4</option>
                                                    <option value="5" >5</option>
                                                    <option value="6" >6</option>
                                                    <option value="7" >7</option>
                                                    <option value="8" >8</option>
                                                    <option value="9" >9</option>
                                                    <option value="10" >10</option>

                                                </select>
                                                @if ($errors->has('rooms_no'))
                                                    <span id="rooms_no-error" class="error text-danger" for="rooms_no">يجب أن تختار عدد الغرف</span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <label class="col-sm-3 col-form-label">{{ __(' الطابق') }}</label>
                                            <div class="col-sm-5">
                                                <select class="selectpicker" data-style="btn btn-info btn-success" name="floor_number" id="floors" title="Single Select" >
                                                    <option disabled selected> اختر الطابق</option>
                                                    <option value="الأرضي" >الأرضي</option>
                                                    <option value="الأول" >الأول</option>
                                                    <option value="الثاني" >الثاني</option>
                                                    <option value="الثالث" >الثالث</option>
                                                    <option value="الرابع" >الرابع</option>
                                                    <option value="الخامس" >الخامس</option>
                                                    <option value="السادس" >السادس</option>
                                                    <option value="السابع" >السابع</option>
                                                    <option value="الثامن" >الثامن</option>
                                                    <option value="التاسع" >التاسع</option>
                                                    <option value="العاشر" >العاشر</option>
                                                    <option value="الحادي عشر" >الحادي عشر</option>
                                                    <option value="الثاني عشر" >الثاني عشر</option>
                                                    <option value="الثالث عشر" >الثالث عشر</option>
                                                    <option value="الرابع عشر" >الرابع عشر</option>

                                                </select>
                                                @if ($errors->has('floor_no'))
                                                    <span id="floor_no-error" class="error text-danger" for="floor_no">يجب أن تختار الطابق</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label class="col-sm-3 col-form-label">{{ __(' الإتجاه') }}</label>
                                            <div class="col-sm-5">
                                                <select class="selectpicker" data-style="btn btn-info btn-success" name="direction" id="direction" title="Single Select" >
                                                    <option disabled selected> اختر اتجاه المنزل</option>
                                                    <option value="شمالي" >شمالي</option>
                                                    <option value="جنوبي" >جنوبي</option>
                                                    <option value="شرقي" >شرقي</option>
                                                    <option value="غربي" >غربي</option>
                                                    <option value="شمالي شرقي" >شمالي شرقي</option>
                                                    <option value="شمالي غربي" >شمالي غربي</option>
                                                    <option value="جنوبي شرقي" >جنوبي شرقي</option>
                                                    <option value="جنوبي غربي" >جنوبي غربي</option>



                                                </select>
                                                @if ($errors->has('direction'))
                                                    <span id="direction-error" class="error text-danger" for="direction">يجب أن تختار الاتجاه</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card-footer ml-auto mr-auto">
                                        <button type="submit" class="btn btn-success ">
                                            {{ __('بحث') }}
                                            <span class="material-icons">search</span>
                                        </button>
                                    </div>


                                </form>

                            </div>

                            <div role="tabpanel" class="tab-pane" id="notAlone">
                                <form method="post" action="{{ route('house.search2') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')


                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="row">
                                                <label class=" col-sm-3 col-form-label">{{ __('أقل سعر ') }}</label>

                                                <div class="form-group{{ $errors->has('lowest_price') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('lowest_price') ? ' is-invalid' : '' }}"  name="lowest_price" id="input-lowest_price"
                                                           pattern="[0-9]*"
                                                           type="number"   placeholder="{{ __('أقل سعر') }}" value="{{ old('lowest_price') }}"    />
                                                    @if ($errors->has('lowest_price'))
                                                        <span id="lowest_price-error" class="error text-danger" for="input-lowest_price">{{ $errors->first('lowest_price') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">{{ __('أعلى سعر ') }}</label>

                                                <div class="form-group{{ $errors->has('highest_price') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('highest_price') ? ' is-invalid' : '' }}"  name="highest_price" id="input-highest_price"
                                                           pattern="[0-9]*"
                                                           type="number"   placeholder="{{ __('أعلى سعر') }}" value="{{ old('highest_price') }}" />
                                                    @if ($errors->has('highest_price'))
                                                        <span id="highest_price-error" class="error text-danger" for="input-highest_price">{{ $errors->first('highest_price') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <label class="col-sm-3 col-form-label">{{ __('المنطقة ') }}</label>
                                            <div class="col-sm-5">
                                                <select class="selectpicker" data-style="btn btn-info btn-success" name="place_id" id="places" title="Single Select" >
                                                    <option disabled selected> اختر المنطقة</option>
                                                    @foreach($places as $place)
                                                        <option value="{{$place->id}}" >{{$place->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('place_id'))
                                                    <span id="place_id-error" class="error text-danger" for="place_id">يجب أن تختار المنطقة</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6">
                                            <label class="col-sm-4 col-form-label">{{ __(' الغرف') }}</label>
                                            <div class="col-sm-5">
                                                <select class="selectpicker" data-style="btn btn-info btn-success" name="rooms_number" id="rooms" title="Single Select" >
                                                    <option disabled selected> اختر  عدد الغرف</option>
                                                    <option value="1" >1</option>
                                                    <option value="2" >2</option>
                                                    <option value="3" >3</option>
                                                    <option value="4" >4</option>
                                                    <option value="5" >5</option>
                                                    <option value="6" >6</option>
                                                    <option value="7" >7</option>
                                                    <option value="8" >8</option>
                                                    <option value="9" >9</option>
                                                    <option value="10" >10</option>

                                                </select>
                                                @if ($errors->has('rooms_no'))
                                                    <span id="rooms_no-error" class="error text-danger" for="rooms_no">يجب أن تختار عدد الغرف</span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">{{ __('عدد الزملاء ') }}</label>

                                                <div class="form-group{{ $errors->has('colleagues_number') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('colleagues_number') ? ' is-invalid' : '' }}"  name="colleagues_number" id="input-colleagues_number"
                                                           pattern="[0-9]*" required
                                                           type="number"   placeholder="{{ __('عدد الزملاء ') }}" value="{{ old('colleagues_number') }}" />
                                                    @if ($errors->has('colleagues_number'))
                                                        <span id="colleagues_number-error" class="error text-danger" for="input-colleagues_number">{{ $errors->first('colleagues_number') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label class="col-sm-3 col-form-label">{{ __(' الزملاء') }}</label>
                                            {{--<div class="form-check form-check-radio form-check-inline" style="padding-left: 18px;--}}
      {{--padding-right: 18px;">--}}
                                                {{--<label class="form-check-label">--}}
                                                    {{--<input class="form-check-input" type="radio" name="are_students" onclick="showCollegeSpecialities()" id="isStudentId" value="student" checked >--}}
                                                    {{--طلاب--}}
                                                    {{--<span class="circle">--}}
                         {{--<span class="check"></span>--}}
                      {{--</span>--}}
                                                {{--</label>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-check form-check-radio form-check-inline" style="padding-left: 18px;--}}
      {{--padding-right: 18px;">--}}
                                                {{--<label class="form-check-label">--}}
                                                    {{--<input class="form-check-input" type="radio" name="are_students" onclick="hideCollegeSpecialities()" id="isNotStudentId" value="notStudent" >--}}
                                                    {{--غير طلاب--}}
                                                    {{--<span class="circle">--}}
                          {{--<span class="check"></span>--}}
                      {{--</span>--}}
                                                {{--</label>--}}
                                            {{--</div>--}}
                                            <div class="col-sm-5">
                                                <select class="selectpicker"
                                                        data-style="btn btn-info btn-success" name="are_students"
                                                        id="are_students" title="Single Select"
                                                        onchange="showCollegeSpecialities(this.value)"
                                                >
                                                    <option disabled selected> طلاب ؟</option>
                                                    <option value="1"  >طلاب</option>
                                                    <option value="0"  >غير طلاب</option>

                                                </select>

                                            </div>
                                        </div>



                                    </div>
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-6 col-sm-6">--}}
                                            {{--<div class="row">--}}
                                                {{--<label class="col-sm-3 col-form-label">{{ __('العمر ') }}</label>--}}

                                                {{--<div class="form-group{{ $errors->has('lowest_age') ? ' has-danger' : '' }}">--}}
                                                    {{--<input class="form-control{{ $errors->has('lowest_age') ? ' is-invalid' : '' }}"  name="lowest_age" id="input-lowest_age"--}}
                                                           {{--pattern="[0-9]*"--}}
                                                           {{--type="number"   placeholder="{{ __('أكبر من') }}" value="{{ old('lowest_age') }}" />--}}
                                                    {{--@if ($errors->has('lowest_age'))--}}
                                                        {{--<span id="lowest_age-error" class="error text-danger" for="input-lowest_age">{{ $errors->first('lowest_age') }}</span>--}}
                                                    {{--@endif--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-6 col-sm-6">--}}
                                            {{--<div class="row">--}}
                                                {{--<label class="col-sm-3 col-form-label">{{ __('العمر ') }}</label>--}}

                                                {{--<div class="form-group{{ $errors->has('highest_age') ? ' has-danger' : '' }}">--}}
                                                    {{--<input class="form-control{{ $errors->has('highest_age') ? ' is-invalid' : '' }}"  name="highest_age" id="input-highest_age"--}}
                                                           {{--pattern="[0-9]*"--}}
                                                           {{--type="number"   placeholder="{{ __('أصغر من') }}" value="{{ old('highest_age') }}" />--}}
                                                    {{--@if ($errors->has('highest_price'))--}}
                                                        {{--<span id="highest_age-error" class="error text-danger" for="input-highest_age">{{ $errors->first('highest_age') }}</span>--}}
                                                    {{--@endif--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <label class="col-sm-3 col-form-label">{{ __(' الجنس') }}</label>
                                            <div class="col-sm-5">
                                                <select class="selectpicker" data-style="btn btn-info btn-success" name="sex" id="sex" title="Single Select" >
                                                    <option disabled selected> الجنس ؟</option>
                                                    <option value="males" >ذكور</option>
                                                    <option value="females" >إناث</option>

                                                </select>

                                            </div>
                                        </div>


                                        <div class="col-md-6 col-sm-6">
                                            <div id="college_specialities_group" >
                                                <label class="col-sm-4 col-form-label">{{ __(' الاختصاص') }}</label>
                                                <div class="col-sm-5">
                                                    <select class="selectpicker" data-style="btn btn-info btn-success" name="college_speciality_id" id="college_speciality_id" title="Single Select" >
                                                        <option disabled selected>اختر الاختصاص</option>
                                                        @foreach($collegeSpecialities as $collegeSpeciality)
                                                            <option value={{$collegeSpeciality->id}} >
                                                                {{$collegeSpeciality->name}}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                    @if ($errors->has('rooms_no'))
                                                        <span id="rooms_no-error" class="error text-danger" for="rooms_no">يجب أن تختار عدد الغرف</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer ml-auto mr-auto">
                                        <button type="submit" class="btn btn-success ">
                                            {{ __('بحث') }}
                                            <span class="material-icons">search</span>
                                        </button>
                                    </div>


                                </form>

                            </div>
                        </div>













                    </div>

                </div>

            </div>
        </div>
    </div>


    <script type="text/javascript">
        function deleteData(id)
        {
            var id = id;
            var url = '{{ route("house.destroy", ":id") }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit()
        {
            $("#deleteForm").submit();
        }
    </script>


    <script type="text/javascript">
        function addToFavorite(id)
        {
            var id = id;
            var url = '{{ route("favorite.edit", ":id") }}';
            url = url.replace(':id', id);
            $("#addingForm").attr('action', url);
        }

        function addingFormSubmit()
        {
            $("#addingForm").submit();
        }
    </script>

    <script>
        var selectEl=document.getElementById('college_speciality_id');
        var specialities=document.getElementById('college_specialities_group');

        function showCollegeSpecialities($value) {

            if($value === '0'){
                hideCollegeSpecialities()
            }else {
                specialities.hidden=false;
            }

        }
        function hideCollegeSpecialities() {
            specialities.hidden=true;
            selectEl.value='';
        }

    </script>
@endsection