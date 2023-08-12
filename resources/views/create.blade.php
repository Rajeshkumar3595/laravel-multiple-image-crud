

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
            <div class="col-8">
                <div class="d-inline-block mt-5">
                    <form action="/post" method="post" enctype="multipart/form-data">
                        @csrf
                        <label>Title:</label>
                        <input type="text" class="form-control" name="title" id="" placeholder="title">
                        <br>
                        <label>Profile:</label>
                        <input type="file" class="form-control" name="profile" id="input_file_costom">
                        <br>
                        <label>Images:</label>
                        <input type="file" class="form-control" name="images[]" multiple id="input_file_costom">
                        <br>
                        <button class="btn btn-success btn-sm px-3" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>