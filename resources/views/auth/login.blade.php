 @extends("layouts.app")

 @section('content')
 <h1 class="mb-5">Login</h1>
 @if ($errors->any())
 <div class="alert alert-danger">
     <ul>
         @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
         @endforeach
     </ul>
 </div>
 @endif

 <form action="{{route('login')}}" method="POST">
     @csrf
     <div class="mb-3">
         <label for="email" class="form-label">Email Address</label>
         <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
     </div>
     <div class="mb-3">
         <label for="password" class="form-label">Password</label>
         <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
     </div>

     <button type="submit" class="btn btn-primary">Submit</button>
 </form>
 @endsection