<div class="container-fluid ready">
    <div class="p-2 p-md-5 ms-md-5">
        <div class="row">
            <div class="col-md-6 me-md-5">
                <p class="text-white fs-4 me-5" path="<?= basename($_SERVER["REQUEST_URI"]) ?>" id="test-dynamic-content">
                    <span class="text-yellow-enquiry" id="dynamic-text"></span>
                    <span class="text-white"> Just enter your Email or Phone Number</span>
                </p>
            </div>
            <div class="col-md-5">
                <div class="d-flex flex-wrap justify-content-between bg-white mb-3 p-2 input">
                    <input type="email" class="formInput " placeholder="Enter Email or Phone Number" value="">
                    <button type="button" class="btn btn-sm btn-theme">Submit</button>
                </div>
                <p class="text-white executive pb-0">Our Executive will get in touch with you shortly.</p>
            </div>
        </div>
    </div>
</div>



<script>
document.addEventListener('DOMContentLoaded', function() {
    var element = document.getElementById('test-dynamic-content');
    if (element) {
        var dynamicTextElement = document.getElementById('dynamic-text');
        var path = element.getAttribute('path');
        var dynamicText = '';
        switch (path) {
            case 'index.php':
                dynamicText = 'Ready to fulfill your dreams? <br>';
                break;
            case 'loan-against-property.php':
                dynamicText = 'Get a quick and easy loan from Tiffany Finance! <br>';
                break;
            case 'home-construction-loan.php':
                dynamicText = 'Build your dream home with Tiffany Finance! <br>';
                break;
            case 'commercial-vehicle-loan.php':
                dynamicText = 'Hit the road to prosperity with Tiffany Finance! <br>';
                break;
            case 'two-vehicle-loan.php':
                dynamicText = 'Accelerate Your Dreams with Tiffany Finance! <br>';
                break;
            case 'personal-loan.php':
                dynamicText = 'Make your dreams a priority with Tiffany Finance! <br>';
                break;
            case 'business-loan.php':
                dynamicText = 'Transform Your Business with Tiffany Finance! <br>';
                break;
            default:
                dynamicText = '';
                break;
        }
        dynamicTextElement.innerHTML = dynamicText;
    }
});


</script>