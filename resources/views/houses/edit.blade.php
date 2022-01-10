@extends('layouts.app', ['activePage' => 'houses', 'titlePage' => __('إدارة المنازل')])

@section('content')
    <div style="margin-top:70px; ">
        <div style="margin: 20px" >
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('house.update',$house) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="card ">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">{{ __('تعديل معلومات المنزل') }}</h4>
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
                                                           type="text"   placeholder="{{ __('المساحة') }}" value="{{ $house->space }}" required="true" aria-required="true"/>
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
                                                           type="text"   placeholder="{{ __('السعر') }}" value="{{ $house->price }}" required="true" aria-required="true"/>
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
                                                    <option disabled selected>  {{$house->direction}}  </option>
                                                    <option value="0" >شمالي</option>
                                                    <option value="1" >جنوبي</option>
                                                    <option value="2" >شرقي</option>
                                                    <option value="3" >غربي</option>
                                                    <option value="4" >شمالي شرقي</option>
                                                    <option value="5" >شمالي غربي</option>
                                                    <option value="6" >جنوبي شرقي</option>
                                                    <option value="7" >جنوبي غربي</option>



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
                                                    <option disabled selected> {{$house->floor_no}}</option>
                                                    <option value="0" >الأرضي</option>
                                                    <option value="1" >الأول</option>
                                                    <option value="2" >الثاني</option>
                                                    <option value="3" >الثالث</option>
                                                    <option value="4" >الرابع</option>
                                                    <option value="5" >الخامس</option>
                                                    <option value="6" >السادس</option>
                                                    <option value="7" >السابع</option>
                                                    <option value="8" >الثامن</option>
                                                    <option value="9" >التاسع</option>
                                                    <option value="10" >العاشر</option>
                                                    <option value="11" >الحادي عشر</option>
                                                    <option value="12" >الثاني عشر</option>
                                                    <option value="13" >الثالث عشر</option>
                                                    <option value="14" >الرابع عشر</option>

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
                                                    <option disabled selected>{{$house->rooms_no}}</option>
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
                                                    <option disabled selected>{{$house->place->name}}</option>
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
                                                    <option disabled selected>   {{$house->owner->first_name}}   {{$house->owner->last_name}} </option>
                                                    @foreach($owners as $owner)
                                                        <option value="{{$owner->id}}" >{{$owner->first_name}}   {{$owner->last_name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('owner_id'))
                                                    <span id="owner_id-error" class="error text-danger" for="owner_id">يجب أن تختار المالك</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('متوفر : ') }}</label>
                                            <div class="col-sm-7">
                                                <div class="input-group">

                                                    <div class="form-check form-check-radio form-check-inline" style="padding-left: 18px;
      padding-right: 18px;">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="available" id="inlineRadio1" value="1" {{$house->available ? 'checked' : ''}}>
                                                            متوافر
                                                            <span class="circle">
                                                                 <span class="check"></span>
                                                              </span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-radio form-check-inline" style="padding-left: 18px;
      padding-right: 18px;">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="available" id="inlineRadio2" value="0" {{$house->available ? '' : 'checked'}}>
                                                            غير متوافر
                                                            <span class="circle">
                                                              <span class="check"></span>
                                                          </span>
                                                        </label>
                                                    </div>

                                                </div>
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

                                    <input  name="lat" type="text" id="lat" hidden readonly="yes"><br>
                                    <input  name="long" type="text" id="lng" hidden readonly="yes">


                                    <input type="hidden" id="lat_" value="{{$house->lat}}">
                                    <input type="hidden" id="lng_" value="{{$house->long}}">
                                    <div id="map"></div>

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
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        var lat = parseFloat(document.getElementById('lat_').value);
        var lng = parseFloat(document.getElementById('lng_').value);
        document.getElementById("lat").value = lat;
        document.getElementById("lng").value = lng;
        if (Number.isNaN(lat)  || Number.isNaN(lng)) {
            lat = 25.250961658292038;
            lng = 55.30367535178964;
        }

        window.onload =  function initialize() {
            var myLatlng = new google.maps.LatLng(lat,lng);
            var mapOptions = {
                zoom: 75,
                center: myLatlng
            }
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);

            // Place a draggable marker on the map
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                draggable:true,
                title:"Drag me!"
            });
            google.maps.event.addListener(marker, 'dragend', function(event) {
                document.getElementById("lat").value = event.latLng.lat();
                document.getElementById("lng").value = event.latLng.lng();
            });

            google.maps.event.addListener(map, 'click', function(event) {
                document.getElementById("lat").value = event.latLng.lat();
                document.getElementById("lng").value = event.latLng.lng();
                marker.setPosition(event.latLng);
            });
        }
        google.maps.event.addDomListener(window, "load", initialize());



    </script>

@endsection