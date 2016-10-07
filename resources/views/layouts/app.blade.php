<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/paper/bootstrap.min.css" rel="stylesheet" integrity="sha384-awusxf8AUojygHf2+joICySzB780jVvQaVCAt1clU3QsyAitLGul28Qxb2r1e5g+" crossorigin="anonymous"> --}}
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/sandstone/bootstrap.min.css" rel="stylesheet" integrity="sha384-G3G7OsJCbOk1USkOY4RfeX1z27YaWrZ1YuaQ5tbuawed9IoreRDpWpTkZLXQfPm3" crossorigin="anonymous"> --}}
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/yeti/bootstrap.min.css" rel="stylesheet" integrity="sha384-HzUaiJdCTIY/RL2vDPRGdEQHHahjzwoJJzGUkYjHVzTwXFQ2QN/nVgX7tzoMW3Ov" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-css/1.4.6/select2-bootstrap.min.css" rel="stylesheet">

    <link href="/css/app.css" rel="stylesheet">


    <style media="screen">

    </style>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    @include('partials.navbar')

    @yield('content')

    @include('partials.markdown-modal')

    <footer class="footer">
      <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <p class="text-muted">
                    &copy; RPGames.gg 2016
                </p>
            </div>
            <div class="col-xs-6">
                <p class="text-muted text-right">
                    Made with <i class="fa fa-heart fa-fw" style="color: red;"></i> by <a href="https://steamcommunity.com/id/knifely">kniFely</a>
                </p>
            </div>
        </div>
      </div>
    </footer>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    @yield('scripts')
</body>
</html>
