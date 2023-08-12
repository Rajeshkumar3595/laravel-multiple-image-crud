

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Site</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
</head>
<body>
    <br>
   <div class="mx-5">
    <a href="{{route('create')}}" class="btn btn-success px-5 btn-sm">Add Record</a>
   </div>
<br>
    <div class="table-responsive mx-5">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th> ##</th>
                    <th>Title</th>
                    <th>Profile</th>
                    <th>Images</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $key=>$item)
                <tr class="">
                    <td>{{$key+1}}</td>
                    <td>{{ $item->title }}</td>
                    <td>
                        <img src="{{ asset('profile/').'/'.$item->profile }}" alt="Simple Image" width="50px">
                    </td>
                    <td>
                        @foreach ($image as $singleImage)
                           @if ($singleImage->post_id == $item->id)
                           <li class="d-inline-block"><img src="{{ asset('images/').'/'.$singleImage->images }}" alt="Image" width="40px"></li>
                           @endif
                        @endforeach
                    </td>
                    <td>
                        <a href="/edit/{{ $item->id}}" class="btn btn-outline-primary btn-sm ">Edit</a>
                        <form action="/delete/{{ $item->id}}" method="POST" class="d-inline-block">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure for delete')" type="submit">delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    

</body>
</html>