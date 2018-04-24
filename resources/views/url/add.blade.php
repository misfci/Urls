
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="box-body">
                  <form class="form-horizontal" role="form" action="{{url('/urls/store')}}" method="post">
                    {{ csrf_field() }}
                    @include('url.form')
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
