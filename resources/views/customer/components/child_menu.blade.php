@if ($menuParent->menuChildrent->count())
    <ul role="menu" class="sub-menu">
        @foreach ($menuParent->menuChildrent as $menuChildrent)
            <li>
                <a href="shop.html">{{ $menuChildrent->name }}</a>
                @if ($menuParent->menuChildrent->count())
                    @include('customer.components.child_menu', ['menuParent' => $menuChildrent])
                @endif
            </li>
        @endforeach
    </ul>
@endif
