@props(['href' => '#', 'class' => ''])

<a href="{{ $href }}" class="navbar-link{{ $class ? ' ' . $class : '' }}">
    {{ $slot }}
</a>
