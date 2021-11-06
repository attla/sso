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
		<style>html,body{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;text-rendering:optimizeLegibility}:root{font-size:16px}body{font-family:proxima nova,sans-serif;font-size:1rem;color:#5b708a;overflow-x:hidden;font-weight:400}a{line-height:1;color:#2f5be7}button,.btn{outline:none!important;border:0!important}button:focus,.btn:focus{-webkit-box-shadow:none!important;box-shadow:none!important}h1,h2{color:#1a2859;font-family:proxima nova,sans-serif;font-weight:500}h1{color:#fff;font-size:43px;line-height:45px;font-weight:700;padding-bottom:8px}h2{line-height:1.3;letter-spacing:-2px}.section-spacer{padding:120px 0}.btn{padding:8px 20px;border:0;-webkit-transition:all .5s ease-in-out;transition:all .5s ease-in-out;line-height:26px;font-weight:600;border-radius:4px}.form-group{position:relative}label{display:inline-block;margin-bottom:.5rem}.form-group{margin-bottom:20px}.form-help{position:absolute;right:0;top:5px;font-size:14px}.form-button{margin:15px auto}.navbar-brand{margin-top:-1px}@media screen and (max-width:900px){.login .right{display:none!important}.login .col{margin:30px 0!important}}.x-hidden{overflow-x:hidden!important}.login .section-spacer{padding:0}.login .row{height:100vh}.login .col{align-items:flex-start;flex:1;overflow-y:auto;overflow-x:hidden}.login .navbar-brand{margin:0 auto;display:block!important;text-emphasis:center}.login .col h1{color:#1a2859!important;font-size:25px;font-weight:600;text-align:center;padding-bottom:10px}.login .col .group-content{margin:0 auto;width:400px}.col.right{background:#0a58ca;background:-moz-linear-gradient(bottom,#0a58ca 0%,#0d6efd 100%);background:-webkit-linear-gradient(bottom,#0a58ca 0%,#0d6efd 100%);background:linear-gradient(to top,#0a58ca 0%,#0d6efd 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#297bcc',endColorstr='#0d6efd',GradientType=1);height:100%}.col.right .feature-group{min-height:100%;align-items:center;display:flex}.col.right .box{align-items:center;width:472px;margin:0 auto;text-align:center}.col.right .box h2{color:#fff;font-size:25px;font-weight:600;letter-spacing:-.7px;margin-bottom:30px;line-height:29px}.col.right .box img{width:500px;margin-left:-20px}.col.right .box .buttons{position:absolute;bottom:40px;width:472px;display:flex;align-items:center;text-align:center;justify-content:center}.col.right .box .buttons a{width:40px;height:40px;padding:10px;display:flex;align-items:center;justify-content:center;color:#00000080;font-size:1.6rem;font-weight:bold;border-radius:50%;background-color:#fff;text-decoration:none;box-shadow:0px 3px 20px 0px #7a738810}.error-message{font-size:14px;color:#ff9794;margin:18px 0}@media(max-width:768px){.section-spacer{padding:80px 0}}@media(min-width:1400px){.login .col:nth-child(1){max-width:35%}.login .col:nth-child(2){max-width:65%}}*:focus,*:hover,*:active,button:focus{outline:0}#pass{padding-right:4.55rem}.shpass{cursor:pointer!important;padding:.25rem 1.5rem!important;top:32px;right:0;position:absolute;z-index:99}.shpass i{color:#000;display:block;margin:7px 0px;font-size:1rem}

		.login .col .group-content{min-height:498px}
		.logo-md{width:4rem}*:focus{outline:0}</style>
	</head>
	<body class="x-hidden login">
		<section class="section-spacer">
			<div class="row flex-column-reverse flex-sm-row align-items-center">
				<div class="col">
					<div class="group-content">
						<a class="navbar-brand" href="@route('home')" align="center" title="Página inicial da {{ config('name') }}"><img src="@asset('/img/logo.svg')" class="logo-md" /></a>
						<h1>Acesse sua conta</h1>
						@if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $key => $error)
                            <p @class(['mb-0' => $key == 0])>{{ $error }}</p>
                            @endforeach
                        </div>
                        @endif
						<form action="" method="post" accept-charset="utf-8">
                            @csrf
							<div class="steps-image d-none d-md-block"></div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" autocomplete="off" required tabindex="1" id="email" name="email"{{ !old('email') ? ' autofocus' : '' }} placeholder="Informe seu email"<?= (old('email') ? ' value="' . old('email') . '"' : '') ?>>
							</div>
							<div class="form-group">
								<label for="pass">Senha</label>
								<input type="password" autocomplete="off" required tabindex="2" class="form-control" id="pass" name="password"{{ old('email') ? ' autofocus' : '' }} placeholder="Informe sua senha">
								<button type="button" class="btn btn-lg shpass" data-bs-toggle="tooltip" title="Mostrar senha" id="0" onclick="a1=this.getElementsByTagName('i')[0],a2=this.id=this.id==1?0:1,a1.className='far fa-eye'+(a2?'-slash':'');title2=(a2?'Ocultar':'Mostrar')+' senha';this.setAttribute('data-bs-original-title', title2);document.querySelector('.tooltip-inner').innerHTML=title2;pass=document.getElementById('pass'),pass.type=a2?'text':'password',pass.focus()"><i class="far fa-eye"></i></button>
								{{-- <a href="{{ route('senha') }}" tabindex="5" class="form-help">Esqueceu sua senha?</a> --}}
							</div>
							<div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="remember" id="remember">
                                    <label class="form-check-label" for="remember">Permanecer logado</label>
                                </div>
							<div class="form-group">
								<button class="btn btn-primary w-100 form-button" type="submit" tabindex="3" data-loading-text="<svg style='width:3.5rem' viewBox='0 0 120 30' xmlns='http://www.w3.org/2000/svg' fill='currentColor'><circle cx='15' cy='15' r='15'><animate attributeName='r' from='15' to='15' begin='0s' dur='0.8s' values='15;9;15' calcMode='linear' repeatCount='indefinite' /><animate attributeName='fill-opacity' from='1' to='1' begin='0s' dur='0.8s' values='1;.5;1' calcMode='linear' repeatCount='indefinite' /></circle><circle cx='60' cy='15' r='9' fill-opacity='0.3'><animate attributeName='r' from='9' to='9' begin='0s' dur='0.8s' values='9;15;9' calcMode='linear' repeatCount='indefinite' /><animate attributeName='fill-opacity' from='0.5' to='0.5' begin='0s' dur='0.8s' values='.5;1;.5' calcMode='linear' repeatCount='indefinite' /></circle><circle cx='105' cy='15' r='15'><animate attributeName='r' from='15' to='15' begin='0s' dur='0.8s' values='15;9;15' calcMode='linear' repeatCount='indefinite' /><animate attributeName='fill-opacity' from='1' to='1' begin='0s' dur='0.8s' values='1;.5;1' calcMode='linear' repeatCount='indefinite' /></circle></svg>">Entrar</button>
							</div>
						</form>
						<div class="text-center">
							<span>Não tem conta? <a href="{{ route('register') }}" tabindex="4">Crie grátis</a>.</span>
						</div>
					</div>
				</div>
				<div class="col right">
					<div class="feature-group">
						<div class="box">
							<h2>Todas as ferramentas<br>que você precisa em um só lugar</h2>
							<img src="@asset('/img/track1.svg')" />
							<div class="buttons">
								<a href="https://instagram.com/octhahq" target="_blank" rel="noopener noreferrer" class="me-3"><i class="fab fa-instagram"></i></a>
								<a href="https://twitter.com/octhaahq" target="_blank" rel="noopener noreferrer" class="me-3"><i class="fab fa-twitter"></i></a>
								<a href="https://fb.com/octhahq" target="_blank" rel="noopener noreferrer" class="me-3"><i class="fab fa-facebook-square"></i></a>
								<a href="https://www.linkedin.com/company/octhahq" target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin"></i></a>
							</div>
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