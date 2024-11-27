<x-layout>
    <x-slot:title>dashboard</x-slot:title>
    <x-slot:content>
        <div x-data="{ openTambahLowongan: false, openEditLowongan: false, openDeleteModal: false, selectedLowongan: {} }" class="flex min-h-screen bg-gray-100">
            <!-- Sidebar -->
            <aside class="w-64 bg-white shadow-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-semibold text-gray-800">Dashboard</h1>
                </div>
                <nav>
                    <ul>
                        <a href="/dashboardBusinesman" class="text-gray-600">
                            <li
                                class="p-4 rounded-lg {{ request()->is('dashboardBusinesman') ? 'bg-gray-200' : 'text-gray-600' }}">
                                Tambah Lowongan Bisnis
                            </li>
                        </a>
                        <a href="/manageProfilPerusahaanBusinesman" class="text-gray-600">
                            <li class="p-4 rounded-lg hover:bg-gray-200">
                                Manage Profil Perusahaan
                            </li>
                        </a>
                    </ul>
                </nav>
            </aside>

            <!-- Main Content -->
            <div class="flex-1 p-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Daftar Lowongan</h2>
                    <button class="px-6 py-2 bg-blue-500 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-600 transition">
                        + Tambah Lowongan
                    </button>
                </div>

                <!-- Tabel Lowongan -->
                <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                    <table class="min-w-full border-collapse border border-gray-200">
                        <thead class="bg-blue-500 text-white">
                            <tr>
                                <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium uppercase">
                                    Judul Lowongan Bisnis</th>
                                <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium uppercase">
                                    Jumlah Lowongan</th>
                                <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium uppercase">
                                    Requirement</th>
                                <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium uppercase">
                                    Benefit</th>
                                <th class="px-6 py-3 border-b border-gray-200 text-left text-sm font-medium uppercase">
                                    Lokasi</th>
                                <th class="px-6 py-3 border-b border-gray-200 text-center text-sm font-medium uppercase">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <!-- Contoh data -->
                            <tr class="hover:bg-gray-100 transition">
                                <td class="px-6 py-4 text-gray-800">Kemitraan Makanan Fried Chicken</td>
                                <td class="px-6 py-4 text-gray-800">5</td>
                                <td class="px-6 py-4 text-gray-800">Memiliki minimal pengalaman 5 tahun, modal usaha 200.000</td>
                                <td class="px-6 py-4 text-gray-800">Resep</td>
                                <td class="px-6 py-4 text-gray-800">Jakarta</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center gap-2">
                                        <button
                                            class="px-4 py-2 bg-yellow-400 text-white text-sm font-medium rounded-lg shadow hover:bg-yellow-500 transition">
                                            Edit
                                        </button>
                                        <button
                                            class="px-4 py-2 bg-red-500 text-white text-sm font-medium rounded-lg shadow hover:bg-red-600 transition">
                                            Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <!-- Modal Edit Lowongan -->
                <div x-show="openEditLowongan"
                    x-effect="document.body.style.overflow = openEditLowongan ? 'hidden' : 'auto'"
                    class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50"
                    style="overflow-y: scroll">
                    <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6 relative"
                        @click.away="openEditLowongan = false">
                        <button @click="openEditLowongan = false"
                            class="absolute top-3 right-3 text-gray-600 hover:text-gray-900">&times;</button>
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4 mt-20">Edit Lowongan Bisnis</h2>
                        <form x-bind:action="`/dashboardBusinesman/${selectedLowongan.id}`" method="POST"
                            class="space-y-4">
                            @csrf
                            @method('PUT')
                            <div>
                                <label class="block text-gray-700">Judul Lowongan</label>
                                <input type="text" name="nama_lowongan" x-model="selectedLowongan.nama_lowongan"
                                    class="w-full p-2 border rounded">
                            </div>
                            <div>
                                <label class="block text-gray-700">Jumlah Lowongan</label>
                                <input type="number" name="jumlah" x-model="selectedLowongan.jumlah_lowongan"
                                    min="1" class="w-full p-2 border rounded">
                            </div>
                            <div>
                                <label class="block text-gray-700">Modal Usaha</label>
                                <input type="number" name="modal_usaha" x-model="selectedLowongan.modal_usaha"
                                    min="1" class="w-full p-2 border rounded">
                            </div>
                            <div>
                                <label class="block text-gray-700">Requirement</label>
                                <textarea name="requirement" x-model="selectedLowongan.requirement" rows="3"
                                    class="w-full p-2 border rounded"></textarea>
                            </div>
                            <div>
                                <label class="block text-gray-700">Benefit</label>
                                <textarea name="benefit" x-model="selectedLowongan.benefit" rows="2" class="w-full p-2 border rounded"></textarea>
                            </div>
                            <div class="md:flex md:row md:space-x-4 w-full text-xs">
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Provinsi:</label>
                                    <select
                                        class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                        name="provinsi" id="Editprovinsi" x-model="selectedLowongan.provinsi"
                                        required>
                                        <option value="">Pilih</option>
                                    </select>
                                </div>
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Kabupaten/Kota:</label>
                                    <select
                                        class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                        name="kota" id="Editkota" x-model="selectedLowongan.kota" required>
                                        <option value="">Pilih</option>
                                    </select>
                                </div>
                            </div>
                            <div class="md:flex md:row md:space-x-4 w-full text-xs">
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Kecamatan:</label>
                                    <select
                                        class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                        name="kecamatan" id="Editkecamatan" x-model="selectedLowongan.kecamatan"
                                        required>
                                        <option value="">Pilih</option>
                                    </select>
                                </div>
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Kelurahan/Desa:</label>
                                    <select
                                        class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                                        name="kelurahan" id="Editkelurahan" x-model="selectedLowongan.kelurahan"
                                        required>
                                        <option value="">Pilih</option>
                                    </select>
                                </div>
                            </div>
                            <label class="font-semibold text-gray-600 py-2">Tag</label>
                            <div class="grid grid-rows-4 grid-flow-col gap-4">
                                @php
                                    $usedTags = [];
                                @endphp

                                @foreach ($tableLowongan as $lowongan)
                                    @foreach ($lowongan->tags as $tag)
                                        @if (!in_array($tag->id, $usedTags))
                                            <div class="flex">
                                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                                    class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                                    id="hs-checkbox-group-{{ $tag->id }}">
                                                <label for="hs-checkbox-group-{{ $tag->id }}"
                                                    class="text-sm text-gray-500 ms-3">{{ $tag->nama_tag }}</label>
                                            </div>
                                            @php
                                                $usedTags[] = $tag->id; // Tambahkan tag ke daftar yang sudah digunakan
                                            @endphp
                                        @endif
                                    @endforeach
                                @endforeach

                            </div>

                            <div class="flex justify-end gap-2">
                                <button type="button" @click="openEditLowongan = false"
                                    class="px-4 py-2 bg-gray-300 rounded">Batal</button>
                                <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Modal Hapus dengan Flowbite -->
                <!-- Modal Hapus dengan Animasi -->
                <div x-show="openDeleteModal" x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                    x-effect="document.body.style.overflow = openDeleteModal ? 'hidden' : 'auto'"
                    class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">

                    <div class="relative bg-white rounded-lg shadow max-w-md w-full p-6">
                        <!-- Tombol Close -->
                        <button type="button" @click="openDeleteModal = false"
                            class="absolute top-3 right-3 text-gray-600 hover:text-gray-900">
                            &times;
                        </button>

                        <!-- Konten Modal -->
                        <div class="text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500">Apakah Anda yakin ingin menghapus
                                lowongan <span class="font-bold" x-text="selectedLowongan.nama_lowongan"></span>?
                            </h3>
                            <div class="flex justify-center gap-4">
                                <!-- Tombol Konfirmasi Hapus -->
                                <button @click="hapusLowongan(selectedLowongan); openDeleteModal = false"
                                    class="px-5 py-2.5 bg-red-600 text-white rounded hover:bg-red-800">
                                    Ya, Hapus
                                </button>
                                <!-- Tombol Batal -->
                                <button @click="openDeleteModal = false"
                                    class="px-5 py-2.5 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
                                    Batal
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        {{-- form tambah lowongan --}}
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                axios.get('/api/provinces')
                    .then(response => {
                        let options = '<option value="">Pilih</option>';
                        document.getElementById('provinsi').innerHTML = '<option value="">Pilih</option>';
                        document.getElementById('kecamatan').innerHTML = '<option value="">Pilih</option>';
                        document.getElementById('kelurahan').innerHTML = '<option value="">Pilih</option>';
                        response.data.forEach(item => {
                            options +=
                                `<option value="${item.name}" data-id="${item.id}">${item.name}</option>`;
                        });
                        document.getElementById('provinsi').innerHTML = options;
                    });

                document.getElementById('provinsi').addEventListener('change', function() {
                    const id = this.options[this.selectedIndex].getAttribute('data-id');
                    axios.get(`/api/regencies/${id}`)
                        .then(response => {
                            let options = '<option value="">Pilih</option>';
                            document.getElementById('kecamatan').innerHTML =
                                '<option value="">Pilih</option>';
                            document.getElementById('kelurahan').innerHTML =
                                '<option value="">Pilih</option>';
                            response.data.forEach(item => {
                                options +=
                                    `<option value="${item.name}" data-id="${item.id}">${item.name}</option>`;
                            });
                            document.getElementById('kota').innerHTML = options;
                        });
                });

                document.getElementById('kota').addEventListener('change', function() {
                    const id = this.options[this.selectedIndex].getAttribute('data-id');
                    axios.get(`/api/districts/${id}`)
                        .then(response => {
                            let options = '<option value="">Pilih</option>';
                            document.getElementById('kelurahan').innerHTML =
                                '<option value="">Pilih</option>';
                            response.data.forEach(item => {
                                options +=
                                    `<option value="${item.name}" data-id="${item.id}">${item.name}</option>`;
                            });
                            document.getElementById('kecamatan').innerHTML = options;
                        });
                });

                document.getElementById('kecamatan').addEventListener('change', function() {
                    const id = this.options[this.selectedIndex].getAttribute('data-id');
                    axios.get(`/api/villages/${id}`)
                        .then(response => {
                            let options = '<option value="">Pilih</option>';
                            response.data.forEach(item => {
                                options += `<option value="${item.name}">${item.name}</option>`;
                            });
                            document.getElementById('kelurahan').innerHTML = options;
                        });
                });
            });
        </script>

        {{-- Form Edit Lowongan --}}
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                // Initialize provinces
                axios.get('/api/provinces')
                    .then(response => {
                        const provinsiSelect = document.getElementById('Editprovinsi');
                        let options = '<option value="">Pilih</option>';
                        response.data.forEach(item => {
                            options += `<option value="${item.id}">${item.name}</option>`;
                        });
                        provinsiSelect.innerHTML = options;
                    })
                    .catch(error => console.error('Error fetching provinces:', error));

                // Event listener for provinces
                document.getElementById('Editprovinsi').addEventListener('change', function() {
                    const id = this.value; // Get selected province ID
                    const kotaSelect = document.getElementById('Editkota');
                    const kecamatanSelect = document.getElementById('Editkecamatan');
                    const kelurahanSelect = document.getElementById('Editkelurahan');

                    // Reset dependent dropdowns
                    kotaSelect.innerHTML = '<option value="">Pilih</option>';
                    kecamatanSelect.innerHTML = '<option value="">Pilih</option>';
                    kelurahanSelect.innerHTML = '<option value="">Pilih</option>';

                    if (id) {
                        axios.get(`/api/regencies/${id}`)
                            .then(response => {
                                let options = '<option value="">Pilih</option>';
                                response.data.forEach(item => {
                                    options += `<option value="${item.id}">${item.name}</option>`;
                                });
                                kotaSelect.innerHTML = options;
                            })
                            .catch(error => console.error('Error fetching regencies:', error));
                    }
                });

                // Event listener for cities
                document.getElementById('Editkota').addEventListener('change', function() {
                    const id = this.value; // Get selected city ID
                    const kecamatanSelect = document.getElementById('Editkecamatan');
                    const kelurahanSelect = document.getElementById('Editkelurahan');

                    // Reset dependent dropdowns
                    kecamatanSelect.innerHTML = '<option value="">Pilih</option>';
                    kelurahanSelect.innerHTML = '<option value="">Pilih</option>';

                    if (id) {
                        axios.get(`/api/districts/${id}`)
                            .then(response => {
                                let options = '<option value="">Pilih</option>';
                                response.data.forEach(item => {
                                    options += `<option value="${item.id}">${item.name}</option>`;
                                });
                                kecamatanSelect.innerHTML = options;
                            })
                            .catch(error => console.error('Error fetching districts:', error));
                    }
                });

                // Event listener for districts
                document.getElementById('Editkecamatan').addEventListener('change', function() {
                    const id = this.value; // Get selected district ID
                    const kelurahanSelect = document.getElementById('Editkelurahan');

                    // Reset dependent dropdown
                    kelurahanSelect.innerHTML = '<option value="">Pilih</option>';

                    if (id) {
                        axios.get(`/api/villages/${id}`)
                            .then(response => {
                                let options = '<option value="">Pilih</option>';
                                response.data.forEach(item => {
                                    options += `<option value="${item.name}">${item.name}</option>`;
                                });
                                kelurahanSelect.innerHTML = options;
                            })
                            .catch(error => console.error('Error fetching villages:', error));
                    }
                });
            });
        </script>
        <script>
            function hapusLowongan(lowongan) {
                // Simulasi aksi hapus, ganti dengan logika backend yang sesuai
                alert(`Lowongan "${lowongan.judul}" telah dihapus!`);
            }
        </script>


    </x-slot:content>
</x-layout>
