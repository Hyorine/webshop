<div class="ItemUploadForm">
    <form action="Item" method="post" enctype="multipart/form-data">
        <h1>{{ __('messages.PUF') }}</h1>
        @csrf <!-- Add Laravel CSRF token field -->
        <input type="hidden" name="operation" id="operation" value="2">
        <div class="form-group">
                <label>{{ __('messages.HAT') }}</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="regular" name="listing_type" value="0"  required>
                    <label class="form-check-label" for="regular">{{ __('messages.RegPro') }}</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="auction" name="listing_type" value="1" required>
                    <label class="form-check-label" for="auction">{{ __('messages.Auction') }}</label>
                </div>
                <small class="text-danger" id="radioError-listing_type" style="display: none;">Please select an option</small>
            </div>
            <div class="form-group">
                <label for="name">{{ __('messages.ProdName') }}</label>
                <input type="text" class="form-control" id="name" name="name" maxlength="255" required>
            </div>
            <div class="form-group">
                <label for="available_start">{{ __('messages.KezdDate') }}</label>
                <input type="datetime-local" class="form-control" id="available_start" name="available_start" min="<?= date("Y-m-d H:i"); ?>" required>
            </div>

            <div class="form-group">
                <label for="available_end">{{ __('messages.vegDate') }}</label>
                <input type="datetime-local" class="form-control" id="available_end" name="available_end" min="<?= date("Y-m-d H:i"); ?>"  required>
            </div>
            <div class="form-group">
                <label for="price">{{ __('messages.PPrice') }}</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label>{{ __('messages.PPicture') }}</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="uploadImage" name="image_option" value="0" onchange="toggleImageFields()" required>
                    <label class="form-check-label" for="uploadImage">{{ __('messages.PUpload') }}</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="imageUrlOption" name="image_option" value="1" onchange="toggleImageFields()" required>
                    <label class="form-check-label" for="imageUrlOption">{{ __('messages.PURL') }}</label>
                </div>
                <!-- Add a hidden error message for radio buttons -->
                <small class="text-danger" id="radioError-image_option" style="display: none;">Please select an option</small>
            </div>
            <div class="form-group" id="uploadFields" style="display: none;">
                <label for="imageUpload">{{ __('messages.UploadImage') }}</label>
                <input type="file" class="form-control-file" id="imageUpload" name="imageUpload">
            </div>
            
            <div class="form-group" id="urlFields" style="display: none;">
                <label for="imageUrl">{{ __('messages.ImageURL') }}</label>
                <input type="url" class="form-control" id="imageUrl" name="imageUrl">
            </div>
            <div class="form-group">
                <label for="description">{{ __('messages.PDescript') }}</label>
                <textarea class="form-control" id="description" name="description" rows="4" style="resize: none;" required></textarea>
            </div>
            <button type="button" class="btn btn-light" onclick="validateFormAndSubmit()">{{ __('messages.PUpload') }}</button>
    </form>
</div>