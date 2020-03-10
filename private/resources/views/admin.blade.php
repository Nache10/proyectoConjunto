<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SEOGO - Admin</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href=" {{ url('public/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('public/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{url('public/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{url('public/vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{url('public/assets/css/style.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default navbaridiomas">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/wordpressconjunto/admin/ranking"><img src="{{url('public/images/logo.png')}}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="/wordpressconjunto/admin/ranking"><img src="{{url('public/images/logo2.png')}}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/wordpressconjunto/"> <i class="menu-icon fa fa-dashboard"></i>SEOGO</a>
                    </li>
                    <li>
                        <a href="/wordpressconjunto/admin/graphs"> <i class="menu-icon fa fa-columns"></i>Graphs</a>
                    </li>
                    <h3 class="menu-title">USERS</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="/wordpressconjunto/admin/users/create"> <i class="menu-icon fa fa-users"></i>Create Users</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="/wordpressconjunto/admin/users"> <i class="menu-icon fa fa-laptop"></i>Users</a>
                    </li>
                    <h3 class="menu-title">ACCESS POINTS</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="/wordpressconjunto/admin/access/create"> <i class="menu-icon fa fa-universal-access"></i>Create Access Points</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="/wordpressconjunto/admin/access"> <i class="menu-icon fa fa-table"></i>Access Points</a>
                    </li>
                    <h3 class="menu-title">ACTIVE TIMELINE</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="/wordpressconjunto/admin/active/create"> <i class="menu-icon fa fa-calendar"></i>Create Active Timeline</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="/wordpressconjunto/admin/active"> <i class="menu-icon fa fa-th"></i>Active Timeline</a>
                    </li>
                    <h3 class="menu-title">DATA</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="/wordpressconjunto/admin/connection"> <i class="menu-icon fa fa-wifi"></i>Connections</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="/wordpressconjunto/admin/bigdata"> <i class="menu-icon fa fa-trash"></i>Big data</a>
                    </li>
                </ul>
            </div>
        </nav>
            <div class="idiomas">
                <?php echo do_shortcode('[gtranslate]'); ?>
                <a class="ml-4 text-white">  {{Auth::user()->name}}  </a>
                <a href="/wordpressconjunto/logout" class="ml-4">  Logout  </a>
            </div>
    </aside>


    <div id="right-panel" class="right-panel">
            @yield('content')
    </div>
</body>
<script src="{{ url('public/vendors/ckeditor/ckeditor.js') }}"></script>

</html>

