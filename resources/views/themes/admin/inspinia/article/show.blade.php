@extends('layouts.'.getTheme())
@section('css')
    <link href="{{asset(getThemeAssets('iCheck/custom.css', true))}}" rel="stylesheet">
@endsection
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>{!! trans('articles.title') !!}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="javascript:;">{!! trans('home.title') !!}</a>
                </li>
                <li>
                    <a href="{{ route('articles.index') }}">{!! trans('articles.title') !!}</a>
                </li>
                <li class="active">
                    <strong>{!! trans('common.show').trans('articles.slug') !!}</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
            <div class="title-action">
                <a class="btn btn-white" href="{{ route('articles.index') }}">
                    <i class="fa fa-reply"></i>
                    {!! trans('common.cancel') !!}
                </a>
            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>{!! trans('common.show').trans('articles.slug') !!}</h5>
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
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ trans('articles.name') }}</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static">{{ $data->title }}</p>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ trans('articles.intr') }}</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static">{{ $data->intr }}</p>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ trans('articles.cover') }}</label>
                                <div class="col-sm-10">
                                    <img src="{{ getCover($data->cover)->path }}" style="width: 50px;">
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ trans('articles.conent') }}</label>
                                <div class="col-sm-10">
                                    <div id="editor">
                                        {!! $data->conent !!}
                                    </div>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ trans('common.created_at') }}</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static">{{ $data->created_at }}</p>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ trans('common.updated_at') }}</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static">{{ $data->updated_at }}</p>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <a class="btn btn-white"
                                       href="{{ route('articles.index') }}">{!! trans('common.cancel') !!}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('/js/wangEditor.min.js') }}"></script>
    <script>
        var E = window.wangEditor;
        var editor = new E('#editor');

        editor.create();
    </script>
@endsection