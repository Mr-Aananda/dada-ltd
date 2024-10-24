<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Production') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <section class="mb-6">
                    <header class="flex items-center justify-between">
                        <div>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Edit Production') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Update the details below to edit the Production.") }}
                            </p>
                        </div>

                        <a href="{{ route('production.index') }}" class="inline-flex items-center px-3 py-1 text-gray-700 bg-gray-200 border border-transparent rounded-md text-xs font-medium hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            All Production
                        </a>
                    </header>
                </section>

                <x-alert />

                <section>
                    <form method="POST" action="{{ route('production.update', $production->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="image" :value="__('Production Image')" />
                            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image', $production->image)" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                         <!-- PS and PS Date in 1 row -->
                        <div class="flex space-x-4 mt-4">
                            <!-- PS -->
                            <div class="w-1/3">
                                <x-input-label for="ps" :value="__('PS')" />
                                <x-text-input id="ps" class="block mt-1 w-full" type="text" name="ps" :value="old('ps', $production->ps)" placeholder="Enter PS" autofocus/>
                                <x-input-error :messages="$errors->get('ps')" class="mt-2" />
                            </div>
                            <!-- PS Date -->
                            <div class="w-1/3">
                                <x-input-label for="ps_date" :value="__('PS Date')" />
                                <x-text-input id="ps_date" class="block mt-1 w-full" type="date" name="ps_date" :value="old('ps_date', $production->ps_date)" />
                                <x-input-error :messages="$errors->get('ps_date')" class="mt-2" />
                            </div>

                            <div class="w-1/3">
                                <x-input-label for="sst10" :value="__('SST10')" />
                                <x-text-input id="sst10" class="block mt-1 w-full" type="text" name="sst10" :value="old('sst10', $production->sst10)" placeholder="Enter SST10" />
                                <x-input-error :messages="$errors->get('sst10')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Style -->
                        <div class="mt-4">
                            <x-input-label for="style" :value="__('Style')" />
                            <x-text-input id="style" class="block mt-1 w-full" type="text" name="style" :value="old('style', $production->style)" placeholder="Enter Style" />
                            <x-input-error :messages="$errors->get('style')" class="mt-2" />
                        </div>

                        <!-- Buyer PO, Buyer, and SD Date in 1 row -->
                        <div class="flex space-x-4 mt-4">
                            <!-- Buyer PO -->
                            <div class="w-1/3">
                                <x-input-label for="buyer_po" :value="__('Buyer PO')" />
                                <x-text-input id="buyer_po" class="block mt-1 w-full" type="text" name="buyer_po" :value="old('buyer_po', $production->buyer_po)" placeholder="Enter Buyer PO" />
                                <x-input-error :messages="$errors->get('buyer_po')" class="mt-2" />
                            </div>

                            <!-- Buyer -->
                            <div class="w-1/3">
                                <x-input-label for="buyer" :value="__('Buyer')" />
                                <x-text-input id="buyer" class="block mt-1 w-full" type="text" name="buyer" :value="old('buyer', $production->buyer)" placeholder="Enter Buyer" />
                                <x-input-error :messages="$errors->get('buyer')" class="mt-2" />
                            </div>

                            <!-- SD Date -->
                            <div class="w-1/3">
                                <x-input-label for="sd_date" :value="__('SD Date')" />
                                <x-text-input id="sd_date" class="block mt-1 w-full" type="date" name="sd_date" :value="old('sd_date', $production->sd_date)" />
                                <x-input-error :messages="$errors->get('sd_date')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Quantity and Cap Item in 1 row -->
                        <div class="flex space-x-4 mt-4">
                            <!-- Quantity -->
                            <div class="w-1/2">
                                <x-input-label for="qty" :value="__('Quantity')" />
                                <x-text-input id="qty" class="block mt-1 w-full" type="number" name="qty" :value="old('qty', $production->qty)" placeholder="Enter Quantity" />
                                <x-input-error :messages="$errors->get('qty')" class="mt-2" />
                            </div>

                            <!-- Cap Item -->
                            <div class="w-1/2">
                                <x-input-label for="cap_item" :value="__('Cap Item')" />
                                <x-text-input id="cap_item" class="block mt-1 w-full" type="text" name="cap_item" :value="old('cap_item', $production->cap_item)" placeholder="Enter Cap Item" />
                                <x-input-error :messages="$errors->get('cap_item')" class="mt-2" />
                            </div>
                        </div>

                       <!-- Ship Via, Destination, and Final Destination in 1 row -->
                        <div class="flex space-x-4 mt-4">
                            <!-- Ship Via -->
                            <div class="w-1/3">
                                <x-input-label for="ship_via" :value="__('Ship Via')" />
                                <x-text-input id="ship_via" class="block mt-1 w-full" type="text" name="ship_via" :value="old('ship_via', $production->ship_via)" placeholder="Enter Shipping Method" />
                                <x-input-error :messages="$errors->get('ship_via')" class="mt-2" />
                            </div>

                            <!-- Destination -->
                            <div class="w-1/3">
                                <x-input-label for="dest" :value="__('Destination')" />
                                <x-text-input id="dest" class="block mt-1 w-full" type="text" name="dest" :value="old('dest', $production->dest)" placeholder="Enter Destination" />
                                <x-input-error :messages="$errors->get('dest')" class="mt-2" />
                            </div>

                            <!-- Final Destination -->
                            <div class="w-1/3">
                                <x-input-label for="final_dest" :value="__('Final Destination')" />
                                <x-text-input id="final_dest" class="block mt-1 w-full" type="text" name="final_dest" :value="old('final_dest', $production->final_dest)" placeholder="Enter Final Destination" />
                                <x-input-error :messages="$errors->get('final_dest')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Embo and washing in 1 row -->
                        <div class="flex space-x-4 mt-4">
                            <div class="w-1/2">
                                <x-input-label for="embo" :value="__('Embo')" />
                                <x-text-input id="embo" class="block mt-1 w-full" type="text" name="embo" :value="old('embo', $production->embo)" placeholder="Enter Embo" />
                                <x-input-error :messages="$errors->get('embo')" class="mt-2" />
                            </div>

                            <div class="w-1/2">
                                <x-input-label for="washing" :value="__('Washing')" />
                                <x-text-input id="washing" class="block mt-1 w-full" type="text" name="washing" :value="old('washing', $production->washing)" placeholder="Enter Washing Type" />
                                <x-input-error :messages="$errors->get('washing')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Pattern Cutter in 1 row -->
                        <div class="flex space-x-4 mt-4">
                            <!-- C/Pattern -->
                            <div class="w-1/4">
                                <x-input-label for="c_pattern" :value="__('C/Pattern')" />
                                <x-text-input id="c_pattern" class="block mt-1 w-full" type="text" name="c_pattern" :value="old('c_pattern', $production->c_pattern)" placeholder="Enter C/Pattern" />
                                <x-input-error :messages="$errors->get('c_pattern')" class="mt-2" />
                            </div>

                            <!-- V/Pattern -->
                            <div class="w-1/4">
                                <x-input-label for="v_pattern" :value="__('V/Pattern')" />
                                <x-text-input id="v_pattern" class="block mt-1 w-full" type="text" name="v_pattern" :value="old('v_pattern', $production->v_pattern)" placeholder="Enter V/Pattern" />
                                <x-input-error :messages="$errors->get('v_pattern')" class="mt-2" />
                            </div>

                            <!-- C/Cutter -->
                            <div class="w-1/4">
                                <x-input-label for="c_cutter" :value="__('C/Cutter')" />
                                <x-text-input id="c_cutter" class="block mt-1 w-full" type="text" name="c_cutter" :value="old('c_cutter', $production->c_cutter)" placeholder="Enter C/Cutter" />
                                <x-input-error :messages="$errors->get('c_cutter')" class="mt-2" />
                            </div>

                            <!-- V/Cutter -->
                            <div class="w-1/4">
                                <x-input-label for="v_cutter" :value="__('V/Cutter')" />
                                <x-text-input id="v_cutter" class="block mt-1 w-full" type="text" name="v_cutter" :value="old('v_cutter', $production->v_cutter)" placeholder="Enter V/Cutter" />
                                <x-input-error :messages="$errors->get('v_cutter')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Eyelet in 1 row -->
                        <div class="flex space-x-3 mt-4">
                            <!-- Eyelet Number -->
                            <div class="w-1/3">
                                <x-input-label for="eyelet_number" :value="__('Eyelet Number')" />
                                <x-text-input id="eyelet_number" class="block mt-1 w-full" type="text" name="eyelet_number" :value="old('eyelet_number', $production->eyelet_number)" placeholder="Enter eyelet number" />
                                <x-input-error :messages="$errors->get('eyelet_number')" class="mt-2" />
                            </div>

                            <!-- Eyelet Color -->
                            <div class="w-1/3">
                                <x-input-label for="eyelet_color" :value="__('Eyelet Color')" />
                                <x-text-input id="eyelet_color" class="block mt-1 w-full" type="text" name="eyelet_color" :value="old('eyelet_color', $production->eyelet_color)" placeholder="Enter eyelet color" />
                                <x-input-error :messages="$errors->get('eyelet_color')" class="mt-2" />
                            </div>

                            <!-- Eyelet Position -->
                            <div class="w-1/3">
                                <x-input-label for="eyelet_position" :value="__('Eyelet Position')" />
                                <x-text-input id="eyelet_position" class="block mt-1 w-full" type="text" name="eyelet_position" :value="old('eyelet_position', $production->eyelet_position)" placeholder="Enter eyelet position" />
                                <x-input-error :messages="$errors->get('eyelet_position')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Visor in 1 row -->
                        <div class="flex space-x-3 mt-4">
                            <!-- Visor - 6 -->
                            <div class="w-1/3">
                                <x-input-label for="visor_6" :value="__('Visor - 6')" />
                                <x-text-input id="visor_6" class="block mt-1 w-full" type="text" name="visor_6" :value="old('visor_6', $production->visor_6)" placeholder="Enter visor [6]" />
                                <x-input-error :messages="$errors->get('visor_6')" class="mt-2" />
                            </div>

                            <!-- Visor - 1.5 -->
                            <div class="w-1/3">
                                <x-input-label for="visor_1_5" :value="__('Visor - 1.5')" />
                                <x-text-input id="visor_1_5" class="block mt-1 w-full" type="text" name="visor_1_5" :value="old('visor_1_5', $production->visor_1_5)" placeholder="Enter visor [1.5]" />
                                <x-input-error :messages="$errors->get('visor_1_5')" class="mt-2" />
                            </div>

                            <!-- Visor - 0.5 -->
                            <div class="w-1/3">
                                <x-input-label for="visor_0_5" :value="__('Visor - 0.5')" />
                                <x-text-input id="visor_0_5" class="block mt-1 w-full" type="text" name="visor_0_5" :value="old('visor_0_5', $production->visor_0_5)" placeholder="Enter visor [0.5]" />
                                <x-input-error :messages="$errors->get('visor_0_5')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Mold in 1 row -->
                        <div class="flex space-x-4 mt-4">
                            <!-- F/Mold -->
                            <div class="w-1/4">
                                <x-input-label for="f_mold" :value="__('F/Mold')" />
                                <x-text-input id="f_mold" class="block mt-1 w-full" type="text" name="f_mold" :value="old('f_mold', $production->f_mold)" placeholder="Enter F/Mold" />
                                <x-input-error :messages="$errors->get('f_mold')" class="mt-2" />
                            </div>

                            <!-- B/Mold -->
                            <div class="w-1/4">
                                <x-input-label for="b_mold" :value="__('B/Mold')" />
                                <x-text-input id="b_mold" class="block mt-1 w-full" type="text" name="b_mold" :value="old('b_mold', $production->b_mold)" placeholder="Enter B/Mold" />
                                <x-input-error :messages="$errors->get('b_mold')" class="mt-2" />
                            </div>

                            <!-- Extra Stitch -->
                            <div class="w-1/4">
                                <x-input-label for="extra_stitch" :value="__('Extra Stitch')" />
                                <x-text-input id="extra_stitch" class="block mt-1 w-full" type="text" name="extra_stitch" :value="old('extra_stitch', $production->extra_stitch)" placeholder="Enter extra stitch" />
                                <x-input-error :messages="$errors->get('extra_stitch')" class="mt-2" />
                            </div>

                            <!-- Packing -->
                            <div class="w-1/4">
                                <x-input-label for="packing" :value="__('Packing')" />
                                <x-text-input id="packing" class="block mt-1 w-full" type="text" name="packing" :value="old('packing', $production->packing)" placeholder="Enter packing" />
                                <x-input-error :messages="$errors->get('packing')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Row CM front in 1 row -->
                        <div class="flex space-x-4 mt-4">
                            <!-- Row -->
                            <div class="w-1/2">
                                <x-input-label for="row" :value="__('Row')" />
                                <x-text-input id="row" class="block mt-1 w-full" type="text" name="row" :value="old('row', $production->row)" placeholder="Enter Row" />
                                <x-input-error :messages="$errors->get('row')" class="mt-2" />
                            </div>

                            <!-- Cm from front end -->
                            <div class="w-1/2">
                                <x-input-label for="cm_from_front_end" :value="__('Cm from front end')" />
                                <x-text-input id="cm_from_front_end" class="block mt-1 w-full" type="text" name="cm_from_front_end" :value="old('cm_from_front_end', $production->cm_from_front_end)" placeholder="Enter cm from front end" />
                                <x-input-error :messages="$errors->get('cm_from_front_end')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
