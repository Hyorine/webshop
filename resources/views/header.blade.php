<header class="PageHeader" style="">
    <div class="HeaderMainDiv" style="">
        <div>
            <img id="logoTag" src="{{ asset('Pictures/logo.jpg') }}" alt="Logo">
        </div>
       
        <div>
            @if (Auth::check())
                @include('loginMenu')
            @else
                @include('UnLoginMenu')
            @endif
        </div>
    </div>
</header>
