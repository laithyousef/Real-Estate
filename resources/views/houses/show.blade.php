@extends('layouts.app', ['activePage' => 'houses', 'titlePage' => __('إدارة المنازل')])

@section('content')
    <style>
        * {box-sizing:border-box}

        /* Slideshow container */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }

        /* Hide the images by default */
        .mySlides {
            display: none;
        }

        /* Next & previous buttons */
        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            margin-top: -22px;
            padding: 16px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
            background-color: rgba(0,0,0,0.8);
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active, .dot:hover {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }

        @keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }
    </style>


    <div style="margin-top:70px; ">
        <div >
            <div class="row">
                <div class="col-md-12">


                        <div class="card ">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">{{ __('تفاصيل المنزل') }}</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('house.index') }}" class="btn btn-sm btn-success">
                                            <span class="material-icons">keyboard_arrow_right</span>
                                            {{ __('الرجوع إلى القائمة') }}
                                        </a>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('المساحة ') }}</label>
                                            <div class="col-sm-7">
                                               {{$house->space}}
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('السعر ') }}</label>
                                            <div class="col-sm-7">
                                                {{ $house->price }}
                                            </div>
                                        </div>



                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __(' الإتجاه') }}</label>
                                            <div class="col-sm-7">
                                                {{$house->direction}}




                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __(' الطابق') }}</label>
                                            <div class="col-sm-7">
                                                {{$house->floor_no}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __(' عدد الغرف') }}</label>
                                            <div class="col-sm-7">
                                                {{$house->rooms_no}}
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('المنطقة ') }}</label>
                                            <div class="col-sm-7">
                                                {{$house->place->name}}
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('المالك ') }}</label>
                                            <div class="col-sm-7">
                                                {{$house->owner->first_name}}   {{$house->owner->last_name}}
                                            </div>
                                        </div>



                                    </div>
                                </div>



                            </div>

                        </div>

                </div>
            </div>

            {{--@foreach($house->images as $image)--}}
                {{--<img src="{{asset('storage')}}/{{$image->img_url}}">--}}
            {{--@endforeach--}}
          @if($house->images->count() >0)
            <div class="row">
                <div class="col-12 text-center">
                    <div class="w3-content w3-display-container">
                        @foreach($house->images as $image)

                                    <img class="mySlides rounded mx-auto"  src="{{asset('storage')}}/{{$image->img_url}}"  style="width:500px">

                        @endforeach


                        <div class="row">
                            <div class="col-12 text-center">
                                <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                                <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
                            </div>
                        </div>

                    </div>
                    </div>
            </div>
          @endif
    </div>


@if($house->videos->count() > 0)
<div class="row ">
    <div class="col-12 text-center">
        <video width="320" height="240" controls>
            <source src="{{asset('storage')}}/{{$house->videos[0]->video_url??''}}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

</div>
@endif

            <div>
                <div id="map">
                </div>
            </div>

        {{--map script--}}
            <script type="text/javascript">

                window.onload = function () {
                    var mapOptions = {
                        center: new google.maps.LatLng({{$house->lat}},{{$house->long}}), //which city will be shown.
                        zoom: 75, //google map page zoom
                        mapTypeId: google.maps.MapTypeId.ROADMAP //type of view.
                    };
                    var infoWindow = new google.maps.InfoWindow();
                    var map = new google.maps.Map(document.getElementById("map"), mapOptions);//pass div id and google map load values.

                    var myLatlng = new google.maps.LatLng( {{$house->lat}}, {{$house->long}}); //here i assigned lat and long.
                    var marker = new google.maps.Marker({
                        position: myLatlng, //lat and long value
                        map: map, //div id
                        draggable:false,

                    });

                }

            </script>




        {{--slider script--}}
        <script>
            var slideIndex = 1;
            showDivs(slideIndex);

            function plusDivs(n) {
                showDivs(slideIndex += n);
            }

            function showDivs(n) {
                var i;
                var x = document.getElementsByClassName("mySlides");
                if (n > x.length) {slideIndex = 1}
                if (n < 1) {slideIndex = x.length}
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                x[slideIndex-1].style.display = "block";
            }
        </script>
@endsection