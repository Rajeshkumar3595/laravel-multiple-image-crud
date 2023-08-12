



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Site</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <div class="row justify-contant-center">
            <div class="col-4">
                {{-- @if (count($posts)>0) --}}
                    <p class="mb-0 mt-4">Profile:</p>
                    <form action="/profile_delete/{{ $posts->id }}" method="post" style="margin-top: -17px;">
                        @csrf
                        @method('delete')
                        <button class="btn text-danger" style="transform: rotate(45deg); margin-left: -13px; font-size: 30px; margin-bottom: -15px;" type="submit">+</button>
                    </form>
                    <img src="{{ asset('profile/').'/'.$posts->profile }}" alt="Profile-Img" width="90px">
                {{-- @endif --}}
                <br>

                {{-- @if(count($images)>0) --}}
                    <p class="mb-0 mt-4">Images:</p>
                    @foreach ($images as $imagg)
                    <form action="/image_delete/{{ $imagg->id }}" method="post" style="margin-top: -17px;">
                        @csrf
                        @method('delete')
                        <button class="btn text-danger" style="transform: rotate(45deg); margin-left: -13px; font-size: 25px; margin-bottom: -15px;" type="submit">+</button>
                    </form>
                        <img src="{{ asset('images/').'/'.$imagg->images }}" alt="Simple-Iamges" width="70px">
                    @endforeach
                {{-- @endif --}}
            </div>

            <div class="col-7">
                <div class="mt-5">
                    <form action="/update/{{ $posts->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <label>Title:</label>
                        <input type="text" class="form-control" name="title" id="" placeholder="title" value="{{ $posts->title }}">
                        <br>
                        <label>Profile:</label>
                        <input type="file" class="form-control" name="profile" id="input_file_costom">
                        <br>
                        <label>Images:</label>
                        <input type="file" class="form-control" name="images[]" multiple id="input_file_costom">
                        <input type="text" hidden class="form-control" name="old_images[]" value=" @foreach ($images as $imagg){{$imagg->images }} @endforeach" multiple id="input_file_costom">
                        <br>
                        <button class="btn btn-success btn-sm px-3" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>