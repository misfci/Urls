
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="box-body">
                  {!! Form::model($url , ['route' => ['urls.update' , $url->id] , 'method' => 'PATCH']) !!}
                      @include('url.form');
                 {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
