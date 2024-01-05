<x-laravel-ui-adminlte::adminlte-layout>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"  />
<body class="sidebar-mini" style="height: auto;">
    <div class="wrapper">

        @include('Layouts.Navbar')

        @include('Layouts.Sidebar')
        <div class="content-wrapper" style="min-height: 1302.4px;">
            @yield('content')
        </div>

        @include('Layouts.Footer')

    </div>
    <script>
        $(document).ready(function() {
            function fetchData(page, searchTaskValue, selectProjrctValue) {
                $.ajax({
                    url: 'taches/?page=' + page + '&searchTaskValue=' + searchTaskValue +
                        '&selectProjrctValue=' +
                        selectProjrctValue,
                    success: function(data) {
                        $('tbody').html('');
                        $('tbody').html(data);
                        // console.log(data);
                    }
                });
                console.log(page);
                console.log(searchTaskValue);
                console.log(selectProjrctValue);
            }

            $('body').on('click', '.pagination a', function(e) {

                e.preventDefault();

                let page = $(this).attr('href').split('page=')[1];
                let searchTaskValue = $('#search-input').val();
                let selectProjrctValue = $('#filterSelectProjrctValue').val();
                // console.log($(this).attr('href').split('page=')[1]);
                // console.log($(this).attr('href'));
                fetchData(page, searchTaskValue, selectProjrctValue);

            });

            $('body').on('keyup', '#search-input', function() {
                let page = $('#page').val();
                let searchTaskValue = $('#search-input').val();
                let selectProjrctValue = $('#filterSelectProjrctValue').val();

                fetchData(page, searchTaskValue, selectProjrctValue);
            });

            $('#filterSelectProjrctValue').on('change', function() {
                let page = $('#page').val();
                let searchTaskValue = $('#search-input').val();
                let selectProjrctValue = $(this).val();
                fetchData(page, searchTaskValue, selectProjrctValue);
            });

        });
    </script>
</x-laravel-ui-adminlte::adminlte-layout>
