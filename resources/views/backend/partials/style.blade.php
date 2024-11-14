<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
  href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
  rel="stylesheet"
/>

<!-- Icons. Uncomment required icon fonts -->
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/fonts/boxicons.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/vendors/feather/feather.css') }}">
<link rel="stylesheet" href="{{ asset('backend/vendors/css/vendor.bundle.base.css') }}">
<link rel="stylesheet" href="{{ asset('backend/vendors/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
{{-- Bootstrap CDN Icon --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" />

<link rel="stylesheet" type="text/css" href="{{ asset('backend/js/select.dataTables.min.css') }}">
<!-- End plugin css for this page -->


<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{ asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">

<!-- Core CSS -->
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
<link rel="stylesheet" href="{{ asset('backend/assets/css/demo.css') }}" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

<link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

{{-- dropify --}}
<link rel="stylesheet" type="text/css" href="{{asset('backend/assets/custom/dropify/dropify.min.css')}}">

<!-- Page CSS -->

<!-- Helpers -->
<script src="{{ asset('backend/assets/vendor/js/helpers.js') }}"></script>

<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="{{ asset('backend/assets/js/config.js') }}"></script>

{{-- quill editor --}}
<link rel="stylesheet" href="{{asset('backend/assets/custom/quill/quill.snow.css')}}">

<!-- Bootstrap icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    #btnSuccess {
        background-color: #1bc5bd;
        border-color: #1bc5bd;
    }

    #btnInfo {
        background-color: #187de4;
        border-color: #187de4;
    }

    #btnWarning {
        background-color: #ee9d01;
        border-color: #ee9d01
    }

    #btnError {
        background-color: #ee2d41;
        border-color: #ee2d41;
    }

    #btnSuccess,
    #btnInfo,
    #btnWarning,
    #btnError {
        color: #fff;
        border-radius: 0.5rem;
        font-weight: 400 !important;
        font-size: 0.765rem;
        width: 90px;
        height: 36px;
        margin: 3px;
        cursor: pointer;
    }

    .toast-success,
    .toast-info,
    .toast-warning,
    .toast-error {
        width: 300px !important;
        font-family: 'Poppins', sans-serif;
        font-size: 1rem;
        border-radius: 1rem !important;
        background-color: #edf1fd;
        color: #01081e !important;
        border-color: transparent !important;
    }

    button.toast-close-button {
        padding: 0;
        cursor: pointer;
        border: 0;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background-color: #ccd7fc !important;
        -webkit-appearance: none;
    }

    .toast-close-button {
        position: relative;
        right: -0.3em;
        top: -0.3em;
        float: right;
        font-size: 20px;
        -webkit-text-shadow: 0 1px 0 #ffffff;
        text-shadow: 0 1px 0 #ffffff;
        opacity: 0.8;
        -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=80);
        filter: alpha(opacity=80);
        line-height: 1;
        color: #000617;
        font-weight: 500;
    }

    #toast-container>.toast-success {
        background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAYAAAByDd+UAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAKLSURBVHgBzZZNbtpAFMffjMFRQY28hFKpzg1gGZFKWGkqdZX2BHVOUHIC4AQ0J6g5QZVVpDTUqC10V3GDelGqSF3UG1cqgZm+GYIVbPAHoCp/CWY89sxP78289wbgP4tAShW+XugwyeiiP6Xc/VV9PkwzPxao2e+1fHbXBEqOgfEyztDCq5AecN4ZVQ+tuPUigY8H9hvOWHMpZLkc/LWiwEuBwqqcqrUJMBPWk+WN6alrGG4sULpQfWjjqzJsJDL0xsQIQmnws7y6294cJsTLeZW1g6MLwFK/a2JjwvZkFgfd+kogqgFbFuXQ0GxbCwFvrdNhHXHew3+Lz05pUNqD7MQMAYGT17AebTg6eGZMx+PWqhijVDme9zP+KOE1SItCixhVXom+oqp4sld4iHP/EEoLS/3LcsSqrnQVtsFXaFHret9wHvXtBkRvh1b81n3iA6eMrM4kBNw/Y1qZKrSyuEf8TGSUwucPNUwQTYiR4rE9HxgjPb/DGsISytiJRCHYyynNgn2hK5S+gxSaATMZJ/IrDvXip6uXP54e9QjjZ4xSw60YLu5bnCt9/cXKIlr/YGFY/MYmKkm7eBIr18YLRzzIxM7ZW0godL9k3Q2LuLqmKTs70n3ClbKKJBWRcQqLQJiex07kvFYafLRlCCQvWcKYjs+ed3RMPzcq+w6QYqEkLDxgP6uHe/Nn30JHlBEOLdiyRKwGnhdV+nJl4ZVhzTQXkoWH5eTuQCgOszdKXRRP2Fh86OXoaXA0BBSuzWKlFpciWJvFO5gYZKwGX0VeokTJwk1vkKRlS+Zb1hodHK2Mz0T3UlkrRflaVlEkhOMWkHMvT61lVqUGLsIvy+Q22WcyE8fZn2Wee6t/lXrvcWjggekAAAAASUVORK5CYII=') !important;
    }

    #toast-container>.toast-info {
        background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAYAAAByDd+UAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAJaSURBVHgBvVZNbtNQEJ55idd4hSphKnOCkhM0PQHpCUhuADsWLTgkQuwQJyCcoOEEpSfAnKBW6cK0m6wb+U1nXu04bdLkTRT1kxLnOR5/b/7eNwge2Dn61ybEN4agbRFiBAjlPgFM+HfK1xSJfuXDl7/XvQtXEh1fdvnyiT8xeAEzgKKfD3ZHjz6xlOjDeYzN4IQQXsNGYOLpzUH+9VX28B+zQPbx8i0FwZ/NyQQUI7/j+dFFZ2Er8wt5wKA5gW0CoZt/jn7WyxISRvGsKojt8cGEptNWFd46pEFw6kfG+SE6KBrQ4kW27mmu4FDqoVo7wrIaY/AB2Z6U/3USpZbsey8Troed44vujBDuSt8LSDgrJs63IvwNx4HS1IB46msmObEAfUR8RkTvVDnnVDTZoEPgD5cTgG9svPrUWG7babLZntJowl8Ze5hKv/Gttr817htdg+MIucT/D6NWPnjR4/PzLyhg+Bw2ur6jLrfPj9lKH53QgBI07xVqwnkH43KiACKlcnXVrYRUuOHvTGNUFMYRsj6qD3fRTWMsnfkayA6vv0RpudoHJSQdEtKxtwHvsGZ3LaECb3hsyrEg8zGoCiZMzkMkrV5iJlxVlfa9TCym9W5xLB/wRuE4HGE+iEZ8AKRrbRpl3ibirf1OQJ5esnflnFMLcMICXGxfgN1k12ABTh4IsNxA8NM3FaHoZ1IPU/dOGnGbRfVQexgsJXLvsL2r4e69PC8fEzm8UASikTFsAK7glJrTw3nPVhLOiJ9qEF4gllGfxZPbYE/kbH7UF23kX2fS1D6j/i3BTfaqkKQ1ngAAAABJRU5ErkJggg==') !important;
    }

    #toast-container>.toast-warning {
        background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAYAAAByDd+UAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAHbSURBVHgBxZZPTsJAFMa/NxDEjYJE1/UGcgOP4BEwARNXeAP0BMSVCzWNJxBPIDfQG8COhSSwJBH7fFNbaKV/ZsA/vwVppzPz5Zt58zHAH0OwZOCisjNHgxWmBYVe9RRTm/FWgiMXzpZHz/LoBE1DUly3EVWwoOSpTkRM43hzXMACY4eBu0HCp6m4PDR1aeywzOSmfKrYuDQSHN9LkTCOFw3Mr/I7DF9JUXt0E1vqzQQVqBN5ne41UdfFop+DtkqppDpmc+Wg3SFeKL5IsGeLfSNw4+02sgrrCn5zl0mhkN83U3DiqjZgtjc+ss95LlMF9TFgj63OmCbPZapgGZbuQsRlsO/mguu6W05KnYlkbvK3BIII24TUyFsR1O50iWNDdBgkuVwR/AF3IYmRFwtvXdIF5f/9ZOGH9UwmlDB/0RPn9Y0Ge8yhiLnIp8IiZCDm9/U81Y02LBzqUpbqMhG0Zv7B9YMz6MBfOrSJMDkyV8z8YNq/WKTuUgeJAZ2hxk+1Fi5rTTSIuWc2Zhl5Sh8DG3dQtLuYh+jIdFgYeTS+w4kieoQdQ3wVTF7RxNhmdopSNlaDAhyswexd8kDfLRG5LvwWUmTX1XO5VoYNemmJYbwnNnhAf7+FPv6DT2e/n0VFnPgUAAAAAElFTkSuQmCC') !important;
    }

    #toast-container>.toast-error {
        background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAYAAAByDd+UAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAIlSURBVHgB3VbBbtNAEH2zTugFFIPgwAlzA4mK8AdrvgC+APiSKl/S9AvoH8SfEEQP3PCNAwjcA6IQeYcdYxtvbK/jNr30SVG86519npk3swvcdNCuC7880dF0Ck1QzxVMKHMGKmOYD5sNkoefknSXfQYJvz7TekJ0xIAe2CjJwSf3PybLgXXd+BzpcHZHHQP8CiPAoOWfjVn0edxJKOE7mNLKPka4HNLfG467SOkayGpSCvjF3XWSNSfV9qpbU3W0BzJBxLmkxIXj4bdD/VaBjrFH5Mzxg7MkqcaOhwHwBuOR+V4GVuHNcU0oubMK032GNh+P5Wdjsq4nGet6vh/619OXj1qEUtQeI/EiswJISXFckArZhGMRxcUFvPhJJm4REmPusQnZ0OrHXIdCIKQVmdTrwYTee2xBStV7T/7PIvQZWY/mJWlcSb1oDrdtCZH3Y6HIzOpnjIFxh2E4eofGcvarrZkz8awZXkdIXd/J6rxFyH6jzJK9rsgkjNs5hac8mMy6RRgESDyEECU6OStzKuVk30lwezXQ3NvpNN8Pte2h/bVYeuEX1zYYyb2zVbssBDljMWA+jszCEJ80xw7hv57Hp9gTCLzcPpBboqYA7+xfiqsjtc25FbEWYaG6oFBdiiuQyR7SCgcJS9LCgOHGfxfYMJ6WB2/a/X4AxRnJ9tgir3oLNdpL1KJ59l2KsIIt8ijP7TWRixqcldbn0jDGXBNvPv4C3QjuTqveJGAAAAAASUVORK5CYII=') !important;
    }

    .references {
        margin-top: 2rem;
        font-size: 0.75rem;
        display: flex;
        justify-content: flex-start;
        flex-direction: column;
        align-items: center;
    }

    .references a {
        text-decoration: none;
        text-align: left;
    }
</style>
@stack('style')
