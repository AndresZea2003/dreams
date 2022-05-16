<div class="w-72 min-h-[10rem] shadow-lg rounded-md overflow-hidden">
    <div>
        <img src="{{ asset($photo) }}" class="w-full"  alt="">
{{--        <img src="{{ $photo }}" :alt="img{{ $name }}" />--}}
    </div>
{{--    <div class="bg-gray-300 ">--}}
{{--        <span class="text-2xl">Dreams sin foto</span>--}}
{{--    </div>--}}
    <div class="py-4 px-4 bg-white">
        <h3 class="text-lg font-semibold text-gray-600">{{ $name }}</h3>
        <p class="mt-4 text-lg font-thin">Price: ${{ $price }}</p>
        <p class="mt-4 text-lg font-thin">Description: {{ $description }}</p>
        <p class="mt-4 text-lg font-thin">Quantity: {{ $quantity }}</p>
    </div>
</div>
