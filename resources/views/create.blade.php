@extends('app')

@section('content')
<section class="hero-area bg-primary" id="parallax">
    <div class="container">
        <img src="{{ asset('tradingkkn.png') }}" alt="" style="position: absolute; top:1px; z-index: 99; filter: drop-shadow(5px 5px 15px rgba(34, 34, 34, 0.35));">
        <div class="row">
            <form class="card shadow p-4 rounded-4" action="{{route('create.store')}}" method="post" style="max-width: 700px">
                <h1 class="mb-5">Data Diri</h1>
                
                @csrf
                {{-- Show Error --}}
                @if ($errors->any())
                <div class="alert alert-danger">
                    Silahkan isi data-data yang diperlukan.
                </div>
                @endif
                {{-- Show Session Error --}}
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <div class="mb-3">
                    <label for="name">Nama (Tidak wajib)</label>
                    <input class="form-control" type="text" name="name" id="name" placeholder="Name" value="{{old('name')}}">
                </div>

                <hr>

                <div class="mb-3">
                    <label for="gender">Gender*</label>
                    <div class="form-check">
                        <input class="" type="radio" id="male" name="gender" value="male" @if (old('gender')=='male' )
                            checked @endif>
                        <label for="male">Laki-laki</label>
                    </div>
                    <div class="form-check">
                        <input class="" type="radio" id="female" name="gender" value="female" @if (old('gender')=='female' )
                            checked @endif>
                            <label for="female">Perempuan</label>
                    </div>
                </div>

                <hr>

                <div class="mb-3">
                    <label>Kontak (Minimal 1)*</label>
                    <input class="form-control mb-2" type="text" name="phone" id="phone" placeholder="+62xxxxx phone (WA)"
                        value="{{old('phone')}}">
                    <input class="form-control mb-2" type="text" name="username_line" id="username_line" placeholder="optional username line"
                        value="{{old('username_line')}}">
                    <input class="form-control mb-2" type="text" name="username_telegram" id="username_telegram"
                        placeholder="optional username tele" value="{{old('username_telegram')}}">
                </div>

                <hr>

                <div class="mb-3">
                    <label>Wilayah Asal KKN*</label>
                    <input class="form-control mb-2" type="text" name="origin_village" id="origin_village" placeholder="ex: Sogo (Kelurahan)"
                        value="{{old('origin_village')}}">
                    <input class="form-control mb-2" type="text" name="origin_district" id="origin_district"
                        placeholder="ex: Babat (Kecamatan)" value="{{old('origin_district')}}">
                    <select class="form-select" name="origin_city" id="origin_city">
                        <option selected disabled>Pilih Kota</option>
                        @foreach ($cities as $city)
                        <option value="{{$city}}" @if (old('origin_city')==$city) selected @endif>{{$city}}</option>
                        @endforeach
                    </select>
                </div>

                <hr>

                <div class="mb-3">
                    <div class="d-flex">
                        <div class="">
                            <label>Wilayah Tujuan Penukaran KKN*</label>
                        </div>
                        <div class="checkbox d-flex justify-content-end" style="width: 100%">
                            <label class="" for="all">
                                <input class="checkbox-input"  type="checkbox" id="all" name="all" value="all" @if (old('all')=='all' ) checked @endif>
                                <span class="checkbox-tile" style="height: 40px; padding: .5rem; min-height: 40px; width: 75px;">
                                    <span class="checkbox-label"> Semua</span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex flex-row flex-wrap">
                        @foreach ($cities as $city)
                        <div class="checkbox col">
                            <label for="{{$city}}" class="checkbox-wrapper">
                                <input class="checkbox-input" type="checkbox" id="{{$city}}" name="destination_city[]" value="{{$city}}"
                                    @if (in_array($city,
                                    old('destination_city') ?? [])) checked
                                    @endif>
                                <span class="checkbox-tile">
                                    <span class="checkbox-label">{{$city}}</span>
                                </span>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>

                <hr>

                <div class="mb-3">
                    <label>Alasan (Tidak wajib)</label>
                    <textarea class="form-control" name="reason" id="reason" cols="30" rows="10" placeholder="Alasan">{{old('reason')}}</textarea>
                </div>
                <button class="btn btn-primary" type="submit">Kirim</button>
            </form>
        </div>
    </div>
    {{-- <div class="layer-bg w-100">
        <img class="img-fluid w-100" src="{{ asset('kross/images/illustrations/leaf-bg.png') }}" alt="bg-shape">
    </div> --}}
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="layer" id="l2">
        <img src="{{ asset('kross/images/illustrations/dots-cyan.png') }}" alt="bg-shape">
    </div>
    <div class="layer" id="l3">
        <img src="{{ asset('kross/images/illustrations/leaf-orange.png') }}" alt="bg-shape">
    </div>
    <div class="layer" id="l4">
        <img src="{{ asset('kross/images/illustrations/dots-orange.png') }}" alt="bg-shape">
    </div>
    <div class="layer" id="l5">
        <img src="{{ asset('kross/images/illustrations/leaf-yellow.png') }}" alt="bg-shape">
    </div>
    <div class="layer" id="l7">
        <img src="{{ asset('kross/images/illustrations/dots-group-orange.png') }}" alt="bg-shape">
    </div>
    <div class="layer" id="l8">
        <img src="{{ asset('kross/images/illustrations/leaf-pink-round.png') }}" alt="bg-shape">
    </div>
    <div class="layer" id="l9">
        <img src="{{ asset('kross/images/illustrations/leaf-cyan-2.png') }}" alt="bg-shape">
    </div>
</section>
@endsection

@section('script')
{{-- JS if select all then city checked --}}
<script>
    $('#all').click(function () {
        if ($(this).is(':checked')) {
            $('input[name="destination_city[]"]').prop('checked', true);
        } else {
            $('input[name="destination_city[]"]').prop('checked', false);
        }
    });

</script>

{{-- JS if all city checked then 'all' checked --}}
<script>
    $('input[name="destination_city[]"]').click(function () {
        if ($('input[name="destination_city[]"]:checked').length == $('input[name="destination_city[]"]')
            .length) {
            $('#all').prop('checked', true);
        } else {
            $('#all').prop('checked', false);
        }
    });

</script>
@endsection
