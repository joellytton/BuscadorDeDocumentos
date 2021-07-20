<div class="sidebar-menu light-sidebar">
    <div class="sidebar-header">
        <!--=========================*
                      Logo
        *===========================-->
        <div class="logo">
            <a><img src="{{asset('assets/images/logo-dark.svg')}}" alt="logo"></a>
        </div>
        <!--=========================*
                    End Logo
        *===========================-->
    </div>
    <!--=========================*
               Main Menu
    *===========================-->
    <div class="main-menu">
        <div class="menu-inner" id="sidebar_menu">
            <nav>
                <ul class="metismenu" id="menu">
                    <li {!! (Request::is('dashboard') ? 'class="active"' : "" ) !!}>
                        <a href="{{route("dashboard")}}">
                            <i class="feather ft-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li {!! (Request::is('documento*') ? 'class="active"' : "" ) !!}>
                        <a href="{{route("documento.index")}}">
                            <i class="ti-folder"></i>
                            <span>Documento</span>
                        </a>
                    </li>
                    
                    <li {!! (Request::is('cadastroBasico*') ? 'class="active"' : "" ) !!}>
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="feather ft-file-plus"></i>
                            <span>Cadastro Básico</span>
                        </a>
                        <ul class="collapse">
                            <li {!! (Request::is('cadastroBasico/tipoDocumento*') ? 'class="active"' :"") !!}>
                                <a href="{{route("cadastroBasico.tipoDocumento.index")}}">
                                    <i class="ti-folder"></i>
                                    <span>Tipo</span>
                                </a>
                            </li>

                            <li {!! (Request::is('cadastroBasico/instituicao*') ? 'class="active"' :"") !!}>
                                <a href="{{route("cadastroBasico.instituicao.index")}}">
                                    <i class="ti-folder"></i><span>Insituição</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!--=========================*
              End Main Menu
    *===========================-->
</div>
