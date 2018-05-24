@section('menuOptions')
<li><a href="{{route('home')}}"><i class="material-icons">home</i>Inicio</a></li>
<li><div class="divider"></div></li> 
<li><a href="#"><i class="material-icons">group</i>Tus Pronósticos</a></li>
<li><a href="{{ route('group.index') }}"><i class="material-icons">group</i>Tus Grupos</a></li><li><a href="#"><i class="material-icons">library_books</i>Terminos del servicio</a></li>
<li><a href="#"><i class="material-icons">help</i>Ayuda</a></li>
<li><div class="divider"></div></li> 
<li><a href="#"><i class="material-icons">share</i>Whatsapp</a></li> 
@endsection