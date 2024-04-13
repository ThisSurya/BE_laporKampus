<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create') }}
        </h2>
    </x-slot>
    <div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
        <div class="container max-w-screen-lg mx-auto">
            <div>
                <form action="{{ route('report.store') }}" method="POST">
                    @csrf
                    <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                            <div class="text-gray-600">
                                <p class="font-medium text-lg">Personal Details</p>
                                <p>Please fill out all the fields.</p>
                                <div class="lg:flex justify-center items-center h-full hidden">
                                    <p>Tambah</p>
                                </div>
                            </div>

                            <div class="lg:col-span-2">
                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                    <div class="md:col-span-5">
                                        <label for="judul">Judul</label>
                                        <input type="text" name="judul" id="judul"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                                        <x-input-error :messages="$errors->get('judul')" class="mt-2" />
                                    </div>

                                    <div class="md:col-span-5">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" name="keterangan" id="keterangan"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                                        <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />

                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="lokasi_id">Lokasi</label>
                                        <div class="md:w-2/3">
                                            <select name="lokasi_id" class="form-select block w-full focus:bg-white"
                                                id="my-select">
                                                @foreach ($data['lokasi'] as $lokasi)
                                                    <option value="{{ $lokasi->id }}">{{ $lokasi->nama_lokasi }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('lokasi_id')" class="mt-2" />

                                            <p class="py-2 text-sm text-gray-600">add notes about populating the field
                                            </p>
                                        </div>
                                    </div>

                                    <div class="md:col-span-2">
                                        <label for="tag_id">Caption</label>
                                        <div class="md:w-2/3">
                                            <select name="tag_id" class="form-select block w-full focus:bg-white"
                                                id="tag_id">
                                                @foreach ($data['caption'] as $caption)
                                                    <option value="{{ $caption->id }}">{{ $caption->nama_tag }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('tag_id')" class="mt-2" />

                                            <p class="py-2 text-sm text-gray-600">add notes about populating the field
                                            </p>
                                        </div>
                                    </div>

                                    <div class="md:col-span-5 text-right">
                                        <div class="text-left">
                                            <label for="photo">Upload foto bukti:</label>
                                            <input type="file" name="photo" id="photo"
                                                class="h-10" />

                                            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                                        </div>
                                        <div class="inline-flex">
                                            <button
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded items-end">Submit</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <a href="https://www.buymeacoffee.com/dgauderman" target="_blank"
                class="md:absolute bottom-0 right-0 p-4 float-right">
                <img src="https://www.buymeacoffee.com/assets/img/guidelines/logo-mark-3.svg" alt="Buy Me A Coffee"
                    class="transition-all rounded-full w-14 -rotate-45 hover:shadow-sm shadow-lg ring hover:ring-4 ring-white">
            </a>
        </div>
    </div>
</x-app-layout>
