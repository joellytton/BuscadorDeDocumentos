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

                    <li {!! (Request::is('recomendacao*') ? 'class="active"' : "" ) !!}>
                        <a href="{{route("recomendacao.index")}}">
                            <i class="ti-folder"></i>
                            <span>Recomendações</span>
                        </a>
                    </li>

                    @if (verificarPermissao([1]))
                    <li {!! (Request::is('auditoria*') ? 'class="active"' : "" ) !!}>
                        <a href="{{route("auditoria.index")}}">
                            <i class="ti-folder"></i>
                            <span>Auditoria</span>
                        </a>
                    </li>
                    @endif

                    @if (verificarPermissao([1]))
                    <li {!! (Request::is('cadastroBasico*') ? 'class="active"' : "" ) !!}>
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="feather ft-file-plus"></i>
                            <span>Cadastro Básico</span>
                        </a>
                        <ul class="collapse">
                            <li {!! (Request::is('cadastroBasico/categoria*') ? 'class="active"' :"") !!}>
                                <a href="{{route("cadastroBasico.categoria.index")}}">
                                    <i class="ti-folder"></i><span>Categorias</span>
                                </a>
                            </li>

                            <li {!! (Request::is('cadastroBasico/esfera*') ? 'class="active"' :"") !!}>
                                <a href="{{route("cadastroBasico.esfera.index")}}">
                                    <i class="ti-folder"></i><span>Esferas</span>
                                </a>
                            </li>

                            <li {!! (Request::is('cadastroBasico/grupo*') ? 'class="active"' :"") !!}>
                                <a href="{{route("cadastroBasico.grupo.index")}}">
                                    <i class="ti-folder"></i><span>Grupos</span>
                                </a>
                            </li>

                            <li {!! (Request::is('cadastroBasico/instituicao*') ? 'class="active"' :"") !!}>
                                <a href="{{route("cadastroBasico.instituicao.index")}}">
                                    <i class="ti-folder"></i><span>Insituição</span>
                                </a>
                            </li>

                            <li {!! (Request::is('cadastroBasico/tipoDocumento*') ? 'class="active"' :"") !!}>
                                <a href="{{route("cadastroBasico.tipoDocumento.index")}}">
                                    <i class="ti-folder"></i>
                                    <span>Tipo</span>
                                </a>
                            </li>

                            <li {!! (Request::is('cadastroBasico/usuario*') ? 'class="active"' :"") !!}>
                                <a href="{{route("cadastroBasico.usuario.index")}}">
                                    <i class="ti-folder"></i>
                                    <span>Usuários</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
    <!--=========================*
              End Main Menu
    *===========================-->
</div>
