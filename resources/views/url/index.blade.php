
@extends('layouts.app')
@section('header')
{!! Html::style('urls/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <a href="{{url('/urls/create')}}">
                      <button class="col-xs-offset-10 col-xs-2 btn bg-navy btn-flat"><i class="fa fa-plus"></i> <span>Add New Url</span></button>
                    </a>
                <div class="panel-heading">Dashboard</div>

                <div class="box-body">
                  <table id="data" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>App Url</th>
                      <th>status</th>
                      <th>created At</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                      @foreach ($url as $urlinfo)
                      <tr>

                        <td>{{ $urlinfo->id}}</td>
                        <td><a href="{{url('/urls/'.$urlinfo->id.'/show')}}">{{ $urlinfo->app_url}}</a></td>
                         @if($urlinfo->status == 1)
                        <td>Up</td>
                        @else
                        <td>Down</td>
                        @endif
                        <td>{{ $urlinfo->created_at}}</td>
                        <td>
                            <a href="{{url('/urls/'.$urlinfo->id.'/edit')}}" class="delete btn btn-xs btn-danger" >Edit</a>
                            {{-- <a href="{{url('/urls/'.$urlinfo->id.'/delete')}}">Delete</a> --}}
                            <a href="{{url('/urls/'.$urlinfo->id.'/delete')}}" class="delete btn btn-xs btn-danger">Delete</a>

                        </td>

                      </tr>

                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>App Url</th>
                        <th>status</th>
                        <th>created At</th>
                        <th>Actions</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
  {!! Html::script('urls/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}
  {!! Html::script('urls/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}
<script type="text/javascript">
 $('#data').DataTable();
</script>

@endsection
