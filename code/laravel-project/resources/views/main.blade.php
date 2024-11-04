<!DOCTYPE html>
<html lang="ru">
@include('includes.head')
<body>
<x-header/>

<div class="container-fluid">
    <div class="row">
        <x-sidebar/>

        <main class="col-md-9 ml-sm-auto col-lg-9 px-4">
            @yield('content')
        </main>
    </div>
</div>

<x-footer/>

</body>
</html>
