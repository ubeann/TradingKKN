<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
    {{-- import jquery --}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    {{-- import bootstrap --}}
</head>
<body>
    Create
    {{-- Show Error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- Show Session Error --}}
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{route('create.store')}}" method="post">
        @csrf
        <span>Data Diri</span></br>
        <input type="text" name="name" id="name" placeholder="Name" value="{{old('name')}}"></br>
        <input type="radio" id="male" name="gender" value="male" @if (old('gender') == 'male') checked @endif>
        <label for="male">Laki-laki</label>
        <input type="radio" id="female" name="gender" value="female" @if (old('gender') == 'female') checked @endif>
        <label for="female">Perempuan</label></br>
        <hr>
        
        <span>Kontak (Minimal 1)</span></br>
        <input type="text" name="phone" id="phone" placeholder="+62xxxxx phone (WA)" value="{{old('phone')}}"></br>
        <input type="text" name="username_line" id="username_line" placeholder="optional username line" value="{{old('username_line')}}"></br>
        <input type="text" name="username_telegram" id="username_telegram" placeholder="optional username tele" value="{{old('username_telegram')}}"></br>
        <hr>

        <span>Wilayah Asal KKN</span></br>
        <input type="text" name="origin_village" id="origin_village" placeholder="ex: Sogo (Kelurahan)" value="{{old('origin_village')}}"></br>
        <input type="text" name="origin_district" id="origin_district" placeholder="ex: Babat (Kecamatan)" value="{{old('origin_district')}}"></br>
        <select name="origin_city" id="origin_city">
            <option selected disabled>Pilih Kota</option>
            @foreach ($cities as $city)
                <option value="{{$city}}" @if (old('origin_city') == $city) selected @endif>{{$city}}</option>
            @endforeach
        </select></br>
        <hr>

        <span>Wilayah Tujuan Penukaran KKN</span></br>
        <input type="checkbox" id="all" name="all" value="all" @if (old('all') == 'all') checked @endif>
        <label for="all"> Semua</label><br>
        @foreach ($cities as $city)
            <input type="checkbox" id="{{$city}}" name="destination_city[]" value="{{$city}}" @if (in_array($city, old('destination_city') ?? [])) checked @endif>
            <label for="{{$city}}">{{$city}}</label><br>
        @endforeach
        <hr>

        <span>Alasan</span></br>
        <textarea name="reason" id="reason" cols="30" rows="10" placeholder="Alasan">{{old('reason')}}</textarea></br>
        <input type="submit" value="Create">
    </form>

    {{-- JS if select all then city checked --}}
    <script>
        $('#all').click(function() {
            if ($(this).is(':checked')) {
                $('input[name="destination_city[]"]').prop('checked', true);
            } else {
                $('input[name="destination_city[]"]').prop('checked', false);
            }
        });
    </script>

    {{-- JS if all city checked then 'all' checked --}}
    <script>
        $('input[name="destination_city[]"]').click(function() {
            if ($('input[name="destination_city[]"]:checked').length == $('input[name="destination_city[]"]').length) {
                $('#all').prop('checked', true);
            } else {
                $('#all').prop('checked', false);
            }
        });
    </script>
</body>
</html>