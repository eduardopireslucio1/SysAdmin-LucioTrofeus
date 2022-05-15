<style>
    #user-icon{
        color:white;
    }

   
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img class="lucio_logo"  src="{{('/images/lucio_logo_2.png')}}">
        <span  class="brand-text font-weight-light"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <i id="user-icon" class="fas fa-user" style="font-size: 30px;"></i>
            <div class="info">
                <a href="#" style="font-size: 15px" class="d-block">{{auth()->user()->getName()}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link {{activeSegment('home')}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('funcionarios.store')}}" class="nav-link {{activeSegment('funcionarios')}}">
                        <i class="fa fa-user"></i>
                        <p>
                            Funcionários
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('material.store')}}" class="nav-link {{activeSegment('material')}}">
                        <i class="fa fa-brush"></i>
                        <p>
                            Materiais
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('produtos.store')}}" class="nav-link {{activeSegment('produtos')}}">
                        <i class="fa fa-fw fa-inbox"></i>
                        <p>
                            Produtos
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('clientes.store')}}" class="nav-link {{activeSegment('clientes')}}">
                        <i class="fa fa-fw fa-users"></i>
                        <p>
                            Clientes
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('pedido.create')}}" class="nav-link {{activeSegment('pedido')}}">
                        <i class="fa fa-cart-plus"></i>
                        <p>
                            Novo Pedido
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('entrega.create')}}" class="nav-link {{activeSegment('entrega')}}">
                    <i class="fas fa-shipping-fast"></i>
                        <p>
                            Nova Entrega
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('pedidos.store')}}" class="nav-link {{activeSegment('pedidos')}}">
                        <i class="fas fa-box"></i>
                        <p>
                            Pedidos
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('entregas.store')}}" class="nav-link {{activeSegment('entregas')}}">
                        <i class="fas fa-box"></i>
                        <p>
                            Entregas
                        </p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{route('relatorio.store')}}" class="nav-link {{activeSegment('relatorio')}}">
                        <i class="fas fa-book-open"></i>
                        <p>
                            Relatórios
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="document.getElementById('logout-form').submit()">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Sair
                        </p>
                          <form action="{{route('logout')}}" method="POST" id="logout-form">
                          @csrf
                          </form>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>