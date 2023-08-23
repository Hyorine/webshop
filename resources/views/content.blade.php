@if(isset($modul))
	@switch($modul)
		@case('registration')
			@include('registrationForm')
		@break
		@case('Item')
			@include('ItemView')
		@break
		@case('error')
			@include('error')
		@break
        @default
        @break
	@endswitch
@else
	
@endif