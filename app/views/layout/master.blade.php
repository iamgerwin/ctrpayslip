@include('layout.header')

            @yield('header')
        <body>
        <!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
            <!-- Add your site or application content here -->
        <div id="container">
            @yield('body')
        </div>
        </body>
            @yield('footer')
		
@include('layout.footer')