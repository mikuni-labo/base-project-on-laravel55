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
                @elseif (\Agent::isTablet())
                    <div class="alert alert-warning">Is tablet.</div>
                @elseif (\Agent::isDesktop())
                    <div class="alert alert-info">Is desktop.</div>
                @else
                    <div class="alert alert-danger">Unknown device.</div>
                @endif
            </div>

            <div class="col-md-12">
                <div class="well well-sm">
                    <code>{{ \Agent::platform() }}</code>
                </div>
            </div>

            <div class="col-md-12">
                <div class="well well-sm">
                    <code>{{ \Agent::browser() }}</code>
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
