@extends('layouts.app', ['activePage' => 'owners', 'titlePage' => __('إدارة المستخدمين ')])

@section('content')
    <div style="margin-top:70px; ">
        <div style="margin: 20px" >
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title ">{{ __('مالكي المنازل') }}</h4>
                            <p class="card-category"> {{ __(' هنا يمكنك إدارة مالكي المنازل' ) }}</p>
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
                                <div class="col-12 text-right">
                                    <a href="{{ route('owner.create') }}" class="btn btn-sm btn-success">
                                        <i class="material-icons">person_add</i>
                                        {{ __(' إضافة مالك جديد') }}</a>
                                </div>

                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-success">
                                    <th>
                                        {{ __('الإسم') }}
                                    </th>
                                    <th>
                                        {{ __('الكنية ') }}
                                    </th>
                                    <th>
                                        {{__('رقم الهاتف')}}
                                    </th>
                                    <th>
                                        {{__('العنوان')}}
                                    </th>
                                    <th>
                                        {{ __('تاريخ الإنشاء ') }}
                                    </th>
                                    <th class="text-right">
                                        {{ __('الأفعال') }}
                                    </th>
                                    </thead>
                                    <tbody>

                                    @foreach($owners as $owner)
                                        <tr>
                                            <td>
                                                {{ $owner->first_name }}
                                            </td>
                                            <td>
                                                {{ $owner->last_name }}
                                            </td>
                                            <td>
                                                {{ $owner->phone_no }}
                                            </td>
                                            <td>
                                                {{ $owner->address }}
                                            </td>
                                            <td>
                                                {{ $owner->created_at->format('Y-m-d') }}
                                            </td>
                                            <td class="td-actions text-right">



                                                        <a rel="tooltip" data-toggle="tooltip" data-placement="top" title="تعديل"
                                                           class="btn btn-success btn-link" href="{{ route('owner.edit', $owner) }}" data-original-title="" title="">
                                                            <i class="material-icons">edit</i>
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                        <a
                                                                rel="tooltip"  data-placement="top" title="حذف"
                                                                class="btn btn-danger btn-link" data-original-title="" title=""
                                                                data-toggle="modal"  onclick="deleteData({{$owner->id}})" data-target="#exampleModal"
                                                                {{--onclick="confirm('{{ __("هل أنت متأكد من أنك تريد حذف هذا المالك ؟")  }}'+'{{$owner->first_name }}') ? this.parentElement.submit() : ''"--}}
                                                        >
                                                            <i class="material-icons">delete</i>
                                                            <div class="ripple-container"></div>
                                                        </a>






                                            </td>


                                        </tr>
                                    @endforeach
                                    </tbody>
                                   {{$owners->links()}}
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
                    هل أنت متأكد من انك تريد حذف هذا المالك ؟
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
            var url = '{{ route("owner.destroy", ":id") }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit()
        {
            $("#deleteForm").submit();
        }
    </script>

@endsection