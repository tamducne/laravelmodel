<!DOCTYPE html>
<html>
<head>
    <title>Account Dashboard</title>
</head>
<body>
    <h1>Welcome to Account Dashboard</h1>
    <p>You are logged in as {{ Auth::guard('account_admins')->user()->name }}</p>
    <p>You are logged in as {{ Auth::guard('account_admins')->user()->role }}</p>

    {{-- <form action="{{ route('account.logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form> --}}
</body>
</html>