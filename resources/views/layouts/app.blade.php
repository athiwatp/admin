<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <title>{{ config('app.name') }}</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">

  <!-- Theme -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/theme/red.css') }}">

</head>
<body>
  <div class="app app-default" id="app">

<aside class="app-sidebar" id="sidebar">
  <div class="sidebar-header">
    <a class="sidebar-brand" href="#"><span class="highlight">@{{ app.name }}</span> Admin</a>
    <button type="button" class="sidebar-toggle">
      <i class="fa fa-times"></i>
    </button>
  </div>
  <div class="sidebar-menu">
    @include('layouts.partials.navigation')
  </div>
  <div class="sidebar-footer">
    <ul class="menu">
      <li>
        <router-link :to="{ name: 'dashboard' }" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-cogs" aria-hidden="true"></i>
        </router-link>
      </li>
      <li><a href="#"><span class="flag-icon flag-icon-th flag-icon-squared"></span></a></li>
    </ul>
  </div>
</aside>

<div class="app-container">

  <nav class="navbar navbar-default" id="navbar">
  <div class="container-fluid">
    <div class="navbar-collapse collapse in">
      <ul class="nav navbar-nav navbar-mobile">
        <li>
          <button type="button" class="sidebar-toggle">
            <i class="fa fa-bars"></i>
          </button>
        </li>
        <li class="logo">
          <a class="navbar-brand" href="#"><span class="highlight">@{{ app.name }}</span> Admin</a>
        </li>
        <li>
          <button type="button" class="navbar-toggle">
            <img class="profile-img" src="{{ auth()->user()->gravatar_url }}" alt="{{ auth()->user()->name }}">
          </button>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-left">
        <li class="navbar-title">
          @{{ page.title }}
        </li>
        <search></search>
      </ul>
      <ul class="nav navbar-nav navbar-right">

        <notification></notification>

        <li class="dropdown profile">
          <a href="#" class="dropdown-toggle"  data-toggle="dropdown">
            <img class="profile-img" src="{{ auth()->user()->gravatar_url }}" alt="{{ auth()->user()->name }}">
            <div class="title">Profile</div>
          </a>
          <div class="dropdown-menu">
            <div class="profile-info">
              <h4 class="username">{{ auth()->user()->name }}</h4>
            </div>
            <ul class="action">
              <li>
                <router-link :to="{ name: 'user.profile', params: {id: app.user.id }}">
                  My Profile
                </router-link>
              </li>
              <li>
                <a href="#">
                  <span class="badge badge-danger pull-right">5</span>
                  My Inbox
                </a>
              </li>
              <li>
                <a href="#">
                  Setting
                </a>
              </li>
              <li>
                <a href="{{ route('logout') }}">
                  Logout
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>

<transition>
  <router-view></router-view>
</transition>

@include('layouts.partials.footer')
</div>

  </div>

  @include('layouts.partials.js')

  <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/vendor.js') }}"></script>
  @stack('js')

</body>
</html>
