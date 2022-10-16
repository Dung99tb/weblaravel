<div class="mainmenu pull-left">
    <ul class="nav navbar-nav collapse navbar-collapse">
        <li><a href="{{ route('customerHome') }}" class="active">Home</a></li>
        @foreach ($menuLimit as $menuParent)
            <li class="dropdown"><a href="#">{{ $menuParent->name }}<i class="fa fa-angle-down"></i></a>
                @include('customer.components.child_menu',['menuParent' => $menuParent])
            </li>
        @endforeach
        <li><a href="contact-us.html">Contact</a></li>
    </ul>
</div>
