@extends('layouts.app', ['activePage' => 'places', 'titlePage' => __('إدارة المناطق')])

@section('content')
    <div style="margin-top:70px; ">
        <div style="margin: 20px" >
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('place.update',$place) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="card ">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">{{ __('تعديل معلومات المنطقة') }}</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('place.index') }}" class="btn btn-sm btn-success">
                                            <span class="material-icons">keyboard_arrow_right</span>
                                            {{ __('الرجوع إلى القائمة') }}
                                        </a>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('الاسم ') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text"   placeholder="{{ __('الاسم') }}" value="{{ $place->name }}" required="true" aria-required="true"/>
                                            @if ($errors->has('name'))
                                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('الاسم ') }}</label>
                                    <div class="col-sm-7">
                                    <select class="selectpicker" data-style="btn btn-info btn-success" name="state_id" id="states" title="Single Select" >
                                        @foreach($states as $state)
                                            <option value="{{ $state->id }}"  {{$state->id == $place->state->id ? 'selected' : ""}} > {{ $state->name }} </option>
                                        @endforeach
                                    </select>
                                        @if ($errors->has('state_id'))
                                            <span id="state_id-error" class="error text-danger" for="state_id">يجب أن تختار المحاقظة</span>
                                        @endif
                                    </div>
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



@endsection