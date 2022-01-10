@extends('layouts.app', ['activePage' => 'houses', 'titlePage' => __('إدارة المنازل')])

@section('content')
    <style>
        input[type="file"] {
            display: block;
        }
        .imageThumb {
            max-height: 75px;
            border-radius: 10px;
            padding: 1px;
            cursor: pointer;
        }
        .pip {
            display: inline-block;
            margin: 10px 10px 0 0;
        }
        .remove {
            margin-top: 10px;
            display: block;
            background: white;
            border-radius: 30px;
            border: 1px solid #ff5e52;
            color: #ff1a17;
            text-align: center;
            cursor: pointer;
        }
        .remove:hover {
            background: #ff1a17;
            color: white;
        }

        .imgPreview img {
            padding: 8px;
            max-width: 100px;
        }
    </style>

    <div style="margin-top:70px; ">
        <div >
            <div class="row" id="kkk">
                <div class="col-md-12">
                    <form method="post" action="{{ route('house.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <div class="card ">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">{{ __('إضافة منزل جديد') }}</h4>
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
                                                <div class="form-group{{ $errors->has('space') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('space') ? ' is-invalid' : '' }}"  name="space" id="input-space"
                                                           pattern="[0-9]*"
                                                           type="text"   placeholder="{{ __('المساحة') }}" value="{{ old('space') }}" required="true" aria-required="true"/>
                                                    @if ($errors->has('space'))
                                                        <span id="space-error" class="error text-danger" for="input-space">{{ $errors->first('space') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('السعر ') }}</label>
                                            <div class="col-sm-7">
                                                <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" id="input-price"
                                                           pattern="[0-9]*"
                                                           type="text"   placeholder="{{ __('السعر') }}" value="{{ old('price') }}" required="true" aria-required="true"/>
                                                    @if ($errors->has('price'))
                                                        <span id="price-error" class="error text-danger" for="input-price">{{ $errors->first('price') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __(' الإتجاه') }}</label>
                                            <div class="col-sm-7">
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

                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __(' الطابق') }}</label>
                                            <div class="col-sm-7">
                                                <select class="selectpicker" data-style="btn btn-info btn-success" name="floor_no" id="floors" title="Single Select" >
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
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __(' عدد الغرف') }}</label>
                                            <div class="col-sm-7">
                                                <select class="selectpicker" data-style="btn btn-info btn-success" name="rooms_no" id="rooms" title="Single Select" >
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

                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('المنطقة ') }}</label>
                                            <div class="col-sm-7">
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

                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('المالك ') }}</label>
                                            <div class="col-sm-7">
                                                <select class="selectpicker" data-style="btn btn-info btn-success" name="owner_id" id="places" title="Single Select" >
                                                    <option disabled selected> اختر المالك</option>
                                                    @foreach($owners as $owner)
                                                        <option value="{{$owner->id}}" >{{$owner->first_name}} {{$owner->last_name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('owner_id'))
                                                    <span id="owner_id-error" class="error text-danger" for="owner_id">يجب أن تختار المالك</span>
                                                @endif
                                            </div>
                                        </div>








                                    </div>
                                    <div class="row">
                                        <div class="field" style="    margin-right: 29px!important;">
                                            <label class=" col-form-label" >{{ __(' صور المنزل ') }}</label>
                                            <div class="col-sm-12">

                                                <input type="file" id="files" name="houseImages[]" class=" btn btn-success w50 mx-auto" multiple />
                                            </div>

                                        </div>

                                        <div class="field" style="    margin-right: 29px!important;">
                                            <label class=" col-form-label" >{{ __('  فديو ') }}</label>
                                            <div class="col-sm-12">

                                                <input type="file" id="files" name="houseVideo" class=" btn btn-success w50 mx-auto"  />
                                            </div>

                                        </div>

                                    </div>
                                    <!--map div-->
                                    <div id="map">

                                    </div>

                                        <input  name="lat" type="text" id="lat" hidden readonly="yes"><br>
                                        <input  name="long" type="text" id="lng" hidden readonly="yes">


                                </div>


                                <div class="card-footer ml-auto mr-auto">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('حفظ') }}
                                        <span class="material-icons">save</span>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>

                    <!--map div-->
                    <div id="map">

                    </div>

                </div>
            </div>
        </div>
    </div>


    <script >
        //Set up some of our variables.
        var map; //Will contain map object.
        var marker = false; ////Has the user plotted their location marker?

        //Function called to initialize / create the map.
        //This is called when the page has loaded.
        window.onload =   function initMap() {

            //The center location of our map.
            var centerOfMap = new google.maps.LatLng(35.53168, 35.79011);

            //Map options.
            var options = {
                center: centerOfMap, //Set center.
                zoom: 50 //The zoom value.
            };

            //Create the map object.
            map = new google.maps.Map(document.getElementById('map'), options);

            //Listen for any clicks on the map.
            google.maps.event.addListener(map, 'click', function(event) {
                //Get the location that the user clicked.
                var clickedLocation = event.latLng;
                //If the marker hasn't been added.
                if(marker === false){
                    //Create the marker.
                    marker = new google.maps.Marker({
                        position: clickedLocation,
                        map: map,
                        draggable: true //make it draggable
                    });
                    //Listen for drag events!
                    google.maps.event.addListener(marker, 'dragend', function(event){
                        markerLocation();
                    });
                } else{
                    //Marker has already been added, so just change its location.
                    marker.setPosition(clickedLocation);
                }
                //Get the marker's location.
                markerLocation();
            });
        }

        //This function will get the marker's current location and then add the lat/long
        //values to our textfields so that we can save the location.
        function markerLocation(){
            //Get location.
            var currentLocation = marker.getPosition();
            //Add lat and lng values to a field that we can save.
            document.getElementById('lat').value = currentLocation.lat(); //latitude
            document.getElementById('lng').value = currentLocation.lng(); //longitude
        }


        //Load the map when the page has finished loading.
        google.maps.event.addDomListener(window, 'load', initMap);

    </script>

@endsection