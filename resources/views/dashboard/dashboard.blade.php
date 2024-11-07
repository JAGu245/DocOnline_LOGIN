<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocOnline</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <nav class="w-64 bg-gray-800 text-white p-6">
            <h5 class="text-lg font-semibold mb-6">Document</h5>
            <ul class="space-y-4">
                <li>
                    <a href="{{ route('home') }}" class="text-gray-300 hover:text-white">Home</a>
                </li>
                <li>
                    <a href="{{ route('datakaryawan.index') }}" class="text-gray-300 hover:text-white">Data Karyawan</a>
                </li>
                <li>
                    <a href="{{ route('files.index') }}" class="text-gray-300 hover:text-white">Dokumen</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" class="text-gray-300 hover:text-white"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="flex justify-between items-center mb-6 border-b pb-2">
                <h1 class="text-2xl font-semibold"></h1>
            </div>

            <div>
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Tambahkan JS (Jika perlu) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
