@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Update Alert Settings
    @parent
@stop

@section('header_right')
    <a href="{{ route('settings.index') }}" class="btn btn-primary"> {{ trans('general.back') }}</a>
@stop


{{-- Page content --}}
@section('content')

    <style>
        .checkbox label {
            padding-right: 40px;
        }
    </style>


    {{ Form::open(['method' => 'POST', 'files' => false, 'autocomplete' => 'off', 'class' => 'form-horizontal', 'role' => 'form' ]) }}
    <!-- CSRF Token -->
    {{csrf_field()}}

    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">


            <div class="panel box box-default">
                <div class="box-header with-border">
                    <h2 class="box-title">
                        <i class="fa fa-bell"></i> Alerts
                    </h2>
                </div>
                <div class="box-body">


                    <div class="col-md-11 col-md-offset-1">

                        <!-- Alerts Enabled -->
                        <div class="form-group {{ $errors->has('alerts_enabled') ? 'error' : '' }}">
                            <div class="col-md-3">
                                {{ Form::label('alerts_enabled', trans('admin/settings/general.alerts_enabled')) }}
                            </div>
                            <div class="col-md-5">
                                {{ Form::checkbox('alerts_enabled', '1', Input::old('alerts_enabled', $setting->alerts_enabled),array('class' => 'minimal')) }}
                                {{ trans('general.yes') }}
                            </div>
                        </div>

                        <!-- Menu Alerts Enabled -->
                        <div class="form-group {{ $errors->has('show_alerts_in_menu') ? 'error' : '' }}">
                            <div class="col-md-3">
                                {{ Form::label('show_alerts_in_menu', trans('admin/settings/general.show_alerts_in_menu')) }}
                            </div>
                            <div class="col-md-5">
                                {{ Form::checkbox('show_alerts_in_menu', '1', Input::old('show_alerts_in_menu', $setting->show_alerts_in_menu),array('class' => 'minimal')) }}
                                {{ trans('general.yes') }}
                            </div>
                        </div>



                        <!-- Alert Email -->
                        <div class="form-group {{ $errors->has('alert_email') ? 'error' : '' }}">
                            <div class="col-md-3">
                                {{ Form::label('alert_email', trans('admin/settings/general.alert_email')) }}
                            </div>
                            <div class="col-md-7">
                                {{ Form::text('alert_email', Input::old('alert_email', $setting->alert_email), array('class' => 'form-control','placeholder' => 'admin@yourcompany.com')) }}
                                {!! $errors->first('alert_email', '<span class="alert-msg" aria-hidden="true">:message</span><br>') !!}

                                <p class="help-block">Email addresses or distribution lists you want alerts to be sent to, comma separated</p>


                            </div>
                        </div>


                        <!-- Admin CC Email -->
                        <div class="form-group {{ $errors->has('admin_cc_email') ? 'error' : '' }}">
                            <div class="col-md-3">
                                {{ Form::label('admin_cc_email', trans('admin/settings/general.admin_cc_email')) }}
                            </div>
                            <div class="col-md-7">
                                {{ Form::text('admin_cc_email', Input::old('admin_cc_email', $setting->admin_cc_email), array('class' => 'form-control','placeholder' => 'admin@yourcompany.com')) }}
                                {!! $errors->first('admin_cc_email', '<span class="alert-msg" aria-hidden="true">:message</span><br>') !!}

                                <p class="help-block">{{ trans('admin/settings/general.admin_cc_email_help') }}</p>


                            </div>
                        </div>

                        <!-- Alert interval -->
                        <div class="form-group {{ $errors->has('alert_interval') ? 'error' : '' }}">
                            <div class="col-md-3">
                                {{ Form::label('alert_interval', trans('admin/settings/general.alert_interval')) }}
                            </div>
                            <div class="col-md-9">
                                {{ Form::text('alert_interval', Input::old('alert_interval', $setting->alert_interval), array('class' => 'form-control','placeholder' => '30', 'maxlength'=>'3', 'style'=>'width: 60px;')) }}
                                {!! $errors->first('alert_interval', '<span class="alert-msg" aria-hidden="true">:message</span>') !!}
                            </div>
                        </div>

                        <!-- Alert threshold -->
                        <div class="form-group {{ $errors->has('alert_threshold') ? 'error' : '' }}">
                            <div class="col-md-3">
                                {{ Form::label('alert_threshold', trans('admin/settings/general.alert_inv_threshold')) }}
                            </div>
                            <div class="col-md-9">
                                {{ Form::text('alert_threshold', Input::old('alert_threshold', $setting->alert_threshold), array('class' => 'form-control','placeholder' => '5', 'maxlength'=>'3', 'style'=>'width: 60px;')) }}
                                {!! $errors->first('alert_threshold', '<span class="alert-msg" aria-hidden="true">:message</span>') !!}
                            </div>
                        </div>


                        <!-- Alert interval -->
                        <div class="form-group {{ $errors->has('audit_interval') ? 'error' : '' }}">
                            <div class="col-md-3">
                                {{ Form::label('audit_interval', trans('admin/settings/general.audit_interval')) }}
                            </div>
                            <div class="input-group col-md-2">
                                {{ Form::text('audit_interval', Input::old('audit_interval', $setting->audit_interval), array('class' => 'form-control','placeholder' => '12', 'maxlength'=>'3', 'style'=>'width: 60px;')) }}
                                <span class="input-group-addon">{{ trans('general.months') }}</span>
                            </div>
                            <div class="col-md-9 col-md-offset-3">
                                {!! $errors->first('audit_interval', '<span class="alert-msg" aria-hidden="true">:message</span>') !!}
                                <p class="help-block">{{ trans('admin/settings/general.audit_interval_help') }}</p>
                            </div>
                        </div>

                        <!-- Alert threshold -->
                        <div class="form-group {{ $errors->has('audit_warning_days') ? 'error' : '' }}">
                            <div class="col-md-3">
                                {{ Form::label('audit_warning_days', trans('admin/settings/general.audit_warning_days')) }}
                            </div>
                            <div class="input-group col-md-2">
                                {{ Form::text('audit_warning_days', Input::old('audit_warning_days', $setting->audit_warning_days), array('class' => 'form-control','placeholder' => '14', 'maxlength'=>'3', 'style'=>'width: 60px;')) }}
                                <span class="input-group-addon">{{ trans('general.days') }}</span>




                            </div>
                            <div class="col-md-9 col-md-offset-3">
                                {!! $errors->first('audit_warning_days', '<span class="alert-msg" aria-hidden="true">:message</span>') !!}
                                <p class="help-block">{{ trans('admin/settings/general.audit_warning_days_help') }}</p>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('audit_warning_days_1') ? 'error' : '' }}">
                            <div class="col-md-3">
                                {{ Form::label("Báo tài sản sắp hết hạn bảo hành") }}
                            </div>
                            <div class="col-md-9">
                                <div class="input-group" style="width:100px;float:left">
                                    {{ Form::text('audit_warning_days_1', Input::old('audit_warning_days_1', $setting->audit_warning_days_1), array('class' => 'form-control','placeholder' => '14', 'maxlength'=>'3', 'style'=>'width: 60px;')) }}
                                    <span class="input-group-addon">{{ trans('general.days') }}</span>
                                </div>
                                <div class="input-group" style="width:100px;float:left;text-align: center;">
                                    {{ Form::checkbox('audit_warning_days_1_email', '1', Input::old('audit_warning_days_1_email', $setting->audit_warning_days_1_email),array('class' => 'minimal')) }}
                                    Email
                                </div>
                                <div class="input-group" style="width:100px;float:left;text-align: center;">
                                    {{ Form::checkbox('audit_warning_days_1_notification', '1', Input::old('audit_warning_days_1_notification', $setting->audit_warning_days_1_notification),array('class' => 'minimal')) }}
                                    Notification
                                </div>
                            </div>
                            <div class="col-md-9 col-md-offset-3">
                                {!! $errors->first('audit_warning_days_1', '<span class="alert-msg" aria-hidden="true">:message</span>') !!}
                                <p class="help-block">Cảnh báo bạn trước bao nhiêu ngày khi tài sản hết bảo hành</p>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('audit_warning_days_2') ? 'error' : '' }}">
                            <div class="col-md-3">
                                {{ Form::label("Báo tài sản sắp hết khấu hao") }}
                            </div>
                            <div class="col-md-9">
                                <div class="input-group" style="width:100px;float:left">
                                    {{ Form::text('audit_warning_days_2', Input::old('audit_warning_days_2', $setting->audit_warning_days_2), array('class' => 'form-control','placeholder' => '14', 'maxlength'=>'3', 'style'=>'width: 60px;')) }}
                                    <span class="input-group-addon">{{ trans('general.days') }}</span>
                                </div>
                                <div class="input-group" style="width:100px;float:left;text-align: center;">
                                    {{ Form::checkbox('audit_warning_days_2_email', '1', Input::old('audit_warning_days_2_email', $setting->audit_warning_days_2_email),array('class' => 'minimal')) }}
                                    Email
                                </div>
                                <div class="input-group" style="width:100px;float:left;text-align: center;">
                                    {{ Form::checkbox('audit_warning_days_2_notification', '1', Input::old('audit_warning_days_2_notification', $setting->audit_warning_days_2_notification),array('class' => 'minimal')) }}
                                    Notification
                                </div>
                            </div>
                            <div class="col-md-9 col-md-offset-3">
                                {!! $errors->first('audit_warning_days_2', '<span class="alert-msg" aria-hidden="true">:message</span>') !!}
                                <p class="help-block">Cảnh báo bạn trước bao nhiêu ngày khi tài sản hết khấu hao</p>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('audit_warning_days_3') ? 'error' : '' }}">
                            <div class="col-md-3">
                                {{ Form::label("Báo phần mềm sắp hết hạn bản quyền") }}
                            </div>
                            <div class="col-md-9">
                                <div class="input-group" style="width:100px;float:left">
                                    {{ Form::text('audit_warning_days_3', Input::old('audit_warning_days_3', $setting->audit_warning_days_3), array('class' => 'form-control','placeholder' => '14', 'maxlength'=>'3', 'style'=>'width: 60px;')) }}
                                    <span class="input-group-addon">{{ trans('general.days') }}</span>
                                </div>
                                <div class="input-group" style="width:100px;float:left;text-align: center;">
                                {{ Form::checkbox('audit_warning_days_3_email', '1', Input::old('audit_warning_days_3_email', $setting->audit_warning_days_3_email),array('class' => 'minimal')) }}
                                Email
                                </div>
                                <div class="input-group" style="width:100px;float:left;text-align: center;">
                                {{ Form::checkbox('audit_warning_days_3_notification', '1', Input::old('audit_warning_days_3_notification', $setting->audit_warning_days_3_notification),array('class' => 'minimal')) }}
                                Notification
                                </div>
                            </div>
                            <div class="col-md-9 col-md-offset-3">
                                {!! $errors->first('audit_warning_days_3', '<span class="alert-msg" aria-hidden="true">:message</span>') !!}
                                <p class="help-block">Cảnh báo bạn trước bao nhiêu ngày khi phần mềm hết hạn bản quyền</p>
                            </div>
                        </div>
                    </div>

                </div> <!--/.box-body-->
                <div class="box-footer">
                    <div class="text-left col-md-6">
                        <a class="btn btn-link text-left" href="{{ route('settings.index') }}">{{ trans('button.cancel') }}</a>
                    </div>
                    <div class="text-right col-md-6">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check icon-white" aria-hidden="true"></i> {{ trans('general.save') }}</button>
                    </div>

                </div>
            </div> <!-- /box -->
        </div> <!-- /.col-md-8-->
    </div> <!-- /.row-->

    {{Form::close()}}

@stop

