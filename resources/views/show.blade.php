<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Penukaran</title>
</head>
<body>
    
    <form action="{{route('cancel')}}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Batalkan</button>
    </form>
</body>
</html>