<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        @vite('resources/css/vendor_main.css')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>@yield('title')</title>
        
    </head>
    <body class="bg-secondary font-fontPoppins">

    <?php
        $vendor_info = App\Models\Vendor::findOrFail($vendor_id);
    ?>
        
    <div class="sidebar">
        <div class="logo-details">
            @if($vendor_info->logo)
            <img src="{{ asset('images/vendor/' . $vendor_info->logo) }}" id="btn-logo" class="ms-1" alt="Tour Image" style="width: 40px;height: 40px;">
            @else
                <img src="{{ asset('images/default-logo.png') }}" alt="Default Image"  style="width: 40px;height: 40px;">
            @endif           
        <div class="logo_name px-3">{{$vendor_info->name}}</div>
        </div>
        <div>
     
        <li>
            <a href="{{ route('vendor.tours.index', ['vendor' => $vendor_id]) }}">
            <i class='bx bx-grid-alt'></i>
            <span class="links_name">Tour</span>
            </a>
            <span class="tooltip">Tour</span>
        </li>
      
    
        
       <li>
       <a href="{{ route('vendor.booking.index', ['vendor' => $vendor_id]) }}">
            <i class="bi bi-bag"></i>               
             <span class="links_name">Booking </span>
            </a>
            <span class="tooltip">Booking</span>
        </li>

        <li>
            <a href="{{ route('vendor.activity.index', ['vendor' => $vendor_id]) }}">
            <i class="bi bi-card-checklist"></i>           
            <span class="links_name">Activity </span>
            </a>
            <span class="tooltip">Activity</span>
        </li>
        
      
        <li class="profile">
            <div class="profile-details">
            <img src="profile.jpg" alt="profileImg">
            <div class="name_job">
                <div class="job">GetYourGuide</div>
            </div>
            </div>
            <i class='bx bx-log-out' id="log_out" ></i>
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
        let closeBtn = document.querySelector("#btn-logo");
        let searchBtn = document.querySelector(".bx-search");
        closeBtn.addEventListener("click", ()=>{
            sidebar.classList.toggle("open");
        });
        searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
            sidebar.classList.toggle("open");
        });
      
  </script> 
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <script type="text/javascript">

    //   $("#booking_tour_id").select2({
    //         placeholder: "Select a Name",
    //         allowClear: true
    //     });
</script>


  </body>
</html>


