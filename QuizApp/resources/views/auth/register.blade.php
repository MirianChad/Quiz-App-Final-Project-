@extends("layout")

@section("body")
    <h1 style="color: darkslateblue; margin-left: 560px;">Sign Up</h1>
    <div class="card" style="border-radius: 40px; width: 50%; margin-left: auto; margin-right: auto; margin-top: 50px; background-color: darkslateblue">

        <div class="card-body">
            <form method="post" action="">
                @csrf
                <div class="mb-3">
                    <label style="margin-left:60px; width: 500px; color: white" class="form-label">Email address</label>
                    @if ($errors->has('email'))
                        <div style="width: 500px; margin-left: 60px" class="text-danger">{{ $errors->first('email') }}</div>
                    @endif
                    <input style="margin-left: 60px; width: 500px" type="email" name="email" class="form-control" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label style="margin-left:60px; width: 500px; color: white" class="form-label">Password</label>
                    @if ($errors->has('password'))
                        <div style="width: 500px; margin-left: 60px" class="text-danger">{{ $errors->first('password') }}</div>
                    @endif
                    <input style="margin-left:60px; width: 500px" type="password" name="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label style="margin-left:60px; width: 500px; color: white" class="form-label">Confirm Password</label>
                    @if ($errors->has('password'))
                        <div style="width: 500px; margin-left: 60px" class="text-danger">{{ $errors->first('password') }}</div>
                    @endif
                    <input style="margin-left:60px; width: 500px" type="password" name="password_confirmation" class="form-control">
                </div>
                <button style="margin-left: 190px; width: 250px" type="submit" class="btn btn-warning">Sign Up</button>
                <a href="{{route('login')}}" style="margin-left: 200px; width: 500px;color: white">Already Have An Account? Sign In</a>

            </form>
        </div>
    </div>
@endsection
