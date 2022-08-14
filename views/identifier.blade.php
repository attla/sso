<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Acesse sua conta - {{ config('name') }}</title>
		<link rel="icon" type="image/png" sizes="32x32" href="@asset('/img/favicon-32x32.png')">
		<link rel="icon" type="image/png" sizes="16x16" href="@asset('/img/favicon-16x16.png')">
		<meta name="description" content="Acesse sua conta do {{ config('name') }}.">
		{{-- <meta name="description" content="Controle de Ponto Online e Banco de Horas"> --}}
		<meta name="abstract" content="Acesse sua conta - {{ config('name') }}">
		{{-- <meta name="keywords" content="zarrp, zarp, zarp.shop, vitrine virtual, ecommerce, e-commerce, loja virtual"> --}}
		<meta name="keywords" content="octha, sso">
		<meta name="robot" content="all">
		<meta name="rating" content="general">
		<meta name="language" content="pt-br">
		<meta property="og:title" content="Acesse sua conta - {{ config('name') }}">
		<meta property="og:type" content="website">
		<meta property="og:site_name" content="{{ config('name') }}">
		<meta property="og:url" content="{{ route('login') }}">
		<meta property="og:description" content="Acesse sua conta do {{ config('name') }}.">
		<meta property="og:image" content="@asset('/img/preview-0e49853d00224b772a089208b481daa5.png')">
		<meta property="twitter:card" content="summary_large_image">
		<meta property="twitter:title" content="Login - {{ config('name') }}">
		<meta property="twitter:description" content="Acesse sua conta do {{ config('name') }}.">
		<meta property="twitter:image" content="@asset('/img/preview-0e49853d00224b772a089208b481daa5.png')">

		<link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.15.3/css/pro.min.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
		<style>html,body{background:#f9f9f9;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;text-rendering:optimizeLegibility}body{font-family:proxima nova,sans-serif;font-size:1rem;color:#5b708a;overflow-x:hidden;font-weight:400}a{line-height:1;color:#2f5be7}button,.btn{outline:none!important;border:0!important}button:focus,.btn:focus{-webkit-box-shadow:none!important;box-shadow:none!important}h1,h2{color:#1a2859;font-family:proxima nova,sans-serif;font-weight:500}h1{color:#fff;font-size:43px;line-height:45px;font-weight:700;padding-bottom:8px}h2{line-height:1.3;letter-spacing:-2px}.section-spacer{padding:0}.btn{padding:8px 20px;border:0;-webkit-transition:all .5s ease-in-out;transition:all .5s ease-in-out;line-height:26px;font-weight:600;border-radius:4px}.form-group{position:relative;margin-bottom:20px}label{display:inline-block;margin-bottom:.5rem}.form-button{margin:15px auto}@media screen and (max-width:900px){.login .col{margin:30px 0!important}}@media(max-width:576px){.section-spacer{padding:80px 20px 0}}@media(min-width:576px){.login .row{height:100vh}}.x-hidden{overflow-x:hidden!important}.login .col{align-items:flex-start;flex:1;overflow-y:auto;overflow-x:hidden}.login .col h1{color:#1a2859!important;font-size:25px;font-weight:600;text-align:center;padding-bottom:10px}.login .col .group-content{margin:0 auto;max-width:400px}*:focus,*:hover,*:active,button:focus{outline:0}

		.login .col .group-content{min-height:498px}
        .card-cover[href]:hover{transform:scale(1.05);cursor:pointer;-webkit-transition:all .3s ease;transition:all .3s ease;z-index:1}
        .name{font-size:1.3rem;color:#1a2859}</style>
	</head>
	<body class="x-hidden login">
		<section class="section-spacer">
			<div class="row flex-column-reverse flex-sm-row align-items-center">
				<div class="col">
					<div class="group-content">
						<h1>Continuar como</h1>
						<a href="{{ $callback }}" class="card card-cover d-block border-0 shadow-sm p-3 mb-4 text-decoration-none">
                            <img src="{{ $user->image }}" class="rounded-circle me-2" width="70">
                            <b class="name notranslate">{{ name($user->name) }}</b>
                        </a>
						<div class="text-center">
							<span>Deseja entrar com outra conta? <a href="@route(config('sso.route-group.as') . 'login', ['state' => $state, 'redirect' => $redirect])" tabindex="4">Trocar de conta</a>.</span>
						</div>
					</div>
				</div>
			</div>
		</section>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
		<script>
			$('[data-loading-text]').closest('form').submit(function(){$(this).find('[type=submit]').html($(this).find('[type=submit]').attr('data-loading-text'));$(this).find('[type=submit]').prop('disabled',true)});
			var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
		</script>
	</body>
</html>