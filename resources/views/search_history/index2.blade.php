@extends('layouts.app', ['activePage' => 'search_history2', 'titlePage' => __('سجل البحث ')])

@section('content')
    <div style="margin-top:70px; ">
        <div >
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title ">{{ __('سجل البحث') }}</h4>
                            <p class="card-category"> {{ __(' هنا يمكنك إدارة سجل البحث' ) }}</p>
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

                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-success">
                                    <th>
                                        {{ __('أقل سعر') }}
                                    </th>
                                    <th>
                                        {{ __('أعلى سعر ') }}
                                    </th>
                                    <th>
                                        {{__('المنطقة')}}
                                    </th>
                                    <th>
                                        {{__('عدد الغرف')}}
                                    </th>
                                    <th>
                                        {{__('عدد الزملاء')}}
                                    </th>
                                    <th>
                                        {{__('الجنس')}}
                                    </th>
                                    <th>
                                        {{__('طلاب')}}
                                    </th>
                                    <th>
                                        {{__('الاختصاص')}}
                                    </th>
                                    <th>
                                        {{__('التاريخ')}}
                                    </th>

                                    <th class="text-right">
                                        {{ __('الأفعال') }}
                                    </th>
                                    </thead>
                                    <tbody>

                                    @foreach($search_history as $search)
                                        <tr>
                                            <td>
                                                {{ $search->lowest_price}}
                                            </td>
                                            <td>
                                                {{ $search->highest_price }}
                                            </td>
                                            <td>
                                                {{\App\Models\Place::find($search->place_id)["name"]}}
                                            </td>
                                            <td>
                                                {{ $search->rooms_number}}
                                            </td>
                                            <td>
                                                {{ $search->colleagues_number}}
                                            </td>
                                            <td>
                                                {{($search->sex =='males')?'ذكور':"إناث"}}
                                            </td>
                                            <td>
                                                {{ $search->are_students}}
                                            </td>
                                            <td>
                                                {{\App\Models\CollegeSpeciality::find($search->college_speciality_id)["name"]}}
                                            </td>
                                            <td>
                                                {{ $search->created_at}}
                                            </td>

                                            <td class="td-actions text-right">




                                                        <a
                                                                rel="tooltip"  data-placement="top" title="حذف"
                                                                class="btn btn-danger btn-link" data-original-title="" title=""
                                                                data-toggle="modal"  onclick="deleteData({{ $search->id }})" data-target="#exampleModal"

                                                        >
                                                            <i class="material-icons">delete</i>
                                                            <div class="ripple-container"></div>
                                                        </a>


                                                <a rel="tooltip" data-toggle="tooltip" data-placement="top" title="المزيد من التفاصيل"
                                                   class="btn btn-info btn-link" href="{{ route('search_history.show', $search) }}" data-original-title="" title="">
                                                    <i class="material-icons">visibility</i>
                                                    <div class="ripple-container"></div>
                                                </a>



                                            </td>


                                        </tr>
                                    @endforeach
                                    </tbody>
                                   {{--{{$owners->links()}}--}}
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
                    هل أنت متأكد من انك تريد حذف هذا البحث  ؟
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
            var url = '{{ route("search_history.destroy2", ":id") }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit()
        {
            $("#deleteForm").submit();
        }
    </script>

@endsection