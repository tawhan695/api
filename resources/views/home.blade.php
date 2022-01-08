@extends('layouts.app')

@section('content')
    <div class="container bg-gray ">
        <div class="row justify-content-center bg-gray ">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">ระยะเวลาการใช้งานโปรแกรม</div>

                    <div class="card-body  justify-center text-center">
                        @if ($key)
                            <H1 class="card-title text-center">อายุโค้ดคงเหลือ {{ $key->days }} วัน</H1>
                            Code:{{ $key->keytime }}
                            <form action="{{ route('open',$key->keytime) }}" method="post" id="download">
                                @csrf
                                <input type="hidden" name="code" value="{{ $key->keytime }}">
                                <input id="OS" type="hidden" name="OS" value="">
                                <button id="OS1" class="btn btn-primary text-center" type="button"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAABmJLR0QA/wD/AP+gvaeTAAABVklEQVRoge3aPU4CURiF4fdTjNHO0p8QIp1LcA0uwopVmOg2XAaNugFKK3sbY22kszoWQMLPnSFkGAYu50kmhMDM3DfD0MwHZmZm1pRoegGrknQItIEucD1+7U69HwK9iHhN7b+VwZJOWYyZBHWAoyWH+IqIduqDRoMldYBbFsPOqx47IpJtraoHLiKpxeinN32lBhHRn/raPfBY1xpSKgVLOgYuGUXNbzfAydwuQ6BPg5YGSzojHTS5nw7qXOC6FQZLugOegYvNLad+ZVcnu1goD84uFnbs/lsHB+fOwblzcO4cnDsHm5ntJNXjYe4cTzWdR0Vde/cv7eDcOTh3Ds6dg3Pn4NyVBX9vbBUbVBbcI8PowufDEfECXGlfHohPRMQP8D7eZmj1kYfGVZrxiIg/4HO8zVB6qOWjyvnWYe/GljyYtu20fPTwl9Ho4VtjizQzM7Okf10r+X/AlQZQAAAAAElFTkSuQmCC">  Download APP for Windows</button>
                                <button id="OS2" class="btn btn-primary text-center" type="button"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAABmJLR0QA/wD/AP+gvaeTAAAD20lEQVRoge2aTYhVZRyHn/+QY1mhEphQmC2miXIsKRcSQplERqsgiAoiCGIyaFG4atcH7QIjIsusRYuMij4w6IOIhEQILUiLzKgsC5whc0rLnKfFvYtpuufc831mZJ7tPf/3/p7z3nvfc9/3D3O0j7pafVh9TV3edp7aUG9Rd/lfVredq3LUperr9ubytvNVijqsHkqQPa4Otp2xMrqyhxNkVXdW/Z4DVQ+YFXU+8AqwNOWyNxqKUz/qYykzq3pMXdR2zkpQz1Mn+gg/0nbOyrCzxqaxr/uRPz3w/2vtVI6oI21nrAx1gfp3guyYuqrtjJWirkiQfU9d1na+ylFHpol+pt6hRhPvX+pN1AHgOuAG4GpgCTAPGAe+BD4B3omI8Sk15wCjwCFgd0R8O23MxcDNwFrgMmAxMAgcAfYBHwFvR8TRMtlzoQ6q96k/9Pm1VT2pfqCOqucnjLdQvbv7sU76fk9lQn1KTXto6UnuGVavAl4EVuStBU4Be4DP6czYgu44a4AzC4x3FHgoIp4vUNsf9U71RIYZaJpt6ryqZUfVyZbF0njLqqTt/DE/1bJQFp6oQvZi9be2TfowqW62swKkckYG5y3AwtJ3rj7+Ae6NiBdKj6Te2PLMZeGePE79NgAeKHG/mmBr3iUpcR1Wz6WzVs7UPaVx4JKIGMtTlDbD65i5sgDP5JWFdOH1JcI0wbYiRWnCQwWDNMHB6X86spImfGHBME3wRdHCNOELig7aAD8XLUwTPqvooA1g0cI04eNFB22Awk9+s1V4uGhhmvAfRQdtgJXdB6PcpAl/UzBME8wHNhQpTBPeXyxLY9xfpGg2C69Vb8pblCa8p0SYpnjazrZuZvoJ/1ouT+0sB7abo0sgUTgiJoF3q0hVM+uBHVl/tfttAMwGYYDrgb3qun4Xpm7Ed+/aT0ChNa8lPgQ2RsTXvV5MneGIOAa8VEeqGrkG+D3pxSxNLZsp8bDeAs9FxOGkFzOdLanvM/N3QABOAkMR8X3SBVnblmZLg8mWNFnIcXqobgduLR2pPsaA4X4be3ka0x4E/iwVqV42ZdnFzCwcET8CT5aKVB876ZxZ9yXXgbid3qndwMoCoepiAlgVEQeyXJyr1zIi/gJuZ2bthmzMKlsYO4fjM4FnaxWdJv14y7I71CzHvZUJh7q1JdldZjj8rkN6QH3UbL0f39lpGd6gDqlL1GXqFepd6ptma1l6VT27cdlp4mvUj3uIn1BfVq81Q6dd9yZsUg/2EN2v3lY2a6XtfupFwJXAIuAX4NOISPznkjLOADACXNrN+FVE7K0y6xxznCb8C2wa/ThQb6g5AAAAAElFTkSuQmCC">  Download APP for OS X </button>
                                <script>
                                    // $(document).ready(function(){
                                    $('#OS1').click(function(){
                                        $('#OS').val('windowns');
                                        $('#download').submit();
                                    });
                                    $('#OS2').click(function(){
                                        $('#OS').val('osx');
                                        $('#download').submit();
                                    });

                                // });
                                </script>
                            </form>

                        @else
                            <form action="{{ route('code') }}" method="post" class="">
                                @csrf
                                @method('post')
                                <div class="form-group row">
                                    <label for="idcode" class="col-sm-2 col-form-label">Code</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('error') is-invalid   @enderror"
                                            id="idcode" value="" placeholder="ใส่โค้ด" name="code">
                                            @error('error') <p>{{ $message }}</p>   @enderror
                                    </div>
                                    <div class="col-sm-12 mt-3">

                                        <button type="submit" class="btn btn-primary mb-2 float-right">เปิดใช้งาน</button>
                                    </div>
                                </div>

                            </form>
                        @endif

                        @error('success')
                            <script>
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    }
                                })

                                Toast.fire({
                                    icon: 'success',
                                    title: 'Signed in successfully'
                                })
                            </script>
                        @enderror



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
