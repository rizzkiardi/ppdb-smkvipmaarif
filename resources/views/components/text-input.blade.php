@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-[#00AA5B]/50 focus:ring-[#00AA5B]/50 rounded-md shadow-sm']) !!}>
