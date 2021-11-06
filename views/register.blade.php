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
		{{-- <meta name="keywords" content="controle, financeiro, contas a pagar, relatórios, sistema de gestão, gerenciador, fluxo de caixa, planejamento de projetos, gerenciamento de equipes, taregas, sistema, software, online, web, attla"> --}}
		<meta name="keywords" content="octha, sso">
		<meta name="robot" content="all">
		<meta name="rating" content="general">
		<meta name="language" content="pt-br">
		<meta property="og:title" content="Cadastre-se grátis - {{ config('name') }}">
		<meta property="og:type" content="website">
		<meta property="og:site_name" content="{{ config('name') }}">
		<meta property="og:url" content="{{ route('register') }}">
		<meta property="og:description" content="Crie sua conta grátis e experimente sem compromisso.">
		{{-- <meta property="og:image" content="@asset('/img/preview-0e49853d00224b772a089208b481daa5.png')"> --}}
		<meta property="twitter:card" content="summary_large_image">
		<meta property="twitter:title" content="Cadastre-se grátis - {{ config('name') }}">
		<meta property="twitter:description" content="Crie sua conta grátis e experimente sem compromisso.">
		{{-- <meta property="twitter:image" content="@asset('/img/preview-0e49853d00224b772a089208b481daa5.png')"> --}}

        <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.15.3/css/pro.min.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
        <style>.m-n1{margin:-.25rem!important}.mt-n1,.my-n1{margin-top:-.25rem!important}.me-n1,.mx-n1{margin-right:-.25rem!important}.mb-n1,.my-n1{margin-bottom:-.25rem!important}.ms-n1,.mx-n1{margin-left:-.25rem!important}.m-n2{margin:-.5rem!important}.mt-n2,.my-n2{margin-top:-.5rem!important}.me-n2,.mx-n2{margin-right:-.5rem!important}.mb-n2,.my-n2{margin-bottom:-.5rem!important}.ms-n2,.mx-n2{margin-left:-.5rem!important}.m-n3{margin:-1rem!important}.mt-n3,.my-n3{margin-top:-1rem!important}.me-n3,.mx-n3{margin-right:-1rem!important}.mb-n3,.my-n3{margin-bottom:-1rem!important}.ms-n3,.mx-n3{margin-left:-1rem!important}.m-n4{margin:-1.5rem!important}.mt-n4,.my-n4{margin-top:-1.5rem!important}.me-n4,.mx-n4{margin-right:-1.5rem!important}.mb-n4,.my-n4{margin-bottom:-1.5rem!important}.ms-n4,.mx-n4{margin-left:-1.5rem!important}.m-n5{margin:-3rem!important}.mt-n5,.my-n5{margin-top:-3rem!important}.me-n5,.mx-n5{margin-right:-3rem!important}.mb-n5,.my-n5{margin-bottom:-3rem!important}.ms-n5,.mx-n5{margin-left:-3rem!important}@media (min-width:576px){.m-sm-n1{margin:-.25rem!important}.mt-sm-n1,.my-sm-n1{margin-top:-.25rem!important}.me-sm-n1,.mx-sm-n1{margin-right:-.25rem!important}.mb-sm-n1,.my-sm-n1{margin-bottom:-.25rem!important}.ms-sm-n1,.mx-sm-n1{margin-left:-.25rem!important}.m-sm-n2{margin:-.5rem!important}.mt-sm-n2,.my-sm-n2{margin-top:-.5rem!important}.me-sm-n2,.mx-sm-n2{margin-right:-.5rem!important}.mb-sm-n2,.my-sm-n2{margin-bottom:-.5rem!important}.ms-sm-n2,.mx-sm-n2{margin-left:-.5rem!important}.m-sm-n3{margin:-1rem!important}.mt-sm-n3,.my-sm-n3{margin-top:-1rem!important}.me-sm-n3,.mx-sm-n3{margin-right:-1rem!important}.mb-sm-n3,.my-sm-n3{margin-bottom:-1rem!important}.ms-sm-n3,.mx-sm-n3{margin-left:-1rem!important}.m-sm-n4{margin:-1.5rem!important}.mt-sm-n4,.my-sm-n4{margin-top:-1.5rem!important}.me-sm-n4,.mx-sm-n4{margin-right:-1.5rem!important}.mb-sm-n4,.my-sm-n4{margin-bottom:-1.5rem!important}.ms-sm-n4,.mx-sm-n4{margin-left:-1.5rem!important}.m-sm-n5{margin:-3rem!important}.mt-sm-n5,.my-sm-n5{margin-top:-3rem!important}.me-sm-n5,.mx-sm-n5{margin-right:-3rem!important}.mb-sm-n5,.my-sm-n5{margin-bottom:-3rem!important}.ms-sm-n5,.mx-sm-n5{margin-left:-3rem!important}}@media (min-width:768px){.m-md-n1{margin:-.25rem!important}.mt-md-n1,.my-md-n1{margin-top:-.25rem!important}.me-md-n1,.mx-md-n1{margin-right:-.25rem!important}.mb-md-n1,.my-md-n1{margin-bottom:-.25rem!important}.ms-md-n1,.mx-md-n1{margin-left:-.25rem!important}.m-md-n2{margin:-.5rem!important}.mt-md-n2,.my-md-n2{margin-top:-.5rem!important}.me-md-n2,.mx-md-n2{margin-right:-.5rem!important}.mb-md-n2,.my-md-n2{margin-bottom:-.5rem!important}.ms-md-n2,.mx-md-n2{margin-left:-.5rem!important}.m-md-n3{margin:-1rem!important}.mt-md-n3,.my-md-n3{margin-top:-1rem!important}.me-md-n3,.mx-md-n3{margin-right:-1rem!important}.mb-md-n3,.my-md-n3{margin-bottom:-1rem!important}.ms-md-n3,.mx-md-n3{margin-left:-1rem!important}.m-md-n4{margin:-1.5rem!important}.mt-md-n4,.my-md-n4{margin-top:-1.5rem!important}.me-md-n4,.mx-md-n4{margin-right:-1.5rem!important}.mb-md-n4,.my-md-n4{margin-bottom:-1.5rem!important}.ms-md-n4,.mx-md-n4{margin-left:-1.5rem!important}.m-md-n5{margin:-3rem!important}.mt-md-n5,.my-md-n5{margin-top:-3rem!important}.me-md-n5,.mx-md-n5{margin-right:-3rem!important}.mb-md-n5,.my-md-n5{margin-bottom:-3rem!important}.ms-md-n5,.mx-md-n5{margin-left:-3rem!important}}@media (min-width:992px){.mb-lg-n1,.my-lg-n1{margin-bottom:-.25rem!important}.ms-lg-n1,.mx-lg-n1{margin-left:-.25rem!important}.m-lg-n2{margin:-.5rem!important}.mt-lg-n2,.my-lg-n2{margin-top:-.5rem!important}.me-lg-n2,.mx-lg-n2{margin-right:-.5rem!important}.mb-lg-n2,.my-lg-n2{margin-bottom:-.5rem!important}.ms-lg-n2,.mx-lg-n2{margin-left:-.5rem!important}.m-lg-n3{margin:-1rem!important}.mt-lg-n3,.my-lg-n3{margin-top:-1rem!important}.me-lg-n3,.mx-lg-n3{margin-right:-1rem!important}.mb-lg-n3,.my-lg-n3{margin-bottom:-1rem!important}.ms-lg-n3,.mx-lg-n3{margin-left:-1rem!important}.m-lg-n4{margin:-1.5rem!important}.mt-lg-n4,.my-lg-n4{margin-top:-1.5rem!important}.me-lg-n4,.mx-lg-n4{margin-right:-1.5rem!important}.mb-lg-n4,.my-lg-n4{margin-bottom:-1.5rem!important}.ms-lg-n4,.mx-lg-n4{margin-left:-1.5rem!important}.m-lg-n5{margin:-3rem!important}.mt-lg-n5,.my-lg-n5{margin-top:-3rem!important}.me-lg-n5,.mx-lg-n5{margin-right:-3rem!important}.mb-lg-n5,.my-lg-n5{margin-bottom:-3rem!important}.ms-lg-n5,.mx-lg-n5{margin-left:-3rem!important}}@media (min-width:1200px){.m-xl-n1{margin:-.25rem!important}.mt-xl-n1,.my-xl-n1{margin-top:-.25rem!important}.me-xl-n1,.mx-xl-n1{margin-right:-.25rem!important}.mb-xl-n1,.my-xl-n1{margin-bottom:-.25rem!important}.ms-xl-n1,.mx-xl-n1{margin-left:-.25rem!important}.m-xl-n2{margin:-.5rem!important}.mt-xl-n2,.my-xl-n2{margin-top:-.5rem!important}.me-xl-n2,.mx-xl-n2{margin-right:-.5rem!important}.mb-xl-n2,.my-xl-n2{margin-bottom:-.5rem!important}.ms-xl-n2,.mx-xl-n2{margin-left:-.5rem!important}.m-xl-n3{margin:-1rem!important}.mt-xl-n3,.my-xl-n3{margin-top:-1rem!important}.me-xl-n3,.mx-xl-n3{margin-right:-1rem!important}.mb-xl-n3,.my-xl-n3{margin-bottom:-1rem!important}.ms-xl-n3,.mx-xl-n3{margin-left:-1rem!important}.m-xl-n4{margin:-1.5rem!important}.mt-xl-n4,.my-xl-n4{margin-top:-1.5rem!important}.me-xl-n4,.mx-xl-n4{margin-right:-1.5rem!important}.mb-xl-n4,.my-xl-n4{margin-bottom:-1.5rem!important}.ms-xl-n4,.mx-xl-n4{margin-left:-1.5rem!important}.m-xl-n5{margin:-3rem!important}.mt-xl-n5,.my-xl-n5{margin-top:-3rem!important}.me-xl-n5,.mx-xl-n5{margin-right:-3rem!important}.mb-xl-n5,.my-xl-n5{margin-bottom:-3rem!important}.ms-xl-n5,.mx-xl-n5{margin-left:-3rem!important}}</style>

        <style>html,body{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;text-rendering:optimizeLegibility}:root{font-size:16px}body{font-family:proxima nova,sans-serif;font-size:1rem;color:#5b708a;overflow-x:hidden;font-weight:400}a{line-height:1;color:#2f5be7}button,.btn{outline:none!important;border:0!important}button:focus,.btn:focus{-webkit-box-shadow:none!important;box-shadow:none!important}h1{color:#1a2859;font-family:proxima nova,sans-serif;font-weight:500}h1{color:#fff;font-size:43px;line-height:45px;font-weight:700;padding-bottom:8px}p{font-size:1.08rem;line-height:25px}.section-spacer{padding:120px 0}.btn{padding:8px 20px 7px;border:0;-webkit-transition:all .5s ease-in-out;transition:all .5s ease-in-out;line-height:26px;font-weight:600;border-radius:4px}.form-group{position:relative}.form-group{margin-bottom:20px}.form-button{margin:15px auto}.navbar-brand{margin-top:-1px}@media screen and (max-width:900px){.login .col{margin:30px 0!important}}.x-hidden{overflow-x:hidden!important}.login .section-spacer{padding:0}.login .row{height:100vh}.login .col{align-items:flex-start;flex:1;overflow-y:auto;overflow-x:hidden}.login .navbar-brand{margin:0 auto;display:block!important;text-emphasis:center;margin-bottom:10px}.login .col h1{color:#1a2859!important;font-size:25px;font-weight:600;text-align:center;padding-bottom:10px}.login .col .group-content{margin:0 auto;width:400px}.signup .terms{text-align:center;font-size:15px;line-height:19px}.error-email,.error-password{display:flex;flex-direction:column}@media(max-width:768px){.section-spacer{padding:80px 0}}*:focus,*:hover,*:active,button:focus{outline:0}#pass{padding-right:4.55rem}.shpass{cursor:pointer!important;padding:.25rem 1.5rem!important;top:32px;right:0;position:absolute;z-index:99}.shpass i{color:#000;display:block;margin:7px 0px;font-size:1rem}.logo-md{width:4rem}*:focus{outline:0}label{display:inline-block;margin-bottom:.5rem}.form-group{margin-bottom:20px}</style>
	</head>
	<body class="x-hidden login signup">
		<section class="section-spacer">
			<div class="row flex-column-reverse flex-sm-row align-items-center">
				<div class="col">
					<div class="group-content">
						<a class="navbar-brand" href="@route('home')" align="center" title="Página inicial da {{ config('name') }}"><img src="@asset('/img/logo/logo.svg')" class="logo-md" /></a>
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
							<span>Já possui conta? <a href="@route('login')">Acesse sua conta</a>.</span>
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