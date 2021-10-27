<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') | {{ config('constants.site_name') }}</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body class="app sidebar-mini rtl">
    @include('admin.layouts.partials.header')
    @include('admin.layouts.partials.sidebar')
    <main class="app-content">
        @yield('content')
    </main>
    @include('admin.layouts.partials.footer')
    <script type="text/javascript" src="{{ asset('backend/js/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('backend/js/plugins/bootstrap-datepicker.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('backend/js/plugins/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/bootstrap-notify.min.js') }}"></script>

    <script type="text/javascript">
		// $('#sl').click(function () {
		// 	$('#tl').loadingBtn();
		// 	$('#tb').loadingBtn({ text: "Signing In" });
		// });

		// $('#el').click(function () {
		// 	$('#tl').loadingBtnComplete();
		// 	$('#tb').loadingBtnComplete({ html: "Sign In" });
		// });

		$('#demoDate').datepicker({
			format: "dd/mm/yyyy",
			autoclose: true,
			todayHighlight: true
		});

		$('#demoSelect').select2();
	</script>
</body>
</html>