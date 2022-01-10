@extends('layouts.app', ['activePage' => 'search_history', 'titlePage' => __('سجل البحث ')])

@section('content')
    <div style="margin-top:70px; ">
        <div  >
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title ">{{ __('سجل البحث') }}</h4>
                            <p class="card-category"> {{ __(' هنا يمكنك إدارة سجل البحث' ) }}</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6">

                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-header card-header-success card-header-icon">
                                            <div class="card-icon">
                                                <i class="material-icons">emoji_people</i>
                                            </div>
                                            <p class="card-category">  </p>
                                            <h3 class="card-title">{{ $colleagues_number}}
                                                <small>أشخاص يبحثون عن نفس المواصفات</small>
                                            </h3>

                                        </div>
                                        <div class="card-footer">

                                            <div class="stats  mx-auto">
                                                {{--<a rel="tooltip" data-toggle="tooltip" data-placement="top" title="استعراض"--}}
                                                {{--class="btn btn-info  btn-link" href="{{ route('house.users',$similar_searches ) }}" data-original-title="" title="">--}}
                                                {{--<i class="material-icons">visibility</i>--}}
                                                {{--<div class="ripple-container"></div>--}}
                                                {{--</a>--}}


                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="{{ route('search_history.index2') }}" class="btn btn-sm btn-success">
                                        <span class="material-icons">keyboard_arrow_right</span>
                                        {{ __('الرجوع إلى القائمة') }}
                                    </a>
                                </div>
                            </div>

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

                            <div class="table-responsive">
                                <table class="table">
                                    @if($similar_searches->count()>0)
                                        <table class="table">
                                            <thead class=" text-success">
                                            <th>
                                                {{ __('الاسم') }}
                                            </th>
                                            <th>
                                                {{ __('البريد الإلكتروني') }}
                                            </th>

                                            </thead>
                                            <tbody>

                                            @foreach($similar_searches as $similar_search)
                                                <tr>
                                                    <td>
                                                        {{ $similar_search->user->name }}     {{ $similar_search->user->last_name }}
                                                    </td>
                                                    <td>
                                                        {{ $similar_search->user->email }}
                                                    </td>


                                                </tr>
                                            @endforeach
                                            </tbody>

                                        </table>
                                    @else
                                        لايوجد أي مستخدم يبحث عن نفس المواصفات
                                        @endif


                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="" id="deleteForm" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    هل أنت متأكد من انك تريد حذف هذا السجل ؟
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="material-icons">close</i> إغلاق</button>
                    <button type="button"  onclick="formSubmit()" class="btn btn-danger"><i class="material-icons">delete</i> حذف</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function deleteData(id)
        {
            var id = id;
            var url = '{{ route("search_history.destroy", ":id") }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit()
        {
            $("#deleteForm").submit();
        }
    </script>

@endsection