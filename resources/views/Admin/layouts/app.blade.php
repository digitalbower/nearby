<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Vacancy Management</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Assuming you compile CSS using Laravel Mix -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
        }
        .btn {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('jobs.index') }}">Jobs</a></li>
            <li><a href="{{ route('vacancies.index') }}">Vacancies</a></li>
            <li><a href="{{ route('jobs.create') }}">Create Job</a></li>
            <li><a href="{{ route('vacancies.create') }}">Create Vacancy</a></li>
        </ul>
    </nav>
    <div class="container">
        @yield('content') <!-- This is where child views will be injected -->
    </div>
</body>
</html>
