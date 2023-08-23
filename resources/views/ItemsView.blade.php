@foreach($Products as $Product)
    <div class="">
        <div class="ProductRightDiv"><img src="{{$Product->p_imageUrl}}" class="ProductIMG"></div>
        <div class="ProductLefttDiv">
            <h1>termék neve: {{$Product->p_name}}</h1>
            <p>Termék ára: {{$Product->p_price}}</p>
            <div>Leírás:{{$Product->p_description}}</div>
            <button type="button" class="btn btn-light">{{ __('messages.PUpload') }}</button>
        </div>
    </div>
@endforeach