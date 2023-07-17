<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ $title }}</title>
<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo_svg.png') }}">
<!-- Plugins CSS -->
<link rel="stylesheet" href="{{ asset('assets/plugins/css/plugins.css') }}">
<!-- Custom style -->
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/responsiveness.css') }}" rel="stylesheet">
<link id="jssDefault" rel="stylesheet" href="{{ asset('assets/css/skins/default.css') }}">
<!-- Edit new style -->
<link href="{{ asset('assets/css/edit_style.css') }}" rel="stylesheet">
{{-- css input validate  --}}
<link rel="stylesheet" href="{{asset('assets/css/input_validate.css')}}">
{{-- search, page, checkbox --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css" type="text/css">
<link type="text/css" href="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet">
<style>
    .swal2-container.swal2-center>.swal2-popup {font-size: 14px;}
</style>
