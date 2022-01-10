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
        <div style="margin: 20px" >
            {{--search form--}}





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

                            <div class="table-responsive">

                                @if($users->count()>0)
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

                                        @foreach($users as $user)
                                            <tr>
                                                {{--<td>--}}
                                                    {{--{{ $house->space }} م2--}}
                                                {{--</td>--}}
                                                {{--<td>--}}
                                                    {{--{{ $house->direction }}--}}
                                                {{--</td>--}}
                                                {{--<td>--}}
                                                    {{--{{ $house->floor_no }}--}}
                                                {{--</td>--}}
                                                {{--<td>--}}
                                                    {{--{{ $house->rooms_no }}--}}
                                                {{--</td>--}}
                                                {{--<td>--}}
                                                    {{--{{ $house->place->name }}--}}
                                                {{--</td>--}}
                                                {{--<td>--}}
                                                    {{--{{ $house->owner->first_name }} {{ $house->owner->last_name }}--}}
                                                {{--</td>--}}
                                                {{--<td>--}}
                                                    {{--{{ $house->price }}--}}
                                                {{--</td>--}}



                                                <td class="td-actions ">

                                                    {{--@if(Auth::User()->is_admin)--}}

                                                        {{--<a rel="tooltip" data-toggle="tooltip" data-placement="top" title="تعديل"--}}
                                                           {{--class="btn btn-success btn-link" href="{{ route('house.edit', $house) }}" data-original-title="" title="">--}}
                                                            {{--<i class="material-icons">edit</i>--}}
                                                            {{--<div class="ripple-container"></div>--}}
                                                        {{--</a>--}}
                                                        {{--<a--}}
                                                                {{--rel="tooltip"  data-placement="top" title="حذف"--}}
                                                                {{--class="btn btn-danger btn-link" data-original-title="" title=""--}}
                                                                {{--data-toggle="modal"  onclick="deleteData({{$house->id}})" data-target="#exampleModal">--}}
                                                            {{--<i class="material-icons">delete</i>--}}
                                                            {{--<div class="ripple-container"></div>--}}
                                                        {{--</a>--}}



                                                    {{--@else--}}
                                                        {{--<a rel="tooltip"  data-placement="top" title="إضافة إلى المفضلة"  data-toggle="modal" data-target="#addToFavoriteModal"--}}
                                                           {{--class="btn btn-danger btn-link" onclick="addToFavorite({{$house->id}})" data-original-title="" title="">--}}
                                                            {{--<i class="material-icons">favorite</i>--}}
                                                            {{--<div class="ripple-container"></div>--}}
                                                        {{--</a>--}}


                                                    {{--@endif--}}
                                                    {{--<a rel="tooltip" data-toggle="tooltip" data-placement="top" title="المزيد من التفاصيل"--}}
                                                       {{--class="btn btn-info btn-link" href="{{ route('house.show', $house) }}" data-original-title="" title="">--}}
                                                        {{--<i class="material-icons">visibility</i>--}}
                                                        {{--<div class="ripple-container"></div>--}}
                                                    {{--</a>--}}

                                                </td>


                                            </tr>
                                        @endforeach
                                        </tbody>
                                        {{ $users->links() }}
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