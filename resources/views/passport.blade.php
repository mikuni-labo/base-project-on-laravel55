@extends('layouts.base')

@section('meta')
    <title>Passport設定｜{{ config('app.name') }}</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <passport-clients></passport-clients>
                <passport-authorized-clients></passport-authorized-clients>
                <passport-personal-access-tokens></passport-personal-access-tokens>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        //
    </script>
@endsection
