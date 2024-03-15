<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
<meta name="csrf-token" content="{{ csrf_token() }}" />
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
{!! Twitter::generate() !!}
{!! JsonLd::generate() !!}
<title>{{ SEOMeta::getTitle() }}</title>
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/page-user/assets/img/favicon/mobil88.ico') }}">
