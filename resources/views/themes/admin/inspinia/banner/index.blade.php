@extends('layouts.'.getTheme())
@section('css')
    <link href="{{asset(getThemeAssets('dataTables/datatables.min.css', true))}}" rel="stylesheet">
    <style type="text/css">
        .table-image {
            width: 50px;
            height: 50px;
        }

        table {
            text-align: center;
            line-height: 50px;
        }
    </style>
@endsection
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>{!!trans('banner.title')!!}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('admin')}}">{!!trans('home.title')!!}</a>
                </li>
                <li class="active">
                    <strong>{!!trans('banner.title')!!}</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
            <div class="title-action">
                @if(haspermission('bannerscontroller.create'))
                    <a href="{{route('banners.create')}}" class="btn btn-info">
                        <i class="fa fa-plus"></i> {!!trans('common.create').trans('banner.slug')!!}
                    </a>
                @endif
            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>{!!trans('banner.title')!!}</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        @include('flash::message')

                        <div id="dataTableBuilder_wrapper"
                             class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            <div class="row">
                                <div class="col-sm-6">
                                    <form action="">
                                        <div class="dataTables_length" id="dataTableBuilder_length">
                                            <label>
                                                搜索:
                                                <input type="search" class="form-control input-sm" name="search"
                                                       placeholder="请输入轮播图标题" aria-controls="dataTableBuilder"
                                                       value="{{ $search or '' }}">
                                            </label>

                                            <button class="btn btn-sm btn-primary">确定</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-striped table-bordered table-hover dataTable no-footer"
                                           id="dataTableBuilder" role="grid" aria-describedby="dataTableBuilder_info">
                                        <thead>
                                        <tr role="row">
                                            <th>序号</th>
                                            <th>图片</th>
                                            <th>标题</th>
                                            <th>链接</th>
                                            <th>创建时间</th>
                                            <th>修改时间</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($data as $item)
                                            <tr role="row" class="odd">
                                                <td>{{ $item->id }}</td>
                                                <td>
                                                    <img class="table-image" src="{{ getCover($item->src)->path }}">
                                                </td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->link }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td>
                                                    <a href="{{ route('banners.show',['id'=>encodeId($item->id)]) }}"
                                                       class="btn btn-xs btn-info tooltips">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('banners.edit',['id'=>encodeId($item->id)]) }}"
                                                       class="btn btn-xs btn-outline btn-warning tooltips">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="javascript:;"
                                                       data-url="{{ route('banners.destroy',['id'=>encodeId($item->id)]) }}"
                                                       class="btn btn-xs btn-outline btn-danger tooltips destroy_item">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="dataTables_paginate paging_simple_numbers"
                                         id="dataTableBuilder_paginate">
                                        {!! $data->appends(['search'=>$search])->links() !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset(getThemeAssets('layer/layer.js', true))}}"></script>
    <script type="text/javascript">
        $(document).on('click', '.destroy_item', function () {
            var _item = $(this);
            var title = "{{ trans('common.deleteTitle').trans('banner.slug') }}？";
            layer.confirm(title, {
                btn: ['{{ trans('common.yes') }}', '{{ trans('common.no') }}'],
                icon: 5
            }, function (index) {
                // _item.children('form').submit();
                $.ajax({
                    url: _item.attr('data-url'),
                    data: {_token: "{{ csrf_token() }}"},
                    type: 'delete',
                    success: function (e) {
                        console.log(e);
                        if (e.code != 0) {
                            layer.alert(e.message);
                            return false;
                        }

                        layer.alert(e.message, function () {
                            location.reload(true);
                        });
                    }
                });
            });
        });
    </script>
@endsection