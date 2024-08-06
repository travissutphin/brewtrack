<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'ThoriumCMS123')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Bootstrap Icons -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">


        <!-- Custom CSS -->
        <style>
            body {
                background-color: #000;
                color: #fff;
            }

            .navbar {
                background-color: #222;
            }

            .navbar-brand,
            .nav-link {
                color: #fff !important;
            }

            .btn-primary {
                background-color: #cf7cff;
                border-color: #b026ff;
            }

            .btn-primary:hover {
                background-color: #b026ff;
                border-color: #b026ff;
            }

            .text-red {
                color: #B026FF;
            }

            .navbar-toggler-icon {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%23b026ff' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
            }
			
			.card-outline-red {
				border-color: #b026ff;
				background-color: transparent;
			}
			
			.card-background-dark {
				background-color: #b026ff;
			}
			
			.card-background-light {
				background-color: #cf7cff;
			}

        </style>
    </head>
    <body>
    <!-- Include your header here -->
    @include('header')

    <div class="container">
        @yield('content')
    </div>

    <!-- Include your footer here -->
    @include('footer')

    <!-- Include your JavaScript files here -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	
	<script>
    document.addEventListener('DOMContentLoaded', function() {
      setTimeout(function() {
        let alert = document.getElementById('success-alert');
        if (alert) {
          let bsAlert = new bootstrap.Alert(alert);
          bsAlert.close();
        }
      }, 8000); // 8000 milliseconds = 8 seconds
    });
	</script>
  
</body>
</html>