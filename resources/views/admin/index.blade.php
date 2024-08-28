<!-- resources/views/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
@include('admin.css')
<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        @include('admin.sidebar')
        <div class="page-content">
            @include('admin.body')
        </div>
    </div>

    @include('admin.js')
    <!-- JavaScript files-->

</body>
</html>
