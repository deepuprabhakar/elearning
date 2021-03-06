@extends('app')

@section('meta')
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
    <meta name="format-detection" content="telephone=no"/>
    <title>E-learning - Create New Test Questions</title>
@stop

@section('style')
    {!! Html::style('plugins/select2/select2.min.css') !!}
@stop


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Create Test Questions
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
      <li><a href="#">Test</a></li>
      <li class="active">Create Test Question</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="min-height: 700px;">
    <div class="row">
      <div class="col-md-offset-1 col-md-10">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Test Question Form</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          {!! Form::open(['url' => route('admin.test.questionstore'), 'autocomplete' => 'off', 'id' => 'testquestion-form']) !!}
            @include('forms.testquestion', ['button' => 'Create Question', 'flag' => false])
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
     <!-- Select 2 -->
    {!! Html::script('plugins/select2/select2.full.min.js') !!}
    <!-- App -->
    {!! Html::script('dist/js/app.min.js') !!}
    {!! Html::script('dist/js/script.js') !!}
    <script>
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
    </script>
    <script type="text/javascript">
      $(function(){
        $('#category').select2({
          placeholder: 'Select Category'
        });
    });
    </script>
    
@stop