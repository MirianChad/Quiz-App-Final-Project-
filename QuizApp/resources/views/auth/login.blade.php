@extends("layout")

@section("body")


    <h1 style="color: darkslateblue; margin-left: 560px;">Sign In</h1>
    <div class="card" style="border-radius: 40px; width: 50%; margin-left: auto; margin-right: auto; margin-top: 50px; background-color: darkslateblue">
        <div class="card-body">
            <form method="post" action="">
                @csrf
                <div class="mb-3">

                    <label for="exampleInputEmail1" style="margin-left: 60px; color: white" class="form-label">Email address</label>
                    @if ($errors->has('email'))
                        <div style="width: 500px; margin-left: 60px" class="text-danger">{{ $errors->first('email') }}</div>
                    @endif
                    <input type="email" style="width: 500px; margin-left: 60px" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" style="margin-left: 60px; color: white" class="form-label">Password</label>
                    @if ($errors->has('password'))
                        <div style="width: 500px; margin-left: 200px" class="text-danger">{{ $errors->first('password') }}</div>
                    @endif
                    <input type="password" style="width: 500px; margin-left: 60px" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" style="margin-left: 190px; width: 250px" class="btn btn-warning">Sing In</button>
                <a href="{{route('register')}}" style="margin-left: 200px; width: 500px;color: white">Don't Have An Account? Sign Up</a>
            </form>
        </div>
    </div>



@endsection
