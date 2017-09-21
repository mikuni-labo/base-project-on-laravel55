@extends('layouts.base')

@section('meta')
    <title>パスワード再設定メール送信｜{{ config('app.name') }}</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-warning">
                    <div class="panel-heading lead"><span class="glyphicon glyphicon-send" aria-hidden="true"></span>&nbsp;パスワード再設定メール送信</div>
                    <div class="panel-body">
                        @if( session('status') )
                            <div class="alert alert-success">{{ session('status') }}</div>
                        @endif

                        {!! Form::open(['url' => route('password.email'), 'method' => 'post', 'class' => 'form-horizontal']) !!}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">メールアドレス<span class="attention">*</span></label>

                                <div class="col-md-6">
                                    {!! Form::email('email', null, ['required', 'autofocus', 'class' => 'form-control', 'id' => 'email', 'maxlength' => '191', 'placeholder' => '']) !!}

                                    @if( $errors->has('email') )
                                        <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <a href="javascript:history.back();" class="btn btn-default">戻る</a>
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
