<div class="wrapper "    >
  @include('layouts.navbars.sidebar')
  <div class="main-panel" style="background-image: url('{{asset('/img/bb.png')}}');background-repeat: no-repeat;background-size: cover;background-position: center;">
    @include('layouts.navbars.navs.auth')

    @yield('content')


    @include('layouts.footers.auth')
  </div>
</div>