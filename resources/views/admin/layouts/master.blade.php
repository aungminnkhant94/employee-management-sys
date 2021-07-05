@include('admin.layouts.navbar')

@include('admin.layouts.sidebar')

    <div id="layoutSidenav_content">
        <main>
            @yield('content')
        </main>
    </div>
@include('admin.layouts.footer')