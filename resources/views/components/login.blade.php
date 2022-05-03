@extends('components.main')

@section('main')
<div class="container mt-5 d-flex justify-content-center" >
    <form class='shadow p-3 mb-5 bg-white rounded' action='{{route('check')}}' method="POST">
        @csrf
        <div class="form-outline mb-4">
          <input type="email" id="form2Example1" class="form-control" name="mail" value="{{old("mail")}}" />
          <label class="form-label" for="form2Example1">Email address</label>
          <p class='text-danger'>@error('mail') {{$message}} @enderror</p>
        </div>
        <div class="form-outline mb-4">
          <input type="password" id="form2Example2" class="form-control" name="password"/>
          <label class="form-label" for="form2Example2">Password</label>
          <p class='text-danger'>@error('password') {{$message}} @enderror</p>
        </div>
        <div class="row mb-4">
          <div class="col d-flex justify-content-center">
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
      </form>
</div>

@if (Session::get('failed'))
<script>
    Swal.fire({
       icon: 'error',
       title: 'Oops...',
       text: 'მეილი ან პოროლი არასწორია',
   })
    </script>
    @endif

@endsection;
