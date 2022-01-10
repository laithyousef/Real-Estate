@extends('layouts.app', ['activePage' => 'owners', 'titlePage' => __(' مالكي المنازل')])

@section('content')
    <div style="margin-top:70px; ">
        <div style="margin: 20px" >
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('owner.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <div class="card ">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">{{ __('إضافة مالك جديد') }}</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('owner.index') }}" class="btn btn-sm btn-success">
                                            <span class="material-icons">keyboard_arrow_right</span>
                                            {{ __('الرجوع إلى القائمة') }}
                                        </a>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('الاسم ') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('first_name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" id="input-first_name" type="text"   placeholder="{{ __('الاسم') }}" value="{{ old('first_name') }}" required="true" aria-required="true"/>
                                            @if ($errors->has('first_name'))
                                                <span id="first_name-error" class="error text-danger" for="input-first_name">{{ $errors->first('first_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('الكنية ') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('last_name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" id="input-last_name" type="text" placeholder="{{ __(' الكنية') }}" value="{{ old('last_name') }}" required="true" aria-required="true"/>
                                            @if ($errors->has('last_name'))
                                                <span id="last_name-error" class="error text-danger" for="input-last_name">{{ $errors->first('last_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('رقم الهاتف ') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('phone_no') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" id="input-phone_no" type="text" pattern="[0-9]*" placeholder="{{ __(' رقم الهاتف') }}" value="{{ old('phone_no') }}" required="true" aria-required="true"/>
                                            @if ($errors->has('phone_no'))
                                                <span id="last_name-error" class="error text-danger" for="input-phone_no">{{ $errors->first('phone_no') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('العنوان   ') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="input-address" type="text" placeholder="{{ __(' العنوان  ') }}" value="{{ old('address') }}" required="true" aria-required="true"/>
                                            @if ($errors->has('address'))
                                                <span id="address-error" class="error text-danger" for="input-address">{{ $errors->first('address') }}</span>
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