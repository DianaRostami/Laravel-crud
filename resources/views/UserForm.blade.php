<!DOCTYPE html>
<html>

<head>
    <title>Information Form</title>
    <meta charset="UTF-8">
    <!--responsive-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<form action="{{ route('UserForm.store') }}" method="post">
    @csrf
    <label for="name">Name</label>
    <input type="text" id="name" name="name" required>
    <label for="email">Email</label>
    <input type="text" id="email" name="email" required>
    <label for="password">Password</label>
    <input id="password" name="password" required>
    <button type="submit">Submit</button>
</form>
</body>
</html>
