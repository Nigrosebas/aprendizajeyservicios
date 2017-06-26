<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--<a class="navbar-brand" href="#">Proyecto Empresas Alumnos</a>-->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="{{asset('inicio')}}">Inicio</a></li>
            @if(Auth::guest())
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contacto</a></li>
            <!--<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Noticias <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Academicos</a></li>
                <li><a href="#">Alumnos</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Todas</li>
                <li><a href="#">General</a></li>
              </ul>
            </li>-->
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="{{asset('registro')}}">Registro</a>

            </li>
            <li>
              <a href="{{asset('auth/login')}}">Acceso</a>
            </li>
          </ul>
          @endif
          @if(Auth::check())
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menú <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">About</a></li>
                  <li><a href="#">Contacto</a></li>
                  <li><a href="#">Academicos</a></li>
                  <li><a href="#">Alumnos</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Todas</li>
                  <li><a href="#">General</a></li>
                </ul>
              </li>
            </ul>
              <ul class="nav navbar-nav navbar-right">
                <li>
                <a href="{{asset('auth/logout')}}"><i class="fa fa-times-circle"></i>Cerrar Sesión</a>
                </li>
              </ul>
              @if(Auth::user()->rol=='Alumno')
            @endif
            @if(Auth::user()->rol=='Empresa')
            @endif
            @if(Auth::user()->rol=='Administrador')
              <ul class="nav navbar-nav">
                <li>
                <a href="{{asset('profesors')}}">Profesores</a>
                </li>
                <li>
                <a href="{{asset('coordinadors')}}">Coordinador de Carrera</a>
                </li>
              </ul>

            @endif
          @endif
        </div><!--/.nav-collapse -->
      </div><!--container-->
</nav>
