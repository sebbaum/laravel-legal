<div class="container legal-footer">
  <hr>

  @if(config('legal.tos'))
    <a href="{{ route('tos') }}">Terms Of Service</a><br>
  @endif

  @if(config('legal.pripol'))
    <a href="{{ route('pripol') }}">Privacy Policy</a><br>
  @endif

  @if(config('legal.gtc'))
    <a href="{{ route('gtc') }}">GTC</a>
  @endif

</div>