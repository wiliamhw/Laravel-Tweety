<x-master>
    <x-alerts/>
    <section class="px-8 text-white">
        <main class="container mx-auto">
            <div class="lg:flex lg:justify-between">
                <div class="lg:w-1/32 w-1/6 max-w-xs">
                    @include ('_sidebar-links')
                </div>

                <div class="lg:flex-1 mx-5 xl:mx-10" style="max-width: 700px">
                    {{ $slot }}
                </div>

                <div class="max-w-sm rounded-lg bg-dim-700 overflow-hidden shadow-lg m-4" style="height: fit-content;">
                    @include ('_friends-list')
                </div>
            </div>
        </main>
    </section>
</x-master>
