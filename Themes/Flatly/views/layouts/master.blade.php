<!DOCTYPE html>
<html data-token="{{ \Illuminate\Support\Facades\Session::get('frontend_token') }}">
    <head lang="{{ LaravelLocalization::setLocale() }}">
        <meta charset="UTF-8">
        @section('meta')
            <meta name="description" content="@setting('core::site-description')" />
        @show
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            @section('title')@setting('core::site-name')@show
        </title>
        <link rel="shortcut icon" href="{{ Theme::url('favicon.ico') }}">

        {!! Theme::style('css/main.css') !!}
    </head>
    <body>
        @include('partials.navigation')


        @yield('content')


        @include('partials.footer')

        {!! Theme::script('js/all.js') !!}
        @yield('scripts')

        <script>

            var frontend_token = document.documentElement.getAttribute('data-token')
            // console.log('session_frontend_token', '{{ \Illuminate\Support\Facades\Session::get('frontend_token') }}');
            // console.log('html_data_token', frontend_token)

            if(frontend_token == '') {

                new Fingerprint2().get(function(result, components) {

                    axios.get('/log/set/frontend/' + result)
                        .then(function (response) {
                            document.documentElement.setAttribute('data-token', result)
                        })
                        .catch(function (error) {
                            console.log(error);
                        })

                })

            }

        </script>


        <?php if (Setting::has('core::analytics-script')): ?>
        {!! Setting::get('core::analytics-script') !!}
        <?php endif; ?>
    </body>
</html>
