<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, #4facfe, #00f2fe);
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar a {
            color: white !important;
            font-weight: bold;
        }
        .card {
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg px-4">
        <a class="navbar-brand" href="{{ route('students.index') }}">MyApp</a>
    </nav>

    <!-- CONTENT -->
    <div class="container mt-4">

        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </div>

</body>
</html>