@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'register', 'title' => __('عقاري')])

@section('content')
  <div class="container" style="height: auto;">
    <div class="row align-items-center">
      <div class="col-lg-9 col-md-7 col-sm-8 ml-auto mr-auto">
        <form class="form" method="POST" action="{{ route('register') }}">
          @csrf

          <div class="card card-login card-hidden mb-3">
            <div class="card-header card-header-success text-center">
              <h4 class="card-title"><strong>{{ __('إنشاء حساب') }}</strong></h4>
              <div class="social-line">
                {{--<a href="#pablo" class="btn btn-just-icon btn-link btn-white">--}}
                {{--<i class="fa fa-facebook-square"></i>--}}
                {{--</a>--}}
                {{--<a href="#pablo" class="btn btn-just-icon btn-link btn-white">--}}
                {{--<i class="fa fa-twitter"></i>--}}
                {{--</a>--}}
                {{--<a href="#pablo" class="btn btn-just-icon btn-link btn-white">--}}
                {{--<i class="fa fa-google-plus"></i>--}}
                {{--</a>--}}
              </div>
            </div>
            <div class="card-body ">
              <div class="row">
                <div class="col-md-6 ">
                  {{--<p class="card-description text-center">{{ __('Or Be Classical') }}</p>--}}
                  <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <div class="input-group">
                      <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">face</i>
                    </span>
                      </div>
                      <input type="text" name="name" class="form-control" placeholder="{{ __('الإسم...') }}" value="{{ old('name') }}" required>
                    </div>
                    @if ($errors->has('name'))
                      <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                        <strong>{{ $errors->first('name') }}</strong>
                      </div>
                    @endif
                  </div>

                  <div class="bmd-form-group{{ $errors->has('mid_name') ? ' has-danger' : '' }}">
                    <div class="input-group">
                      <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">sort_by_alpha</i>
                    </span>
                      </div>
                      <input type="text" name="mid_name" class="form-control" placeholder="{{ __('اسم الأب...') }}" value="{{ old('mid_name') }}" required>
                    </div>
                    @if ($errors->has('mid_name'))
                      <div id="name-error" class="error text-danger pl-3" for="mid_name" style="display: block;">
                        <strong>{{ $errors->first('mid_name') }}</strong>
                      </div>
                    @endif
                  </div>

                  <div class="bmd-form-group{{ $errors->has('last_name') ? ' has-danger' : '' }}">
                    <div class="input-group">
                      <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">family_restroom</i>
                    </span>
                      </div>
                      <input type="text" name="last_name" class="form-control" placeholder="{{ __('الكنية ...') }}" value="{{ old('last_name') }}" required>
                    </div>
                    @if ($errors->has('mid_name'))
                      <div id="name-error" class="error text-danger pl-3" for="last_name" style="display: block;">
                        <strong>{{ $errors->first('last_name') }}</strong>
                      </div>
                    @endif
                  </div>

                  <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
                    <div class="input-group">
                      <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">email</i>
                    </span>
                      </div>
                      <input type="email" name="email" class="form-control" placeholder="{{ __('البريد الإلكتروني...') }}" value="{{ old('email') }}" required>
                    </div>
                    @if ($errors->has('email'))
                      <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                        <strong>{{ $errors->first('email') }}</strong>
                      </div>
                    @endif
                  </div>

                  <div class="bmd-form-group{{ $errors->has('birthday') ? ' has-danger' : '' }} mt-3">
                    <div class="input-group">
                      <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">cake</i>
                    </span>
                      </div>
                      <input type="date" name="birthday" id="birthday" class="form-control" placeholder="{{ __('birthday...') }}" required>
                    </div>
                    @if ($errors->has('birthday'))
                      <div id="password_confirmation-error" class="error text-danger pl-3" for="birthday" style="display: block;">
                        <strong>{{ $errors->first('birthday') }}</strong>
                      </div>
                    @endif
                  </div>

                </div>
                <div class="col-md-6  ">
                  <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                    <div class="input-group">
                      <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                      </div>
                      <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('كلمة المرور...') }}" required>
                    </div>
                    @if ($errors->has('password'))
                      <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                        <strong>{{ $errors->first('password') }}</strong>
                      </div>
                    @endif
                  </div>

                  <div class="bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
                    <div class="input-group">
                      <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                      </div>
                      <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('تأكيد كلمة المرور...') }}" required>
                    </div>
                    @if ($errors->has('password_confirmation'))
                      <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                      </div>
                    @endif
                  </div>

                  <div class="bmd-form-group{{ $errors->has('sex') ? ' has-danger' : '' }} mt-3">
                    <div class="input-group">
                      <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">wc</i>
                    </span>
                      </div>
                      <div class="form-check form-check-radio form-check-inline" style="padding-left: 18px;
      padding-right: 18px;">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="sex" id="inlineRadio1" value="male" checked>
                          ذكر
                          <span class="circle">
                         <span class="check"></span>
                      </span>
                        </label>
                      </div>
                      <div class="form-check form-check-radio form-check-inline" style="padding-left: 18px;
      padding-right: 18px;">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="sex" id="inlineRadio2" value="female">
                          انثى
                          <span class="circle">
                          <span class="check"></span>
                      </span>
                        </label>
                      </div>

                    </div>

                  </div>

                  <div class="bmd-form-group mt-3">
                    <div class="input-group">
                      <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">student</i>
                    </span>
                      </div>
                      <div class="form-check form-check-radio form-check-inline" style="padding-left: 18px;
      padding-right: 18px;">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="speciality" onclick="showCollegeSpecialities()" id="isStudentId" value="student" checked >
                          طالب
                          <span class="circle">
                         <span class="check"></span>
                      </span>
                        </label>
                      </div>
                      <div class="form-check form-check-radio form-check-inline" style="padding-left: 18px;
      padding-right: 18px;">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="speciality" onclick="hideCollegeSpecialities()" id="isNotStudentId" value="notStudent" >
                          غير طالب
                          <span class="circle">
                          <span class="check"></span>
                      </span>
                        </label>
                      </div>

                      <div id="college_specialities_group" >
                        {{--<label class="col-sm-2 col-form-label">{{ __('الاختصاص ') }}</label>--}}
                        <div class="col-sm-7">
                          <select class="selectpicker" data-style="btn btn-info btn-success" name="college_speciality_id" id="college_specialities" title="Single Select" >
                            <option disabled selected> اختر الاختصاص</option>
                            @foreach($college_specialities as $college_speciality)
                              <option value="{{$college_speciality->id}}" >{{$college_speciality->name}}</option>
                            @endforeach
                          </select>
                          @if ($errors->has('college_speciality_id'))
                            <span id="college_speciality_id-error" class="error text-danger" for="college_speciality_id">يجب أن تختار الاختصاص</span>
                          @endif
                        </div>
                      </div>
                    </div>

                  </div>

                </div>

              </div>


              <div class="form-check mr-auto ml-3 mt-3">
                {{--<label class="form-check-label">--}}
                {{--<input class="form-check-input" type="checkbox" id="policy" name="policy" {{ old('policy', 1) ? 'checked' : '' }} >--}}
                {{--<span class="form-check-sign">--}}
                {{--<span class="check"></span>--}}
                {{--</span>--}}
                {{--{{ __('I agree with the ') }} <a href="#">{{ __('Privacy Policy') }}</a>--}}
                {{--</label>--}}
              </div>
            </div>
            <div class="card-footer justify-content-center">
              <button type="submit" class="btn btn-success  btn-lg">{{ __('إنشاء') }}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <script>
      var selectEl=document.getElementById('college_speciality_id');
      var specialities=document.getElementById('college_specialities_group');

      function showCollegeSpecialities() {
          specialities.hidden=false;
      }
      function hideCollegeSpecialities() {
          specialities.hidden=true;
          selectEl.value='';
      }

  </script>

@endsection
