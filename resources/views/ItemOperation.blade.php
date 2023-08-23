@if(isset($ItemOp))
	@switch($ItemOp)
		@case('add')
			@include('ItemAddForm')
		@break
		@case('viewAll')
			@include('ItemsView')
		@break
        @default
        
        @break
	@endswitch
@else
	
@endif