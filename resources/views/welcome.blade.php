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
    <link href="/css/landing-page.css" rel="stylesheet">


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

    <!-- Header -->
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1><span class="text-danger">RPG</span>ames</h1>
                        <h3>Bring excitement back into older games</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="{{ route('challenges.index') }}" class="btn btn-default btn-lg"><i class="fa fa-gamepad fa-fw"></i> <span class="network-name">Challenges</span></a>
                            </li>
                            <li>
                                <a href="https://github.com/messerli90/rpgames" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg"><img src="/images/Discord-Logo-Black.svg" style="width:1.28571429em;" alt="discord" /> <span class="network-name">Discord</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->

	<a  name="services"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Challenge Yourself <br>And Others</h2>
                    <p class="lead">You finished Fallout 4 (for the third time) now what?<br>Do you play it again and join a different faction? Go hardcore, play perma-death and don't respawn? Or do you limit yourself to only using melee weapons? These are all fun challenges that make the game fresh again.</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="/images/pexels-photo-51415.jpeg" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <div class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Available for <strong>ANY</strong> game</h2>
                    <p class="lead">Have you come up with a really cool way to challenge yourself in a game? Why not share it with the rest of the world and get some feedback and new ideas.</p>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive" src="/images/pexels-photo-133579.jpeg" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->

    <div class="content-section-a">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Get Stuck?<br>Watch companion videos</h2>
                    <p class="lead">Have a Youtube channel? Add videos of yourself playing a challenge for the world to see.</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="/images/night-television-tv-theme-machines.jpg" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

	<a  name="contact"></a>
    <div class="banner">

        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <h2>Bring excitement back into older games</h2>
                </div>
                <div class="col-lg-6">
                    <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="{{ route('challenges.index') }}" class="btn btn-default btn-lg"><i class="fa fa-gamepad fa-fw"></i> <span class="network-name">Challenges</span></a>
                        </li>
                        <li>
                            <a href="https://github.com/messerli90/rpgames" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-default btn-lg"><img src="/images/Discord-Logo-Black.svg" style="width:1.28571429em;" alt="discord" /> <span class="network-name">Discord</span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.banner -->

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="{{ route('challenges.index') }}">Challenges</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="{{ url('/register') }}">Get Started</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="{{ route('pages.how-it-works') }}">How it workd</a>
                        </li>
                    </ul>
                    <div class="row">
                        <div class="col-xs-6">
                            <p class="copyright text-muted small">
                                &copy; RPGames.gg 2016
                            </p>
                        </div>
                        <div class="col-xs-6">
                            <p class="copyright text-muted text-right small">
                                Made with <i class="fa fa-heart fa-fw" style="color: red;"></i> by <a href="https://steamcommunity.com/id/knifely">kniFely</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="/js/app.js"></script>

</body>

</html>
