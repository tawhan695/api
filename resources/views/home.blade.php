@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">ระยะเวลาการใช้งานโปรแกรม</div>

                    <div class="card-body">
                        @if ($key)
                            <H1 class="card-title text-center">อายุโค้ดคงเหลือ {{ $key->days }} วัน</H1>
                            Code:{{ $key->keytime }}
                            <form action="{{ route('open',$key->keytime) }}" method="get">
                                @csrf
                                <input type="hidden" name="code" value="{{ $key->keytime }}">
                                <button class="btn btn-primary text-center" type="submit">เปิดใช้งานโปรแกรม</button>
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
