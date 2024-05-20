
<!DOCTYPE html>
<html>
<head>
    <title>Accounts List</title>
</head>
<body>
    <h1>Accounts List</h1>
    <ul>
        @foreach($accounts as $account)
            <li>{{ $account->name }} - {{ $account->email }}</li>
        @endforeach
    </ul>
    <div>
        
    </div>
</body>

</html>