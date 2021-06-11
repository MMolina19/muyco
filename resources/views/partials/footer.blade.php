<footer>
	<div class="container">
		<div class="row  text-center">
			<div class="col-lg-4 block">
				<p>&copy; {{$onWebSince}}-{{$currentYear}} <span class="brand">MuebleYConfort</span>  <a class="link" href="{{url('/sitemap')}}">Sitemap</a></p>
				<p>Design by <a class="link" target="_blank" href="https://www.facebook.com/molina.maximiliano"
					title="Web developer"><i class="fa fa-facebook-official"></i> Maximiliano Molina</a>
				</p>
			</div>
			<div class="col-lg-4 block">
				<p> Tel: <span class="cursiva">011-4628-6975</span> </p>
				<p> Cel: <span class="cursiva">011-5885-6890</span> </p>
			</div>
			<div class="col-lg-4 block">
				<p><a href="contacto/">{{ __('navigation.contact') }}</a></p>
				<p><a href="https://molinarozas.mercadoshops.com.ar" target="_blank">{{ __('navigation.market-shops') }}</a></p>
				<p><a href="somos/">{{ __('navigation.about') }}</a></p>
		    </div>
		    <div class="col-lg-12 block">
		    	<p><a href="http://www.facebook.com/muebleyconfort" class="facebookLink" target="_blank">
		    	<i class="fa fa-facebook" aria-hidden="true"></i>
				{{__('messages.follow_us_fb')}}</a></p>
				<p><a href="http://www.instagram.com/muebleyconfort" class="instagramLink" target="_blank">
				<i class="fa fa-instagram" aria-hidden="true"></i>
				{{__('messages.follow_us_ins')}}</a></p>
		    	<p>{{ __('messages.muyco_from') }}</p>
		    </div>
		</div>
	</div>
</footer>
