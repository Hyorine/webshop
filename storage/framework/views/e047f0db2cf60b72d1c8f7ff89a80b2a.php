<div class="ItemOperationParentDiv">
    <div class="ItemOperationList">
        <ul class="ItemOperationListUL">
        <li onclick="ProductOperation(3)"><?php echo e(__('messages.OTR')); ?></li>
        <li onclick="ProductOperation(1)"><?php echo e(__('messages.THA')); ?></li>
        <li><?php echo e(__('messages.Statisztika')); ?></li>
        <li><?php echo e(__('messages.Export')); ?></li>
        </ul>
    </div>
    <div id="ItemOperations" class="Items-Right-Side">
        <?php echo $__env->make('ItemOperation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<script>
function ProductOperation(op){
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var mydata = new FormData();
    mydata.append("operation",op);
    $.ajax( {
        url: '/Item',
        type: 'POST',
        data: mydata,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        async: false,
        cache: false,
        processData: false,
        contentType: false,
        success: function(response){myResult = response;}
    } );
    document.getElementById("ItemOperations").innerHTML = myResult;
}
function toggleImageFields() {
        const uploadFields = document.getElementById('uploadFields');
        const urlFields = document.getElementById('urlFields');
        
        if (document.getElementById('uploadImage').checked) {
            uploadFields.style.display = 'block';
            urlFields.style.display = 'none';
            document.getElementById('imageUpload').setAttribute('required', 'required');
            document.getElementById('imageUrl').removeAttribute('required');
        } else if (document.getElementById('imageUrlOption').checked) {
            uploadFields.style.display = 'none';
            urlFields.style.display = 'block';
            document.getElementById('imageUpload').removeAttribute('required');
            document.getElementById('imageUrl').setAttribute('required', 'required');
        }
    }

    function validateFormAndSubmit() {
        let isValid = true;
        const radioGroups = document.querySelectorAll('.form-check-input:required');
        //console.log(radioGroups);
        radioGroups.forEach(radioGroup => {
            const groupName = radioGroup.name;
            const groupOptions = document.querySelectorAll(`input[name="${groupName}"]:required`);
            let isGroupValid = false;
            groupOptions.forEach(option => {
                if (option.checked) {
                    isGroupValid = true;
                    document.getElementById(`radioError-${groupName}`).style.display = 'none';
                }
            });
            if (!isGroupValid) {
                isValid = false;
                document.getElementById(`radioError-${groupName}`).style.display = 'block';
            }
        });

        const visibleFields = document.querySelectorAll('.form-control:required');
        visibleFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.classList.add('is-invalid');
            } else {
                field.classList.remove('is-invalid');
            }
        });
        if (isValid) {
            document.querySelector('form').submit(); // Submit the form if valid
        }
    }
</script><?php /**PATH /home/vagrant/code/AH/resources/views/ItemView.blade.php ENDPATH**/ ?>