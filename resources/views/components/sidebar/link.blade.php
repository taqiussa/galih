@props(['active', 'route', 'label'])
<a {{ $attributes }} href="{{ route($route) }}"
    class="{{ request()->routeIs($route) ? 'block px-4 py-2 rounded-lg hover:bg-gray-300 bg-gray-200 font-bold' : 'block px-4 py-2 rounded-lg hover:bg-gray-100 font-medium text-slate-700' }}  capitalize my-1">
    {{ $label ?? str_replace('-', ' ', $route)}}
</a>