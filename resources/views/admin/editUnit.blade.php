@extends('app')

@section('meta')
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
    <meta name="format-detection" content="telephone=no"/>
    <title>E-learning - {{ $unit['title'] }}</title>
@stop

@section('style')
    
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit {{ $unit['title'] }}
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
      <li><a href="{{ route('admin.subjects.show', $subject->slug) }}">Units</a></li>
      <li class="active">Edit Unit</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="min-height: 700px;">
    <div class="row">
      <div class="col-md-offset-1 col-md-10">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Unit Form</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          {!! Form::model($unit, ['url' => route('admin.units.update', $unit['hashid']), 'autocomplete' => 'off', 'id' => 'unit-form', 'method' => 'PATCH']) !!}
            @include('forms.unit', ['button' => 'Update Unit', 'flag' => true])
          {!! Form::close() !!}<!-- /.Form ends -->
        </div><!-- /.box -->
      </div>
    </div> 
  </section><!-- ./section -->  
</div><!-- ./Content Wrapper -->  
@stop

@section('script')
    <!-- FastClick -->
    {!! Html::script('plugins/fastclick/fastclick.min.js') !!}
    
     <!--iCheck -->
    {!! Html::script('plugins/iCheck/icheck.min.js') !!}
    
    <!-- App -->
    {!! Html::script('dist/js/app.min.js') !!}
    {!! Html::script('dist/js/script.js') !!}

    <script>
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
    </script>

    <!--Tinymc-->
    <script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
    <script>
      $(function() {
        tinymce.init({
            selector: '#content',
            plugins : ' image lists charmap print preview',
            
          });
      });
    </script>
@stop