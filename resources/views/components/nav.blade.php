<nav class="bg-neutral-800 shadow-2xl px-52 py-2">
    <div class="container mx-auto flex justify-between grid grid-cols-8 gap-5 pt-2">
        <div class="pr-3 py-2">
            <a href="{{ route('home') }}"
               class="font-fugaz-one text-gray-400 hover:text-white text-4xl">
                    <span>Dreams</span>
            </a>
        </div>
        <div class="col-span-3 pl-10 py-2">
            <form action="{{ route('products.index') }}">
                <div class="input-group relative flex items-stretch ">
                    <input type="search" name="search" value="{{ request('search') }}" required
                           class="form-control relative flex-auto min-w-0 block px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-gray-600 focus:outline-none"
                           placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                    <button
                        class="btn inline-block px-6 py-2.5 bg-gray-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out flex items-center"
                        type="submit" id="button-addon2">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search"
                             class="w-4"
                             role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor"
                                  d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        <div class="col-span-4 pt-2 pl-3">
            <div class="flex justify-between">
                <sub-nav class="pl-10 py-2" :user_id="{{ auth()->user()->id }}"></sub-nav>
                <dropdown name='{{ auth()->user()->name }}' profile-route="{{ route('profile') }}"
                          products-route="{{ route('products.index') }}"
                          payments-route="{{ route('payments.index') }}"
                          panel-route="{{ auth()->user()->hasRole('admin') ? route('panel') : null }}">
                </dropdown>
            </div>
        </div>
    </div>
</nav>
