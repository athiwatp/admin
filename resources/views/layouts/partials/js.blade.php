<script>
window.Laravel = {!! json_encode([
  'token' => csrf_token(),
  'app' => [
    'name' => config('app.name'),
    'auth' => auth()->check()
  ]
]) !!}
</script>
