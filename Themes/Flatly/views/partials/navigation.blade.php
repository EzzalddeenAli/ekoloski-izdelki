<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL::to('/') }}">@setting('core::site-name')</a>
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
            @menu('main')

            <ul class="nav navbar-nav pull-right">
                <li>
                    @if($currentUser)

                    <a href="/{{ Config::get('app.locale') }}/backend">
                        <i class="fa fa-user">
                        </i>
                        {{ $currentUser->first_name }} {{ $currentUser->last_name }}

                    </a>
                    @else
                        <a href="{{ route('login')  }}">
                            <i class="fa fa-user">
                            </i>
                            {{ trans('account')  }}
                        </a>
                    @endif
                </li>
            </ul>

        </div>
    </div>
</nav>
