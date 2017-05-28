<footer class="container">

    <div class="row">

        <div class="col-md-4">
            {{-- Copyright ©  {{ date('Y') }} --}}<a href="http://ekoloski-izdelki.si" target="_blank">ekoloski-izdelki.si</a>
        </div>

        <div class="col-md-4 text-center">
            {{--
            <a href="{{ route("billing.legal.general") }}">Legal</a>
            --}}
            <a href="/{{ App::getLocale() }}/general-information">{{ trans('billing::legal.general.link text') }}</a>
        </div>

        <div class="col-md-4 text-right">
            <a href="mailto:{!! "mailto:bojan@kovacec.net"  !!}">{!! "bojan@kovacec.net" !!}</a>
        </div>

    </div>

</footer>
