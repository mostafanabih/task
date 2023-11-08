@extends('layouts.admin.master')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">

@endpush

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>المقالات</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">الرئيسية</a></li>
                        <li class="breadcrumb-item">المقالات </li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <!-- Bookmark Start-->
                    <div class="bookmark">
                        <ul>
                            <li><a href="{{route('posts.create')}}" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Chat"><i data-feather="message-square"></i></a></li>
                        </ul>
                    </div>
                    <!-- Bookmark Ends-->
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            @if(Session::has('success'))

                <div class="alert alert-success">{{Session::get('success')}}</div>

            @endif
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                <tr>
                                    <th>العنوان</th>
                                    <th>المحتوي</th>
                                    <th>صاحب المقال</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $info)
                                <tr>
                                    <td>{{$info->title}}</td>
                                    <td>{{$info->content}}</td>
                                    <td>{{$info->user->name}}</td>
                                    <td>
                                        <div class="btn-group btn-group-pill" role="group" aria-label="Basic example">
                                            <a class="btn btn-primary" type="button" href="{{route('posts.edit',$info->id)}}">تعديل</a>
                                            
                                            <a data-bs-toggle="modal" data-bs-target="#delete{{ @$info->id }}" class="btn btn-danger ms-1" type="button">حذف</a>
                                        </div>
                                        <div id="delete{{ @$info->id }}" class="modal fade" role="dialog">
                                            <form action="{{route('posts.destroy',$info->id)}}" method="post" >
                                                @csrf
                                                {{method_field('DELETE')}}
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        <h4 class="modal-title">هل انت متأكد من إتمام عملية الحذف؟</h4>
                                                    </div>
                                                    <div class="modal-footer d-flex align-items-center justify-content-center">
                                                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">لا</button>

                                                        <button type="submit" class="btn btn-danger">نعم</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                               @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Zero Configuration  Ends-->
            <!-- Feature Unable /Disable Order Starts-->


        </div>
    </div>


    @push('scripts')
        <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    @endpush

@endsection