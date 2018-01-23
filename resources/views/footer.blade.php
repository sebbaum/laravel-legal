<div class="container legal-footer">
  <hr>

  @if(config('legal.tos'))
    <a href="{{ route('tos') }}">@lang('legal::legal.tos')</a><br>
  @endif

  @if(config('legal.pripol'))
    <a href="{{ route('pripol') }}">@lang('legal::legal.pripol')</a><br>
  @endif

  @if(config('legal.gtc'))
    <a href="{{ route('gtc') }}">@lang('legal::legal.gtc')</a>
  @endif

</div>