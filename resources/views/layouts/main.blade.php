<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OurReviews | {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/blog.css">
</head>
<body>
    @include('partials.navbar')
    <div class="container mt-4">
        @yield('container')
    </div>
    <footer class="blog-footer text-light bg-dark">
        <p>Website created by <a class="text-decoration-none text-light" href="https://www.youtube.com/channel/UCROHXfkNpjfYXslVMuIxQWQ" target="_blank">Udin</a> with Laravel & Bootstrap Framework.</p>
        <p>
          <a class="text-decoration-none" href="#">Back to top</a>
        </p>
      </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>