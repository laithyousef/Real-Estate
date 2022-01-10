<style>
   .badge {

    padding: 5px 10px;
    border-radius: 40%;
    background-color: red!important;
    color: white;
  }
</style>

<div class="sidebar" data-color="green" data-background-color="white" data-image="{{ "/img/vbb.jpg"}}"  >



  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="{{ route('home') }}" class="simple-text logo-normal">
      <img src="{{asset('img/house.png')}}" style="width: 50px;height: 50px;">
      {{ __('عقاري') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">

     <!-- <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
          <p>{{ __('الرئيسية') }}</p>
        </a>
      </li> -->
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse"  href="#laravelExample" aria-expanded="false" >
          <i class="material-icons">people_alt</i>
          <p>{{ __('المستخدمون') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse " id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('الحساب الشخصي') }} </span>
              </a>
            </li>
            @if(Auth::User()->is_admin)
              <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('user.index') }}">
                  <span class="sidebar-mini"> UM </span>
                  <span class="sidebar-normal"> {{ __('إدارة المستخدمين') }} </span>
                </a>
              </li>
            @endif


          </ul>
        </div>
      </li>

      <li class="nav-item{{ $activePage == 'houses' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('house.index') }}">
          <i class="material-icons">house</i>
          <p>{{ __(' المنازل') }}</p>
        </a>
      </li>
      @if(!Auth::User()->is_admin)
        <li class="nav-item{{ $activePage == 'favorites' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('favorite.index') }}">
            <i class="material-icons">favorite</i>
            <p>{{ __(' المفضلة') }}</p>
          </a>
        </li>

        <li class="nav-item{{ $activePage == 'search_history2' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('search_history.index2') }}">
            <i class="material-icons">history</i>
            <p>{{ __('سجل البحث مع زملاء  ') }}
             @if(Auth::user()->new_notification_number - Auth::user()->old_notification_number > 0)
              <span class="badge">
                {{Auth::user()->new_notification_number - Auth::user()->old_notification_number }}
              </span>
             @endif
            </p>

          </a>
        </li>
      @endif

      <li class="nav-item{{ $activePage == 'appointments' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('appointment.index') }}">
          <i class="material-icons">access_time</i>
          <p>{{ __(' المواعيد') }}
            @if(Auth::user()->new_appointments_number - Auth::user()->old_appointments_number > 0)
              <span class="badge">
                {{Auth::user()->new_appointments_number - Auth::user()->old_appointments_number }}
              </span>
            @endif
          </p>
        </a>
      </li>

      @if(Auth::User()->is_admin)
        <li class="nav-item{{ $activePage == 'owners' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('owner.index') }}">
            <i class="material-icons">emoji_people</i>
            <p>{{ __('مالكي المنازل') }}</p>
          </a>
        </li>

        <li class="nav-item{{ $activePage == 'search_history' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('search_history.index') }}">
            <i class="material-icons">history</i>
            <p>{{ __('سجلات بحث المستخدمين') }}</p>
          </a>
        </li>


        <li class="nav-item{{ $activePage == 'college_specialities' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('college_speciality.index') }}">
            <i class="material-icons">account_balance</i>
            <p>{{ __('الاختصاصات الجامعية ') }}</p>
          </a>
        </li>

        <li class="nav-item {{ ($activePage == 'states' || $activePage == 'user-management') ? ' active' : '' }}">
          <a class="nav-link" data-toggle="collapse" href="#collapseList2" aria-expanded="false">
            <i class="material-icons">my_location</i>
            <p>{{ __('الأماكن') }}
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse " id="collapseList2">
            <ul class="nav">
              <li class="nav-item{{ $activePage == 'states' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('state.index') }}">
                  <span class="sidebar-mini "><i class="material-icons">satellite</i> </span>
                  <span class="sidebar-normal">{{ __('المحافظات') }} </span>
                </a>
              </li>

              <li class="nav-item{{ $activePage == 'places' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('place.index') }}">
                  <span class="sidebar-mini "><i class="material-icons">location_city</i> </span>
                  <span class="sidebar-normal"> {{ __('المناطق ') }} </span>
                </a>
              </li>

            </ul>
          </div>
        </li>

      @endif

    </ul>
  </div>

</div>