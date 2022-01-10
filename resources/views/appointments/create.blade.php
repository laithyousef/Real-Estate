@extends('layouts.app', ['activePage' => 'owners', 'titlePage' => __('   المواعيد')])

@section('content')
    <div style="margin-top:70px; ">
        <div style="margin: 20px" >
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('appointment.storeAppointment',$appointment_request) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <div class="card ">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">{{ __('إضافة موعد') }}</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('appointment.index') }}" class="btn btn-sm btn-success">
                                            <span class="material-icons">keyboard_arrow_right</span>
                                            {{ __('الرجوع إلى القائمة') }}
                                        </a>

                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('الوقت ') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('time') ? ' has-danger' : '' }}">
                                            <input type="time" name="time" id="time" class="form-control" placeholder="{{ __('الوقت') }}" value="{{ old('time') }}" required>
                                        </div>
                                        @if ($errors->has('time'))
                                            <div id="time-error" class="error text-danger pl-3" for="time" style="display: block;">
                                                <strong>{{ $errors->first('time') }}</strong>
                                            </div>
                                        @endif
                                        </div>
                                    </div>



                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('التاريخ ') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('date') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" id="input-date" type="date" placeholder="{{ __(' التاريخ') }}" value="{{ old('date') }}" required="true" aria-required="true"/>
                                        </div>
                                            @if ($errors->has('date'))
                                                <span id="date-error" class="error text-danger" for="input-date">{{ $errors->first('date') }}</span>
                                            @endif

                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('المكان') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('location') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" id="input-location" type="text"   placeholder="{{ __('المكان') }}" value="{{ old('location') }}" required="true" aria-required="true"/>
                                        </div>
                                            @if ($errors->has('location'))
                                                <span id="location-error" class="error text-danger" for="input-location">{{ $errors->first('location') }}</span>
                                            @endif

                                    </div>
                                </div>


                            </div>





                                <div class="card-footer ml-auto mr-auto">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('حفظ') }}
                                    <span class="material-icons">save</span>
                                    </button>
                                </div>
                            </div>


                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection