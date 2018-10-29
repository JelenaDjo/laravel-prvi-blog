<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="utf-8" />
    <title> @yield('title')</title> 
   
</head>
<body>
    
 <main role="main" class="container">
    @if($flash=session('message'))
    <div class="alert alert-success">
        {{ $flash }}
    </div>
    @endif
 @include('layouts.partials.header')

    <div class="row">
        <div class="col-md-8 blog-main">
        
        @yield('content')

        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
          @include('layouts.partials.sidebar')
        </aside><!-- /.blog-sidebar -->

    </div><!-- /.row -->
@include('layouts.partials.footer')
</main><!-- /.container -->

  


   
    
</body>
</html>

