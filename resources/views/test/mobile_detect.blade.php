@extends('layouts.base')

@section('meta')
    <title>モバイル判定テスト｜{{ config('app.name') }}</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (\Agent::isMobile())
                    <div class="alert alert-success">Is mobile.</div>
                @else
                    <div class="alert alert-info">Not mobile.</div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        //
    </script>
@endsection
