<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>

<body>
    <div id="warpper">
        <div id="head">
            <h2>Header</h2>
        </div>
        <div id="wp-content">
            <div id="content">
                @yield('content')
            </div>
            <div id="sidebar">
                @yield('sidebar')
            </div>
            <div id="footer">
                <h2>Footer</h2>
            </div>
        </div>
    </div>
</body>

</html>
