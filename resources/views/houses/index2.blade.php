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
        <div   >
            {{--search form--}}

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">

                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">emoji_people</i>
                            </div>
                            <p class="card-category">  </p>
                            <h3 class="card-title">{{ $colleagues_number}}
                                <small>أشخاص يبحثون عن نفس المواصفات</small>
                            </h3>

                        </div>
                        <div class="card-footer">

                                   <div class="stats  mx-auto">
                                       {{--<a rel="tooltip" data-toggle="tooltip" data-placement="top" title="استعراض"--}}
                                          {{--class="btn btn-info  btn-link" href="{{ route('house.users',$similar_searches ) }}" data-original-title="" title="">--}}
                                           {{--<i class="material-icons">visibility</i>--}}
                                           {{--<div class="ripple-container"></div>--}}
                                       {{--</a>--}}


                           </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-md-11 mx-auto">

                    <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title ">{{ __('الأشخاص الذين يتطابق عملية البحث خاصتهم معك') }}</h4>

                        </div>
                        <div class="card-body">



                            <div class="table-responsive">

                                @if($similar_searches->count()>0)
                                    <table class="table">
                                        <thead class=" text-success">
                                        <th>
                                            {{ __('الاسم') }}
                                        </th>
                                        <th>
                                            {{ __('البريد الإلكتروني') }}
                                        </th>

                                        </thead>
                                        <tbody>

                                        @foreach($similar_searches as $similar_search)
                                            <tr>
                                                <td>
                                                    {{ $similar_search->user->name }}     {{ $similar_search->user->last_name }}
                                                </td>
                                                <td>
                                                    {{ $similar_search->user->email }}
                                                </td>


                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                @else
                                  لايوجد أي مستخدم يبحث عن نفس المواصفات
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-11 mx-auto">

                    <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title ">{{ __('المنازل الموافقة لعملية البحث') }}</h4>

                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="{{ route('house.index') }}" class="btn btn-sm btn-success">
                                        <span class="material-icons">keyboard_arrow_right</span>
                                        {{ __(' كل المنازل') }}
                                    </a>
                                </div>
                            </div>
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
                                                        <a rel="tooltip" data-toggle="tooltip" data-placement="top" title="إضافة إلى المفضلة"
                                                           class="btn btn-danger btn-link" href="{{ route('favorite.edit', $house->id) }}" data-original-title="" title="">
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





@endsection