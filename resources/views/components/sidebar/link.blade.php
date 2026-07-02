@props(['active', 'route', 'label'])
<a {{ $attributes }} href="{{ route($route) }}"
    class="{{ request()->routeIs($route) ? 'block px-4 py-2 rounded-lg hover:bg-blue-400 bg-blue-300 font-bold' : 'block px-4 py-2 rounded-lg hover:bg-blue-200 font-medium text-slate-700' }}  capitalize my-1">
    {{ $label ?? str_replace('-', ' ', $route) }}
</a>
