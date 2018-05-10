@php
    $nav = [
        '' => 'Home',
        'ucshow/create' => 'Create',
        'venues' => 'View Venues'
    ];
@endphp

<nav>
    <ul>
        @foreach($nav as $link => $label)
            <li><a href='/{{ $link }}' class='{{ Request::is($link) ? 'active' : '' }}'>{{ $label }}</a>
        @endforeach
    </ul>
</nav>