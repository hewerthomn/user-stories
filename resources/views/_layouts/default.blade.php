<!DOCTYPE html>
<html lang="{{ Config::get('app.locale') }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#2196f3">

    @include('_partials.meta-icons')

    <title>Stories {{ isset($title) ? ' | '.$title : '' }}</title>

    <link href="/css/bootstrap-paper.min.css" rel="stylesheet">
    <link href="/packages/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">

    @yield('styles')
  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">
            <img src="/img/navbar-icon.png" alt="">
          </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                {{ trans('app.project.plural') }}
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-lg fa-plus"></i>
                <span class="visible-xs-inline">
                  {{ trans('app.new') }}
                </span>
              </a>
              <ul class="dropdown-menu">
                <li title="Create a new story">
                  <a href="{{ route('stories.create') }}">
                    <i class="fa fa-file-text-o"></i>
                    {{ trans('app.story.new') }}
                  </a>
                </li>
                <li role="separator" class="divider"></li>
                <li title="Create a new project">
                  <a href="{{ route('projects.create') }}">
                    <i class="fa fa-rocket"></i>
                    {{ trans('app.project.new') }}
                  </a>
                </li>
                <li role="separator" class="divider"></li>
                <li title="Report a bug">
                  <a href="{{ route('bugs.create') }}">
                    <i class="fa fa-bug"></i>
                    {{ trans('app.bug.new') }}
                  </a>
                </li>
              </ul>
            </li>

            <li class="dropdown">
            <?php $langTitle = Config::get('languages')[Config::get('app.locale')] ?>
              <a href="#" class="dropdown-toggle" title="{{ $langTitle }}" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <img src="/img/flags/{{ Config::get('app.locale') }}.png" alt="">
                <span class="visible-xs-inline">
                  {{ trans('app.language') }}
                </span>
              </a>
              <ul class="dropdown-menu">
                @foreach (Config::get('languages') as $lang => $language)
                <li class="{{ $lang == App::getLocale() ? 'active' : '' }}">
                  <a href="/lang/{{ $lang }}">
                    <img src="/img/flags/{{ $lang }}.png" alt="">
                    {{ $language }}
                  </a>
                </li>
                @endforeach
              </ul>
            </li>
            <li class="dropdown profile"  title="trans('app.profileTitle')">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <img alt="image" class="gravatar img-rounded" src="{{ Gravatar::src(Auth::user()->email) }}">
                <span class="visible-xs-inline">{{ Auth::user()->name }}</span>
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a href="/profile">
                    <i class="fa fa-user"></i>
                    {{ trans('app.profile') }}
                  </a>
                </li>
                <li class="divider"></li>
                <li title="Logout">
                  <a href="/auth/logout">
                    <i class="fa fa-sign-out"></i>
                    {{ trans('app.logout') }}
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      {!! Notification::showAll() !!}

      @yield('main')
    </div><!-- /.container -->

    <footer class="container">
      <hr>
      <small><b>{{ date('Y') }}</b> - Stories</small>
    </footer>

    <script src="/packages/jquery/dist/jquery.min.js"></script>
    <script src="/packages/bootstrap//dist/js/bootstrap.min.js"></script>
    <script src="/packages/handlebars/handlebars.min.js"></script>
    <script src="/js/scripts.js"></script>

    @yield('scripts')
  </body>
</html>