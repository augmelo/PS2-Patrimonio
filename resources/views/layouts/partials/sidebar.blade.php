<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('patrimony.index') }}">
        <div class="sidebar-brand-text mx-3 text-left">{{ str_replace('|', '', config('app.name'), ) }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @if(auth()->user()->role == 'Administrador')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('patrimony.create') }}">
                <i class="fas fa-fw fa-plus"></i>
                <span>Novo Patrimônio</span>
            </a>
        </li>
    @endif

    <li class="nav-item">
        <a class="nav-link" href="{{ route('patrimony.index') }}">
            <i class="fas fa-fw fa-desktop"></i>
            <span>Patrimônios</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('place.index') }}">
            <i class="fas fa-fw fa-building"></i>
            <span>Locais</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('sector.index') }}">
            <i class="fas fa-fw fa-laptop-house"></i>
            <span>Setores</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('component.index') }}">
            <i class="fas fa-fw fa-mouse"></i>
            <span>Componentes</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('type.index') }}">
            <i class="fas fa-fw fa-project-diagram"></i>
            <span>Modelos</span>
        </a>
    </li>

    @if(auth()->user()->role == 'Administrador')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Usuários</span>
            </a>
        </li>
    @endif

    @if(auth()->user()->role == 'Comum')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('commom.user.edit') }}">
                <i class="fas fa-fw fa-lock"></i>
                <span>Alterar Senha</span>
            </a>
        </li>
    @endif

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logout-modal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Sair</span>
        </a>
    </li>


</ul>