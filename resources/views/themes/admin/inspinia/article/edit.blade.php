@extends('layouts.'.getTheme())
@section('css')
    <link href="{{asset(getThemeAssets('iCheck/custom.css', true))}}" rel="stylesheet">
    <style type="text/css">
        .img-default {
            width: 50px;
        }
    </style>
@endsection
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>{!! trans('articles.title') !!}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="javasctipt:;">{!! trans('home.title') !!}</a>
                </li>
                <li>
                    <a href="{{ route('articles.index') }}">{!! trans('articles.title') !!}</a>
                </li>
                <li class="active">
                    <strong>{!! trans('common.edit').trans('articles.slug') !!}</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
            <div class="title-action">
                <a class="btn btn-white" href="{{ route('articles.index') }}">
                    <i class="fa fa-reply"></i> {!! trans('common.cancel') !!}
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
                        <form method="post" action="{{ route('articles.update', [encodeId($data->id, 'id')]) }}"
                              class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label class="col-sm-2 control-label">{{ trans('articles.name') }}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title"
                                           value="{{ old('name', $data->title) }}"
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
                                    <input type="text" class="form-control" name="intr"
                                           value="{{ old('intr', $data->intr) }}"
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
                                    <img src="{{ old('cover', getCover($data->cover)->path) }}" class="img-default">

                                    <input type="file" class="img-banner" name="cover" style="display: none;">
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
                                        {!! $data->conent !!}
                                    </div>
                                    <textarea name="conent" id="conent-textarea" style="display: none;"></textarea>
                                    @if ($errors->has('conent'))
                                        <span class="help-block m-b-none text-danger">{{ $errors->first('conent') }}</span>
                                    @endif
                                </div>
                            </div>


                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <a class="btn btn-white"
                                       href="{{ route('articles.index') }}">{!! trans('common.cancel') !!}</a>
                                    @if(haspermission('articlescontroller.update'))
                                        <button class="btn btn-primary" type="submit">
                                            {!! trans('common.edit') !!}
                                        </button>
                                    @endif
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
        // 或者 var editor = new E( document.getElementById('editor') )

        // 限制一次最多上传 5 张图片
        editor.customConfig.uploadImgMaxLength = 5;

        // 通过 url 参数配置 debug 模式。url 中带有 wangeditor_debug_mode=1 才会开启 debug 模式
        editor.customConfig.debug = location.href.indexOf('wangeditor_debug_mode=1') > 0;

        // 隐藏“网络图片”tab
        editor.customConfig.showLinkImg = false;
        // 上传图片到服务器
        editor.customConfig.uploadImgServer = "{{ route('wangEditor.upload.image') }}";

        var $text1 = $('#conent-textarea');
        editor.customConfig.onchange = function (html) {
            // 监控变化，同步更新到 textarea
            $text1.val(html)
        }
        editor.create();
        // 初始化 textarea 的值
        $text1.val(editor.txt.html())

        $(document).ready(function () {
            $('.img-default').on('click', function () {
                $(this).next().click();
            });

            $('.img-banner').on('change', function () {
                var file = this.files[0];
                var url = getObjectURL(file);

                $(this).prev().attr('src', url);
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