@extends('layouts.base')

@section('meta')
    <title>ログイン｜{{ config('app.name') }}</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading lead"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;ログイン</div>
                    <div class="panel-body">
                        {!! Form::open(['url' => route('login'), 'method' => 'post', 'class' => 'form-horizontal']) !!}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">メールアドレス</label>

                                <div class="col-md-6">
                                    {!! Form::email('email', null, ['required', 'autofocus', 'class' => 'form-control', 'id' => 'email', 'maxlength' => '191', 'placeholder' => '']) !!}

                                    @if( $errors->has('email') )
                                        <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">パスワード</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" maxlength="191" placeholder="" required />

                                    @if( $errors->has('password') )
                                        <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4 form-control-static">
                                    <label>{!! Form::checkbox('remember', 1, null, []) !!} ログイン状態を保存する</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">送信</button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>&nbsp;パスワードをお忘れの方
                                    </a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <a class="btn btn-block btn-social btn-facebook">
                                      <span class="fa fa-facebook"></span>Sign in with Facebook
                                    </a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <a class="btn btn-block btn-social btn-twitter">
                                      <span class="fa fa-twitter"></span>Sign in with Twitter
                                    </a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <a href="{{ route('socialite', 'google') }}" class="btn btn-block btn-social btn-google">
                                      <span class="fa fa-google"></span>Sign in with Google
                                    </a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <a class="btn btn-block btn-social btn-dropbox">
                                      <span class="fa fa-dropbox"></span>Sign in with Dropbox
                                    </a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <a href="{{ route('socialite', 'github') }}" class="btn btn-block btn-social btn-github">
                                      <span class="fa fa-github"></span>Sign in with GitHub
                                    </a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <a class="btn btn-block btn-social btn-bitbucket">
                                      <span class="fa fa-bitbucket"></span>Sign in with Bitbucket
                                    </a>
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
