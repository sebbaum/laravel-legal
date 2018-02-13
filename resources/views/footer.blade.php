<div class="container legal-footer">
  <hr>

  @if(config('legal.tos'))
    <a href="{{ route('legal.tos') }}">@lang('legal::legal.tos_short')</a> &middot;
  @endif

  @if(config('legal.pripol'))
    <a href="{{ route('legal.pripol') }}">@lang('legal::legal.pripol')</a>
  @endif

  @if(config('legal.imprint'))
  &middot; <a href="{{ route('legal.imprint') }}">@lang('legal::legal.imprint')</a>
  @endif
</div>