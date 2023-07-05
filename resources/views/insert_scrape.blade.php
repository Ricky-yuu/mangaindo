<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Insert Scraper</title>


</head>
<body>
    <form method="POST" action="{{ route('parse_url') }}">
        @csrf
        <div>
            <label for="url">URL:</label>
            <input type="text" name="url" id="url" required>
        </div>
        <button type="submit">Submit</button>
    </form>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5 wrapper">
                @isset($data)
                    @foreach($data as $key)
                        <img src="{{$key}}" alt="">
                    @endforeach
                @endisset
            </div>
        </div>
    </div>
</body>
</html>
