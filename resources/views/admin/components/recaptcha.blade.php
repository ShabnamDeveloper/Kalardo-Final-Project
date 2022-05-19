<script src='https://www.google.com/recaptcha/api.js?hl=fa' async defer></script>
<div class='g-recaptcha {{ $hasError ? 'is-invalid' : ''}}' data-sitekey='{{ $clientKey  }}'></div>
