<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Production Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <section class="mb-6">
                    <header class="flex items-center justify-between">
                        <div>
                            <h2 class="text-lg font-bold text-gray-900">
                                {{ __('Production Information') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Detailed information about the production.") }}
                            </p>
                        </div>

                        <a href="{{ route('production.index') }}" class="inline-flex items-center px-3 py-1 text-gray-700 bg-gray-200 border border-transparent rounded-md text-xs font-bold hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            Back to Productions List
                        </a>
                    </header>
                </section>

                <section>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <h3 class="text-sm font-bold text-gray-700">Image</h3>
                             @if ($production->image)
                                <img src="{{ asset('storage/' . $production->image) }}" alt="Production Image" class="h-16 w-16 object-cover rounded-md" />
                            @else
                                No Image
                            @endif
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">PS</h3>
                            <p class="mt-1 text-gray-900">{{ $production->ps }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">PS Date</h3>
                            <p class="mt-1 text-gray-900">{{ $production->ps_date }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">SST10</h3>
                            <p class="mt-1 text-gray-900">{{ $production->sst10 }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">Buyer PO</h3>
                            <p class="mt-1 text-gray-900">{{ $production->buyer_po }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">Buyer</h3>
                            <p class="mt-1 text-gray-900">{{ $production->buyer }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">SD Date</h3>
                            <p class="mt-1 text-gray-900">{{ $production->sd_date }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">Quantity</h3>
                            <p class="mt-1 text-gray-900">{{ $production->qty }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">Cap Item</h3>
                            <p class="mt-1 text-gray-900">{{ $production->cap_item }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">Ship Via</h3>
                            <p class="mt-1 text-gray-900">{{ $production->ship_via }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">Destination</h3>
                            <p class="mt-1 text-gray-900">{{ $production->dest }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">Final Destination</h3>
                            <p class="mt-1 text-gray-900">{{ $production->final_dest }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">EMBO</h3>
                            <p class="mt-1 text-gray-900">{{ $production->embo }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">Washing</h3>
                            <p class="mt-1 text-gray-900">{{ $production->washing }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">Color Pattern</h3>
                            <p class="mt-1 text-gray-900">{{ $production->c_pattern }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">Visor Pattern</h3>
                            <p class="mt-1 text-gray-900">{{ $production->v_pattern }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">Color Cutter</h3>
                            <p class="mt-1 text-gray-900">{{ $production->c_cutter }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">Visor Cutter</h3>
                            <p class="mt-1 text-gray-900">{{ $production->v_cutter }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">Eyelet Number</h3>
                            <p class="mt-1 text-gray-900">{{ $production->eyelet_number }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">Eyelet Color</h3>
                            <p class="mt-1 text-gray-900">{{ $production->eyelet_color }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">Eyelet Position</h3>
                            <p class="mt-1 text-gray-900">{{ $production->eyelet_position }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">Visor 6</h3>
                            <p class="mt-1 text-gray-900">{{ $production->visor_6 }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">Visor 1.5</h3>
                            <p class="mt-1 text-gray-900">{{ $production->visor_1_5 }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">Visor 0.5</h3>
                            <p class="mt-1 text-gray-900">{{ $production->visor_0_5 }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">Front Mold</h3>
                            <p class="mt-1 text-gray-900">{{ $production->f_mold }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">Back Mold</h3>
                            <p class="mt-1 text-gray-900">{{ $production->b_mold }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">Extra Stitch</h3>
                            <p class="mt-1 text-gray-900">{{ $production->extra_stitch }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">Packing</h3>
                            <p class="mt-1 text-gray-900">{{ $production->packing }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">Row</h3>
                            <p class="mt-1 text-gray-900">{{ $production->row }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">CM from Front End</h3>
                            <p class="mt-1 text-gray-900">{{ $production->cm_from_front_end }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">Created At</h3>
                            <p class="mt-1 text-gray-900">{{ $production->created_at }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-gray-700">Updated At</h3>
                            <p class="mt-1 text-gray-900">{{ $production->updated_at }}</p>
                        </div>
                    </div>
                </section>

                <section class="mt-6">
                    <a href="{{ route('production.edit', $production->id) }}" class="inline-flex items-center px-3 py-1 text-gray-700 bg-gray-200 border border-transparent rounded-md text-xs font-bold hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Edit Production
                    </a>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
