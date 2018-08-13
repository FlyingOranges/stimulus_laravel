@extends('layouts.'.getTheme())
@section('css')
    <link href="{{asset(getThemeAssets('iCheck/custom.css', true))}}" rel="stylesheet">
    <style type="text/css">
        .img-default {
            width: 350px;
        }
    </style>
@endsection
@section('content')
    @inject('userPresenter','App\Repositories\Presenters\Admin\UserPresenter')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>{!! trans('banner.title') !!}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="javascript:;">{!! trans('banner.title') !!}</a>
                </li>
                <li>
                    <a href="{{ route('banners.index') }}">{!! trans('banner.viewList') !!}</a>
                </li>
                <li class="active">
                    <strong>{!! trans('common.create').trans('banner.slug') !!}</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
            <div class="title-action">
                <a class="btn btn-white" href="{{ route('banners.index') }}">
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
                        <h5>{!! trans('common.create').trans('banner.slug') !!}</h5>
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
                        <form method="post" action="{{ route('banners.store') }}" class="form-horizontal"
                              enctype="multipart/form-data">
                            
                            {{csrf_field()}}

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label class="col-sm-2 control-label">{{trans('banner.name')}}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title" value="{{old('title')}}"
                                           placeholder="{{ trans('banner.name') }}">
                                    @if ($errors->has('title'))
                                        <span class="help-block m-b-none text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                                <label class="col-sm-2 control-label">{{trans('banner.link')}}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="link" value="{{old('link')}}"
                                           placeholder="{{ trans('banner.link') }}">
                                    @if ($errors->has('sex'))
                                        <span class="help-block m-b-none text-danger">{{ $errors->first('link') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group{{ $errors->has('src') ? ' has-error' : '' }}">
                                <label class="col-sm-2 control-label">{{trans('banner.src')}}</label>
                                <div class="col-sm-10">
                                    <img src="{{ asset('/images/1.jpeg') }}" class="img-default">

                                    <input type="file" class="form-control img-banner" name="src"
                                           style="display: none;">
                                    @if ($errors->has('src'))
                                        <span class="help-block m-b-none text-danger">{{ $errors->first('src') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <a class="btn btn-white"
                                       href="{{ route('banners.index') }}">{!!trans('common.cancel')!!}</a>
                                    @if(haspermission('bannerscontroller.store'))
                                        <button class="btn btn-primary"
                                                type="submit">{!! trans('common.create') !!}</button>
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
    <script>
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