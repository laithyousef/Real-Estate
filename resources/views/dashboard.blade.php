@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div style="margin-top:70px; ">
    <div style="margin: 20px" >
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">house</i>
              </div>
              <p class="card-category">يوجد لدينا </p>
              <h3 class="card-title">{{\App\Models\House::all()->count()}}
                <small>منزل للإيجار</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">

                {{--<a href="#pablo">Get More Space...</a>--}}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">emoji_people</i>
              </div>
              <p class="card-category">  </p>
              <h3 class="card-title">{{\App\Models\Owner::all()->count()}}
                <small>عميل</small>
              </h3>

            </div>
            <div class="card-footer">
              <div class="stats">
                {{--<i class="material-icons">date_range</i> Last 24 Hours--}}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">people_alt</i>
              </div>
              <p class="card-category"> </p>
              <h3 class="card-title">{{\App\User::all()->count()}}
              <small>مستخدم</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                {{--<i class="material-icons">local_offer</i> Tracked from Github--}}
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="row  align-content-center">
        <div class="col-lg-2 " ></div>
        <div class="col-lg-10">
          <h3> هنا يمكنك ايجاد المنزل الذي تبحث عنه للإيجار سواء لوحدك أو تريد زملاء سكن </h3>
        </div>
        <div class="col-lg-2"></div>

      </div>

    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush