@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('إدارة المستخدمين ')])

@section('content')
  <div style="margin-top:70px; ">
    <div style="margin: 20px" >
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title ">{{ __('المستخدمون') }}</h4>
              <p class="card-category"> {{ __(' هنا يمكنك إدارة المستخدمين' ) }}</p>
            </div>
            <div class="card-body">
              @if (session('status'))
                <div class="row">
                  <div class="col-sm-12">
                    <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                      </button>
                      <span>{{ session('status') }}</span>
                    </div>
                  </div>
                </div>
              @endif
              <div class="row">
                {{--<div class="col-12 text-right">--}}
                  {{--<a href="{{ route('user.create') }}" class="btn btn-sm btn-success">--}}
                    {{--<i class="material-icons">person_add</i>--}}
                    {{--{{ __(' إضافة مستخدم جديد') }}</a>--}}
                {{--</div>--}}
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-success">
                  <th>
                    {{ __('الإسم') }}
                  </th>
                  <th>
                    {{ __('البريد الإلكتروني') }}
                  </th>
                  <th>
                    {{__('نوع المستخدم')}}
                  </th>
                  <th>
                    {{ __('تاريخ الإنشاء ') }}
                  </th>
                  <th class="text-right">
                    {{ __('الأفعال') }}
                  </th>
                  </thead>
                  <tbody>

                  @foreach($users as $user)
                    <tr>
                      <td>
                        {{ $user->name }}
                      </td>
                      <td>
                        {{ $user->email }}
                      </td>
                      <td>
                       @if($user->is_admin)
                         مسؤول
                         @else
                        مستخدم عادي
                         @endif
                      </td>
                      <td>
                        {{ $user->created_at->format('Y-m-d') }}
                      </td>
                      <td class="td-actions text-right">
                        @if ($user->id != auth()->id())
                          <form action="{{ route('user.destroy', $user) }}" method="post">
                            @csrf
                            @method('delete')

                            <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('user.edit', $user) }}" data-original-title="" title="">
                              <i class="material-icons">edit</i>
                              <div class="ripple-container"></div>
                            </a>
                            <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("هل أنت متأكد من أنك تريد جذف هذا المستخدم ؟") }}') ? this.parentElement.submit() : ''">
                              <i class="material-icons">delete</i>
                              <div class="ripple-container"></div>
                            </button>
                          </form>
                        @else
                          <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('profile.edit') }}" data-original-title="" title="">
                            <i class="material-icons">edit</i>
                            <div class="ripple-container"></div>
                          </a>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                  {{$users->links()}}
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection