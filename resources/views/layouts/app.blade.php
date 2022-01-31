<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.meta')
    <title>Finance | Dashboard</title>
    @include('includes.css')
    <style>
        body { pointer-events:none; }
    </style>
</head>

<body>
    <div class="wrapper">

            {{-- Sidebar --}}
                @include('layouts.sidebar')
            {{-- End Sidebar --}}

        <div class="main">
            {{-- Navbar --}}
                @include('layouts.navbar')
            {{-- End Navbar --}}

            <main class="content">
                <div class="container-fluid p-0">

                    {{-- Breadcrumbs --}}
                        @include('includes.alerts')
                        @include('sweetalert::alert')
                        {{-- @include('layouts.breadcrumbs') --}}
                    {{-- End Breadcrumbs --}}

                    {{-- Content / Render Area --}}
                        @yield('content')
                    {{-- End Content --}}

                </div>
            </main>

            {{-- Footer --}}
                @include('layouts.footer')
            {{-- End Footer --}}
        </div>
    </div>

   {{-- JS --}}
   @include('includes.js')

</body>

</html>
