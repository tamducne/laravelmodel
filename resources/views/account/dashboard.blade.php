<!DOCTYPE html>
<html>
<head>
    <title>Account Dashboard</title>
</head>
<body>
    <h1>Welcome to Account Dashboard</h1>
    <p>You are logged in as {{ Auth::guard('accounts')->user()->name }}</p>
    {{-- <form action="{{ route('account.logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form> --}}
</body>
</html>