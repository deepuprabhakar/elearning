@extends('app')

@section('meta')
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
    <meta name="format-detection" content="telephone=no"/>
    <title>E-learning - List of Test Questions</title>
@stop

@section('style')
<!-- DataTables -->
    {!! Html::style('plugins/datatables/media/css/dataTables.bootstrap.css') !!}
    {!! Html::style('plugins/datatables/extensions/Responsive/css/responsive.bootstrap.min.css') !!}
<!-- jQuery Confirm -->
    {!! Html::style('plugins/confirm/jquery-confirm.css') !!}    
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Set Questions
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
      <li><a href="#">Test</a></li>
      <li class="active">View Set Questions</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="min-height: 600px;">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">List of Set Questions</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            @include('errors.success')
            <table id="category-table" class="table table-bordered table-hover display dt-responsive nowrap" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="width: 20px;">No.</th>
                  <th>Title</th>
                  <th>Time</th>
                  <th class="text-center" style="width: 200px;">Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($setquestions as $key => $setquestion)
                <tr>
                  <td>{{ ++$key }}</td>
                  <td>{{ $setquestion['title'] }}</td>
                  <td>{{ $setquestion['timehr'] }}hr {{ $setquestion['timemin'] }} min</td>
                  <td class="text-center table-actions">
                    <a class="btn bg-olive btn-xs btn-flat" href="{{ route('admin.test.editsetquestion', $setquestion['slug']) }}" style="margin: 0 3px 0 2px;">Edit</a>
                    {!! Form::open(['route' => ['admin.test.deletesetquestion', $setquestion['hashid']], 'method' => 'DELETE', 'class' => 'delete-form']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs btn-flat btn-delete']) !!}
                    {!! Form::close() !!}
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <div class="overlay">
            <i class="fa fa-refresh fa-spin"></i>
          </div>
        </div>
      </div>
    </div>
  </section><!-- ./section -->  
</div><!-- ./Content Wrapper -->  
@stop

@section('script')
    <!-- DataTables -->
    {!! Html::script('plugins/datatables/media/js/jquery.dataTables.min.js') !!}
    {!! Html::script('plugins/datatables/media/js/dataTables.bootstrap.min.js') !!}
    {!! Html::script('plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js') !!}
    {!! Html::script('plugins/datatables/extensions/Responsive/js/responsive.bootstrap.min.js') !!}
    <!-- SlimScroll -->
    {!! Html::script('plugins/slimScroll/jquery.slimscroll.min.js') !!}
    <!-- FastClick -->
    {!! Html::script('plugins/fastclick/fastclick.min.js') !!}
    <!-- jQuery Confirm -->
    {!! Html::script('plugins/confirm/jquery-confirm.js') !!}
    <!-- App -->
    {!! Html::script('dist/js/app.min.js') !!}
    {!! Html::script('dist/js/script.js') !!}
    {!! Html::script('dist/js/custom/question.js') !!}
@stop