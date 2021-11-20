<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Cadastre-se grátis - {{ config('name') }}</title>
        <link rel="icon" type="image/png" sizes="32x32" href="@asset('/img/favicon-32x32.png')">
		<link rel="icon" type="image/png" sizes="16x16" href="@asset('/img/favicon-16x16.png')">
		<meta name="description" content="Crie sua conta grátis e experimente sem compromisso.">
		<meta name="abstract" content="Cadastre-se grátis - {{ config('name') }}">
		<meta name="keywords" content="octha, sso">
		<meta name="robot" content="all">
		<meta name="rating" content="general">
		<meta name="language" content="pt-br">
		<meta property="og:title" content="Cadastre-se grátis - {{ config('name') }}">
		<meta property="og:type" content="website">
		<meta property="og:site_name" content="{{ config('name') }}">
		<meta property="og:url" content="{{ route('register') }}">
		<meta property="og:description" content="Crie sua conta grátis e experimente sem compromisso.">
		<meta property="twitter:card" content="summary_large_image">
		<meta property="twitter:title" content="Cadastre-se grátis - {{ config('name') }}">
		<meta property="twitter:description" content="Crie sua conta grátis e experimente sem compromisso.">

        <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.15.3/css/pro.min.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
        <style>html,body{background:#f9f9f9;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;text-rendering:optimizeLegibility}:root{font-size:16px}body{font-family:proxima nova,sans-serif;font-size:1rem;color:#5b708a;overflow-x:hidden;font-weight:400}a{line-height:1;color:#2f5be7}button,.btn{outline:none!important;border:0!important}button:focus,.btn:focus{-webkit-box-shadow:none!important;box-shadow:none!important}h1{color:#1a2859;font-family:proxima nova,sans-serif;font-weight:500}h1{color:#fff;font-size:43px;line-height:45px;font-weight:700;padding-bottom:8px}p{font-size:1.08rem;line-height:25px}.section-spacer{padding:0}.btn{border:0;-webkit-transition:all .5s ease-in-out;transition:all .5s ease-in-out;line-height:26px;font-weight:600;border-radius:4px}.form-group{position:relative;margin-bottom:20px}@media screen and (max-width:900px){.login .col{margin:30px 0!important}}@media(min-width:576px){.login .row{height:100vh}}.x-hidden{overflow-x:hidden!important}.login .col{align-items:flex-start;flex:1;overflow-y:auto;overflow-x:hidden}.login .col h1{color:#1a2859!important;font-size:25px;font-weight:600;text-align:center;padding-bottom:10px}.login .col .group-content{margin:0 auto;max-width:400px}.signup .terms{text-align:center;font-size:15px;line-height:19px}@media(max-width:576px){.section-spacer{padding:0 20px 0}}*:focus,*:hover,*:active,button:focus{outline:0}#pass{padding-right:4.55rem}.shpass{cursor:pointer!important;padding:.25rem 1.5rem!important;top:32px;right:0;position:absolute;z-index:99}.shpass i{color:#000;display:block;margin:7px 0px;font-size:1rem}label{display:inline-block;margin-bottom:.5rem}</style>
	</head>
	<body class="x-hidden login signup">
		<section class="section-spacer">
			<div class="row flex-column-reverse flex-sm-row align-items-center">
				<div class="col">
					<div class="group-content">
						<h1>Cadastre-se grátis</h1>
                        @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $key => $error)
                            <p @class(['mb-0' => $key == 0])>{{ $error }}</p>
                            @endforeach
                        </div>
                        @endif
						<form action="" method="post" accept-charset="utf-8">
                            @csrf
							<div class="form-group">
								<label for="name">Nome completo <span class="text-danger" data-bs-toggle="tooltip" title="Esse campo é obrigatório">*</span></label>
								<input type="text" class="form-control" id="name" name="name" placeholder="informe seu nome completo" autofocus autocomplete="off" required tabindex="1" pattern="^[\p{L}'-.]{4,}(?: [\p{L}'-.]+)+$" title="Preencha com pelo menos seu nome e sobrenome">
							</div>
							<div class="form-group">
								<label for="email">Email <span class="text-danger" data-bs-toggle="tooltip" title="Esse campo é obrigatório">*</span></label>
								<input type="email" class="form-control" id="email" name="email" placeholder="informe seu email profissional" autocomplete="off" required tabindex="2">
							</div>
							<div class="form-group">
								<label for="pass">Senha <span class="text-danger" data-bs-toggle="tooltip" title="Esse campo é obrigatório">*</span></label>
								<input type="password" class="form-control" id="pass" name="password" placeholder="digite sua senha" autocomplete="off" required tabindex="3">
                                <button type="button" class="btn btn-lg shpass" data-bs-toggle="tooltip" title="Mostrar senha" id="0" onclick="a1=this.getElementsByTagName('i')[0],a2=this.id=this.id==1?0:1,a1.className='far fa-eye'+(a2?'-slash':'');title2=(a2?'Ocultar':'Mostrar')+' senha';this.setAttribute('data-original-title', title2);document.querySelector('.tooltip-inner').innerHTML=title2;pass=document.getElementById('pass'),pass.type=a2?'text':'password',pass.focus()"><i class="far fa-eye"></i></button>
							</div>
							<div class="form-group">
								<label for="pass2">Confirme a senha <span class="text-danger" data-bs-toggle="tooltip" title="Esse campo é obrigatório">*</span></label>
								<input type="password" class="form-control" id="pass2" name="password_confirmation" placeholder="digite novamente sua senha" autocomplete="off" required tabindex="4">
								<button type="button" class="btn btn-lg shpass" data-bs-toggle="tooltip" title="Mostrar senha" id="0" onclick="a1=this.getElementsByTagName('i')[0],a2=this.id=this.id==1?0:1,a1.className='far fa-eye'+(a2?'-slash':'');title2=(a2?'Ocultar':'Mostrar')+' senha';this.setAttribute('data-original-title', title2);document.querySelector('.tooltip-inner').innerHTML=title2;pass2=document.getElementById('pass2'),pass2.type=a2?'text':'password',pass2.focus()"><i class="far fa-eye"></i></button>
							</div>
							<div class="form-group">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="terms" onchange="submit=document.getElementById('__');this.checked?submit.disabled=false:submit.disabled=true">
                                    <label class="form-check-label" for="terms" style="font-size:15px">Eu li e concordo com os <a href="@route('terms')" target="_blank">termos de uso</a> e as <a href="@route('privacy')" target="_blank">políticas de privacidade</a></label>
                                </div>
							</div>
							<div class="form-group">
								<button id="__" disabled class="btn btn-primary w-100 form-button" type="submit" data-loading-text="<svg style='width:3.5rem' viewBox='0 0 120 30' xmlns='http://www.w3.org/2000/svg' fill='currentColor'><circle cx='15' cy='15' r='15'><animate attributeName='r' from='15' to='15' begin='0s' dur='0.8s' values='15;9;15' calcMode='linear' repeatCount='indefinite' /><animate attributeName='fill-opacity' from='1' to='1' begin='0s' dur='0.8s' values='1;.5;1' calcMode='linear' repeatCount='indefinite' /></circle><circle cx='60' cy='15' r='9' fill-opacity='0.3'><animate attributeName='r' from='9' to='9' begin='0s' dur='0.8s' values='9;15;9' calcMode='linear' repeatCount='indefinite' /><animate attributeName='fill-opacity' from='0.5' to='0.5' begin='0s' dur='0.8s' values='.5;1;.5' calcMode='linear' repeatCount='indefinite' /></circle><circle cx='105' cy='15' r='15'><animate attributeName='r' from='15' to='15' begin='0s' dur='0.8s' values='15;9;15' calcMode='linear' repeatCount='indefinite' /><animate attributeName='fill-opacity' from='1' to='1' begin='0s' dur='0.8s' values='1;.5;1' calcMode='linear' repeatCount='indefinite' /></circle></svg>">Começar</button>
							</div>
						</form>
						<div class="text-center">
							<span>Já possui conta? <a href="@route(config('sso.route-group.as') . 'login', ['token' => $token])">Acesse sua conta</a>.</span>
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