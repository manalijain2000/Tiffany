<div class="container-fluid ready">
    <div class="p-2 p-md-5  ms-md-5">
        <div class="row">
        <div class="col-md-6 me-md-5">
            <p class="text-white fs-30px me-5" path = '<?= basename($_SERVER["REQUEST_URI"]) ?>' id = 'test-dynamic-content'></p>
        </div>
        <div class="col-md-5 ">
            <div class="d-flex flex-wrap justify-content-between bg-white mb-3 p-2 input">
                <input type="email" class="formInput border-0 " placeholder="Enter Email or Phone Number" value="">
                <button type="button" class="btn btn-sm btn-theme">Submit</button>
            </div>
            <p class="text-white executive pb-0"> Our Executive will get in touch with you shortly. </p>
        </div>
        </div>
    </div>
</div>


<script>

document.addEventListener('DOMContentLoaded', function() {
    var element = document.getElementById('test-dynamic-content');
    if (element) {
        var path = element.getAttribute('path');
        switch (path) {

            case 'index.php':
                var text = 'Ready to fulfill your dreams ? <br>Just enter your Email or Phone Number'
                break;

            case 'loan-against-property.php':
                var text = 'Get a quick and easy loan from Tiffany Finance ! <br>Just enter your Email or Phone Number'
                break;

            case 'home-construction-loan.php':
                var text = 'Build your dream home with Tiffany Finance ! <br>Just enter your Email or Phone Number'
                break;

            case 'commercial-vehicle-loan.php':
                var text = 'Get speedy loans for your speedy ride with Tiffany Finance ! <br>Just enter your Email or Phone Number'
                break;

            case 'two-vehicle-loan.php':
                var text = 'Hit the road to prosperity with Tiffany Finance ! <br>Just enter your Email or Phone Number'
                break;

            case 'personal-loan.php':
                var text = 'Make your dreams a priority with Tiffany Finance ! <br>Just enter your Email or Phone Number'
                break;

            case 'business-loan.php':
                var text = 'Fuel your business ambitions with Tiffany Finance ! <br>Just enter your Email or Phone Number'
                break;
        
            default:
                var text = '';
                break;
        }
        element.innerHTML = text;
    }
});


</script>