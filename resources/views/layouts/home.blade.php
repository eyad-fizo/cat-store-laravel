
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Amazon Pets - @yield('title')</title>
</head>
<body style="margin: 0; padding: 0; font-family: sans-serif; background-color: #eaeded;">

    <header style="background-color: #131921; color: white; padding: 15px 25px; display: flex; justify-content: space-between; align-items: center;">
        <div style="font-size: 22px; font-weight: bold;">Amazon Pets</div>
        <nav>
            <a href="{{ route('home') }}" style="color: white; margin-right: 20px; text-decoration: none;">Home</a>
            <a href="{{ route('admin.product.index') }}" style="color: #febd69; font-weight: bold; text-decoration: none;">Admin Dashboard</a>
        </nav>
    </header>

    @yield('content')

</body>
</html>