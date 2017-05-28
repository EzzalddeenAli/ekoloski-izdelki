{{ trans('billing::newsletter.confirm.greeting') }}

{{ trans('billing::newsletter.confirm.click on link bellow') }}
{{ route('newsletter.subscribe', ['token' => $customer->newsletter_token]) }}







{{ trans('billing::newsletter.footer.text') }}



{{ trans('billing::newsletter.unsubscribe.link') }} {{ route('newsletter.unsubscribe') }}


