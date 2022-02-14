@extends('Layouts.dashboard')

@section('content')
<div>
  <div class="px-32 py-20 grid grid-cols-3  gap-10">
    <div class="max-w-xs rounded-md overflow-hidden shadow-lg hover:scale-105 transition duration-500 cursor-pointer">
      <div>
        <img src="https://ebani.com.co/wp-content/uploads/2021/08/Ebani-Colombia-tienda-online-de-decoracion-y-mobiliario-Maderkit-1-Ebani-Colombia-tienda-online-de-decoracion-y-mobiliario-Maderkit.jpg" alt="" />
      </div>
      <div class="py-4 px-4 bg-white">
        <h3 class="text-lg font-semibold text-gray-600">Product 1</h3>
        <p class="mt-4 text-lg font-thin">$ 2400</p>
      </div>
    </div>
    <div class="max-w-xs rounded-md overflow-hidden shadow-md hover:scale-105 transition duration-500 cursor-pointer">
      <div>
        <img src="https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcSmuoYVM0oLTkk4jfSkW74NkszKWl-0Q-v9eUISSK_itzhBClCDY1i3G_6WAR4VamTVj5r944mLHtnwWq_W7lKVudN64hvyqk2XXyvs7OPp&usqp=CAE" alt="" />
      </div>
      <div class="py-4 px-4 bg-white">
        <h3 class="text-lg font-semibold text-gray-600">Product 2</h3>
        <p class="mt-4 text-lg font-thin">$ 2400</p>
      </div>
    </div>
    <div class="max-w-xs rounded-md overflow-hidden shadow-md hover:scale-105 transition duration-500 cursor-pointer">
      <div>
        <img src="https://www.pullman.com.co/uploads/pullman/product_images/1277/full/combo-rollpack-euro-u-gris-base-cama-lenceria_bZUkt.jpg" alt="" />
      </div>
      <div class="py-4 px-4 bg-white">
        <h3 class="text-lg font-semibold text-gray-600">Product 3</h3>
        <p class="mt-4 text-lg font-thin">$ 2400</p>
      </div>
    </div>
  </div>
</div>
@endsection
