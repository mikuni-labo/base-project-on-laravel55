@extends('layouts.base')

@section('meta')
    <title>パスワード再設定｜{{ config('app.name') }}</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-danger">
                    <div class="panel-heading lead"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>&nbsp;パスワード再設定</div>
                    <div class="panel-body">
                        @if( session('status') )
                            <div class="alert alert-success">{{ session('status') }}</div>
                        @endif

                        {!! Form::open(['url' => route('password.request'), 'method' => 'post', 'class' => 'form-horizontal']) !!}
                            {!! Form::hidden('token', $token, []) !!}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">メールアドレス<span class="attention">*</span></label>

                                <div class="col-md-6">
                                    {!! Form::email('email', $email or old('email'), ['required', 'autofocus', 'class' => 'form-control', 'id' => 'email', 'maxlength' => '191', 'placeholder' => '']) !!}

                                    @if( $errors->has('email') )
                                        <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">パスワード<span class="attention">*</span></label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required />

                                    @if( $errors->has('password') )
                                        <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm" class="col-md-4 control-label">パスワード（確認）<span class="attention">*</span></label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required />

                                    @if( $errors->has('password_confirmation') )
                                        <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">送信</button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        //
    </script>
@endsection
