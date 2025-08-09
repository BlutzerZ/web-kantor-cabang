    <!DOCTYPE html>
    <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Dashboard - Kantor Cabang</title>
            <script src="https://cdn.tailwindcss.com"></script>
        </head>

        <body class="min-h-screen bg-gradient-to-br from-blue-900 via-purple-900 to-indigo-900">
            <!-- Parallax Background Elements -->
            <div class="absolute inset-0 overflow-hidden">
                <div
                    class="absolute -top-40 -right-40 w-80 h-80 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse">
                </div>
                <div
                    class="absolute -bottom-40 -left-40 w-80 h-80 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse animation-delay-2000">
                </div>
                <div
                    class="absolute top-40 left-40 w-60 h-60 bg-pink-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse animation-delay-4000">
                </div>
            </div>

            <!-- Navigation -->
            <nav class="relative z-20 bg-white/10 backdrop-blur-lg border-b border-white/20">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex items-center">
                            <div class="h-8 w-8 bg-white rounded-full flex items-center justify-center mr-3">
                                <svg class="h-4 w-4 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                    </path>
                                </svg>
                            </div>
                            <h1 class="text-xl font-bold text-white">Dashboard Kantor Cabang</h1>
                        </div>
                        <div class="flex items-center">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-red-500/20 hover:bg-red-500/30 text-white px-4 py-2 rounded-lg border border-red-300/30 backdrop-blur-sm transition duration-200 flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Main Content -->
            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <!-- Dashboard Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <!-- Card 1 -->
                    <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 shadow-2xl border border-white/20">
                        <div class="flex items-center">
                            <div class="p-3 bg-blue-500/20 rounded-full">
                                <svg class="w-6 h-6 text-blue-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 7l-8-4-8 4m16 0l-8 4-8-4m16 0v10l-8 4-8-4V7"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-white">Total Produk Odoo</h3>
                                <p class="text-2xl font-bold text-blue-300">{{ $totalProductsOdoo ?? 0 }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 shadow-2xl border border-white/20">
                        <div class="flex items-center">
                            <div class="p-3 bg-purple-500/20 rounded-full">
                                <svg class="w-6 h-6 text-purple-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-white">Total Backup</h3>
                                <p class="text-2xl font-bold text-purple-300">{{ $totalProductsBackup ?? 0 }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 shadow-2xl border border-white/20">
                        <div class="flex items-center">
                            <div class="p-3 bg-green-500/20 rounded-full">
                                <svg class="w-6 h-6 text-green-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 00-2-2z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-white">Sync Status</h3>
                                <p class="text-2xl font-bold text-green-300">{{ $syncStatus ?? 'Ready' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Backup Button -->
                <div class="mb-8 flex justify-center">
                    <form action="{{ route('dashboard.backup') }}" method="POST">
                        @csrf
                        <button
                            class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-6 py-3 rounded-lg shadow-lg transform hover:scale-105 transition duration-200 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10">
                                </path>
                            </svg>
                            Backup Produk
                        </button>
                    </form>
                </div>

                <!-- Tables -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Odoo Products Table -->
                    <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 shadow-2xl border border-white/20">
                        <h3 class="text-xl font-bold text-white mb-4">Produk Odoo</h3>
                        <div class="overflow-x-auto">
                            <table class="w-full text-white">
                                <thead>
                                    <tr class="border-b border-white/20 text-xs">
                                        <th class="text-left py-2 px-2 whitespace-nowrap">
                                            <span class="block">Template ID</span>
                                        </th>
                                        <th class="text-left py-2 px-2 whitespace-nowrap">
                                            <span class="block">Product ID</span>
                                        </th>
                                        <th class="text-left py-2 px-2 whitespace-nowrap">
                                            <span class="block">Nama Produk</span>
                                        </th>
                                        <th class="text-left py-2 px-2 whitespace-nowrap">
                                            <span class="block">SKU</span>
                                        </th>
                                        <th class="text-left py-2 px-2 whitespace-nowrap">
                                            <span class="block">Harga Jual</span>
                                        </th>
                                        <th class="text-left py-2 px-2 whitespace-nowrap">
                                            <span class="block">Harga Modal</span>
                                        </th>
                                        <th class="text-left py-2 px-2 whitespace-nowrap">
                                            <span class="block">Satuan</span>
                                        </th>
                                        <th class="text-left py-2 px-2 whitespace-nowrap">
                                            <span class="block">Kategori</span>
                                        </th>
                                        <th class="text-left py-2 px-2 whitespace-nowrap">
                                            <span class="block">Stok</span>
                                        </th>
                                        <th class="text-left py-2 px-2 whitespace-nowrap">
                                            <span class="block">Create Date</span>
                                        </th>
                                        <th class="text-left py-2 px-2 whitespace-nowrap">
                                            <span class="block">Write Date</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($productsOdoo ?? [] as $product)
                                        <tr class="border-b border-white/10 text-sm">
                                            <td class="py-2 px-2">{{ $product->template_id }}</td>
                                            <td class="py-2 px-2">{{ $product->product_id }}</td>
                                            <td class="py-2 px-2">{{ $product->product_name }}</td>
                                            <td class="py-2 px-2">{{ $product->sku }}</td>
                                            <td class="py-2 px-2">Rp
                                                {{ number_format((float) $product->sale_price, 0, ',', '.') }}</td>
                                            <td class="py-2 px-2">Rp
                                                {{ number_format((float) $product->cost_price, 0, ',', '.') }}</td>
                                            <td class="py-2 px-2">{{ $product->uom_name }}</td>
                                            <td class="py-2 px-2">{{ $product->category_name }}</td>
                                            <td class="py-2 px-2">{{ $product->total_stock }}</td>
                                            <td class="py-2 px-2">{{ $product->create_date }}</td>
                                            <td class="py-2 px-2">{{ $product->write_date }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="11" class="text-center py-4 text-gray-300">Tidak ada data
                                                produk</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Backup Products Table -->
                    <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 shadow-2xl border border-white/20">
                        <h3 class="text-xl font-bold text-white mb-4">Produk Backup</h3>
                        <div class="overflow-x-auto">
                            <table class="w-full text-white">
                                <thead>
                                    <tr class="border-b border-white/20 text-xs">
                                        <th class="text-left py-2 px-2 whitespace-nowrap">
                                            <span class="block">Template ID</span>
                                        </th>
                                        <th class="text-left py-2 px-2 whitespace-nowrap">
                                            <span class="block">Product ID</span>
                                        </th>
                                        <th class="text-left py-2 px-2 whitespace-nowrap">
                                            <span class="block">Nama Produk</span>
                                        </th>
                                        <th class="text-left py-2 px-2 whitespace-nowrap">
                                            <span class="block">SKU</span>
                                        </th>
                                        <th class="text-left py-2 px-2 whitespace-nowrap">
                                            <span class="block">Harga Jual</span>
                                        </th>
                                        <th class="text-left py-2 px-2 whitespace-nowrap">
                                            <span class="block">Harga Modal</span>
                                        </th>
                                        <th class="text-left py-2 px-2 whitespace-nowrap">
                                            <span class="block">Satuan</span>
                                        </th>
                                        <th class="text-left py-2 px-2 whitespace-nowrap">
                                            <span class="block">Kategori</span>
                                        </th>
                                        <th class="text-left py-2 px-2 whitespace-nowrap">
                                            <span class="block">Stok</span>
                                        </th>
                                        <th class="text-left py-2 px-2 whitespace-nowrap">
                                            <span class="block">Create Date</span>
                                        </th>
                                        <th class="text-left py-2 px-2 whitespace-nowrap">
                                            <span class="block">Write Date</span>
                                        </th>
                                        <th class="text-left py-2 px-2 whitespace-nowrap">
                                            <span class="block">Backup At</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($productsBackup ?? [] as $product)
                                        <tr class="border-b border-white/10 text-sm">
                                            <td class="py-2 px-2">{{ $product->template_id }}</td>
                                            <td class="py-2 px-2">{{ $product->product_id }}</td>
                                            <td class="py-2 px-2">{{ $product->product_name }}</td>
                                            <td class="py-2 px-2">{{ $product->sku }}</td>
                                            <td class="py-2 px-2">Rp
                                                {{ number_format((float) $product->sale_price, 0, ',', '.') }}</td>
                                            <td class="py-2 px-2">Rp
                                                {{ number_format((float) $product->cost_price, 0, ',', '.') }}</td>
                                            <td class="py-2 px-2">{{ $product->uom_name }}</td>
                                            <td class="py-2 px-2">{{ $product->category_name }}</td>
                                            <td class="py-2 px-2">{{ $product->total_stock }}</td>
                                            <td class="py-2 px-2">{{ $product->create_date }}</td>
                                            <td class="py-2 px-2">{{ $product->write_date }}</td>
                                            <td class="py-2 px-2">{{ $product->backup_at }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="12" class="text-center py-4 text-gray-300">Tidak ada data
                                                backup</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Floating Animation -->
            <style>
                @keyframes float {

                    0%,
                    100% {
                        transform: translateY(0px);
                    }

                    50% {
                        transform: translateY(-20px);
                    }
                }

                .animate-float {
                    animation: float 6s ease-in-out infinite;
                }
            </style>
        </body>

    </html>
