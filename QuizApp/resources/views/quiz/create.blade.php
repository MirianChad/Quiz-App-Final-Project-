@extends("layout")
@section("body")
<h1 style="margin-left: 300px">Create a New Quiz</h1>


<form method="POST" action="/user/create">
    @csrf
    <div>
        <label for="name" style="width: 700px; margin-left: 300px">Name:</label>
        @if ($errors->has('name'))
            <div class="text-danger">{{ $errors->first('name') }}</div>
        @endif
        <input type="text" style="width: 700px; margin-left: 300px" name="name" class="form-control" id="name">

    </div>
    <div>
        <label for="photo" style="width: 700px; margin-left: 300px">Photo Url:</label>
        @if ($errors->has('name'))
            <div class="text-danger">{{ $errors->first('photo') }}</div>
        @endif
        <textarea name="photo" style="width: 700px; margin-left: 300px" class="form-control" id="photo"></textarea>

    </div>
    <div>
        <label for="description" style="width: 700px; margin-left: 300px">Body:</label>
        @if ($errors->has('name'))
            <div class="text-danger">{{ $errors->first('description') }}</div>
        @endif
        <textarea name="description" style="width: 700px; margin-left: 300px" class="form-control" id="description"></textarea>

    </div>
{{--    <div>--}}
{{--        <label for="description">Body:</label>--}}
{{--        <textarea name="description" id="description">{{$user->email}}</textarea>--}}
{{--    </div>--}}


    <button class="btn btn-success"  style="width: 300px; margin-left: 500px; margin-top: 20px" type="submit">Create Quiz</button>
    <a style="margin-top: 20px" class="btn btn-secondary" href="javascript:history.back()">Go Back</a></form>
@endsection
