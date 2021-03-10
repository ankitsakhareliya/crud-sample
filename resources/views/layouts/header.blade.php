<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Crud Module</title>
        <link href="{{asset('css/styles.css?v='.time())}}" rel="stylesheet" />
        <link href="{{asset('css/style1.css?v='.time())}}" rel="stylesheet" />
        <link href="{{asset('css/developer.css?v='.time())}}" rel="stylesheet" />
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="https://datatables.yajrabox.com/css/datatables.bootstrap.css" rel="stylesheet">
        <!-- DataTables -->
        <link href="{{ asset ('plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{ asset ('plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Sweet Alert -->
   		<link href="{{ asset ('plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/bootstrap-multiselect.css?v='.time())}}" rel="stylesheet" />
        <link href="{{ asset ('css/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset ('css/prettify.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset ('css/bootstrap-glyphicons.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <div id="site_url" style="display:none">{{url('/')}}</div>
    </head>
    <body class="nav-fixed">
    <!--FFF8D0-->
        
