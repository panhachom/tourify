<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tourify</title>
        <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">
        @vite('resources/css/vendor_main.css')
        

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>@yield('title')</title>
        

        <!-- Select -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

        <!-- Multiple Select -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.2/css/bootstrap.min.css" integrity="sha512-CpIKUSyh9QX2+zSdfGP+eWLx23C8Dj9/XmHjZY2uDtfkdLGo0uY12jgcnkX9vXOgYajEKb/jiw67EYm+kBf+6g==" crossorigin="anonymous" referrerpolicy="no-referrer">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body class="bg-secondary font-fontPoppins">
        
    <div class="sidebar">
        <div class="logo-details">
        <img src="{{ asset('images/logo.png') }}" alt="" width="45px" class="rounded-circle "></i>
            <div class="logo_name" style="margin-left: 5%;">Admin</div>
            <i class='bx bx-menu' id="btn" ></i>
        </div>
        <div class="nav-list">
   
        <li>
            <a href="/view_all_post">
            <i class='bx bx-grid-alt'></i>
            <span class="links_name">Tour</span>
            </a>
            <span class="tooltip">Tour</span>
        </li>
        <li>
        <a href="{{ route('admins.view_user') }}">
            <i class='bx bx-user' ></i>
            <span class="links_name">User</span>
        </a>
        <span class="tooltip">User</span>
        </li>
        <li>
        <a href="/view_vendor">
            <i class='bx bx-store-alt' ></i>
            <span class="links_name">Vendor</span>
        </a>
        <span class="tooltip">Vendor</span>
        </li>
     
        <li>
  
        <li>
        <a href="{{ route('promotion.index')}}">
        <i class="bi bi-gift"></i>
            <span class="links_name">Promotion</span>
        </a>
        <span class="tooltip">Promotion</span>
        </li>
        
       <li>
        <a href="{{ route('booking.index')}}">
            <i class='bx bx-heart' ></i>
            <span class="links_name">Booking </span>
        </a>
        <span class="tooltip">Booking</span>
        </li>
        
      
        <li class="profile">
            <div class="profile-details">
            <img src="profile.jpg" alt="profileImg">
            <div class="name_job">
                <div class="name">Admin Panel</div>
                <div class="job">Touify</div>
            </div>
            </div>
            <a href="{{ route('logout.perform') }}" class="btn btn-outline-dark  me-2">
                 <i class='bx bx-log-out' id="log_out" ></i>
            </a>

        </li>
    </div>
    </div>
    <section class="home-section">
        <div class="w-100 px-5 py-4">
         @yield('content')
        </div>
    </section>
  <script>
        let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");
        let searchBtn = document.querySelector(".bx-search");
        closeBtn.addEventListener("click", ()=>{
            sidebar.classList.toggle("open");
            menuBtnChange();//calling the function(optional)
        });
        searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
            sidebar.classList.toggle("open");
            menuBtnChange(); //calling the function(optional)
        });
        // following are the code to change sidebar button(optional)
        function menuBtnChange() {
        if(sidebar.classList.contains("open")){
            closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
        }else {
            closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
        }
        }
  </script> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>

<script>
    $(document).ready(function() {
        $('.booking_tour_id').select2({
            placeholder: 'Select',
            allowClear: true,
            dropdownParent: $('.col-md-6.offset-md-3.form-group')
        });

        $("#booking_tour_id").select2({
            ajax: {
                url: "{{ route('get-tour')}}",
                type: "post",
                delay: 250,
                dataType: 'json',
                data: function(params) {
                    var selectedVendor = $("#vendor_id").val(); // Get the selected vendor
                    if (!selectedVendor) {
                        return null; // Return null if no vendor is selected
                    }
                    return {
                        name: params.term,
                        vendorId: selectedVendor, // Pass the selected vendor ID to the server
                        "_token": "{{ csrf_token() }}"
                    };
                },
                processResults: function(data) {
                    // Exclude the null tour option
                    var results = $.map(data, function(item) {
                        return {
                            id: item.id,
                            text: item.name,
                        };
                    });

                    return {
                        results: results.filter(function(result) {
                            return result.id !== ""; // Exclude the null tour option
                        })
                    };
                }
            }
        });

        // Clear selected tours when the vendor changes
        $("#vendor_id").on('change', function() {
            $("#booking_tour_id").val([]).trigger('change'); // Clear the selected tours
        });
    });
</script>





  </body>
</html>
