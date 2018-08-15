@extends('layouts.'.getTheme())
@section('css')
    <link href="{{asset(getThemeAssets('iCheck/custom.css', true))}}" rel="stylesheet">
    <style type="text/css">
        .img-default {
            width: 60px;
        }
    </style>
@endsection
@section('content')
    @inject('userPresenter','App\Repositories\Presenters\Admin\UserPresenter')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>{!! trans('articles.title') !!}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="javascript:;">{!! trans('articles.title') !!}</a>
                </li>
                <li>
                    <a href="{{ route('articles.index') }}">{!! trans('articles.viewList') !!}</a>
                </li>
                <li class="active">
                    <strong>{!! trans('common.create').trans('articles.slug') !!}</strong>
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
                        <h5>{!! trans('common.create').trans('articles.slug') !!}</h5>
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
                        <form method="post" action="{{ route('articles.store') }}" class="form-horizontal"
                              enctype="multipart/form-data" id="articles-form">

                            {{csrf_field()}}

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label class="col-sm-2 control-label">{{trans('articles.name')}}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                                           placeholder="{{ trans('articles.name') }}">
                                    @if ($errors->has('title'))
                                        <span class="help-block m-b-none text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group{{ $errors->has('intr') ? ' has-error' : '' }}">
                                <label class="col-sm-2 control-label">{{ trans('articles.intr') }}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="link" value="{{ old('intr') }}"
                                           placeholder="{{ trans('articles.intr') }}">
                                    @if ($errors->has('intr'))
                                        <span class="help-block m-b-none text-danger">{{ $errors->first('intr') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group{{ $errors->has('cover') ? ' has-error' : '' }}">
                                <label class="col-sm-2 control-label">{{ trans('articles.cover') }}</label>
                                <div class="col-sm-10">
                                    <img src="{{ asset('/images/1.jpeg') }}" class="img-default">

                                    <input type="file" class="form-control img-banner" name="cover"
                                           style="display: none;">
                                    @if ($errors->has('cover'))
                                        <span class="help-block m-b-none text-danger">{{ $errors->first('cover') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group{{ $errors->has('conent') ? ' has-error' : '' }}">
                                <label class="col-sm-2 control-label">{{ trans('articles.conent') }}</label>
                                <div class="col-sm-10">
                                    <div id="editor">
                                        <p>山有木兮 木有枝叶 心悦君兮 君不知</p>
                                    </div>
                                    @if ($errors->has('conent'))
                                        <span class="help-block m-b-none text-danger">{{ $errors->first('conent') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <a class="btn btn-white"
                                       href="{{ route('articles.index') }}">{!!trans('common.cancel')!!}</a>
                                    @if(haspermission('articlescontroller.store'))
                                        <button class="btn btn-primary" id="sub-btn"
                                                type="button">{!! trans('common.create') !!}</button>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--@include(getThemeView('user.modal'))--}}
@endsection
@section('js')
    <script src="{{ asset('/js/wangEditor.min.js') }}"></script>
    <script>
        var E = window.wangEditor;
        var editor = new E('#editor');
        // 或者 var editor = new E( document.getElementById('editor') )

        // 限制一次最多上传 5 张图片
        editor.customConfig.uploadImgMaxLength = 5;

        // 通过 url 参数配置 debug 模式。url 中带有 wangeditor_debug_mode=1 才会开启 debug 模式
        editor.customConfig.debug = location.href.indexOf('wangeditor_debug_mode=1') > 0;

        // 隐藏“网络图片”tab
        editor.customConfig.showLinkImg = false;
        // 上传图片到服务器
        editor.customConfig.uploadImgServer = "{{ route('wangEditor.upload.image') }}";

        editor.create();

        $(document).ready(function () {
            $('.img-default').on('click', function () {
                $(this).next().click();
            });

            $('.img-banner').on('change', function () {
                var file = this.files[0];
                var url = getObjectURL(file);

                $(this).prev().attr('src', url);
            });

            $('#sub-btn').on('click', function () {
                var html = editor.txt.html();
                console.log(html);


                // $('#articles-form').submit();
            });
        });

        function getObjectURL(file) {
            var url = null;
            if (window.createObjcectURL != undefined) {
                url = window.createOjcectURL(file);
            } else if (window.URL != undefined) {
                url = window.URL.createObjectURL(file);
            } else if (window.webkitURL != undefined) {
                url = window.webkitURL.createObjectURL(file);
            }
            return url;
        }
    </script>
@endsection