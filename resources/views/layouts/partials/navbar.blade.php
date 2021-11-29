<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('home')}}" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item"> 
        <a href="#" class="nav-link" onclick="document.getElementById('logout-form').submit()">
            <i class="nav-icon fas fa-sign-out-alt" ></i>
            <form action="{{route('logout')}}" method="POST" id="logout-form">
                @csrf
            </form>
        </a>
    </li>

</ul>
</nav>
<!-- /.navbar -->