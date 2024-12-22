 <div class="header fixed-top ">
   <div class="container">
      <div class="row">
         <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
            <div class="full">
               <div class="center-desk" style="position: relative; top: -10px;">
                  <a href="{{ url('/') }}">
                     <img src="img/miwoologo3.png" alt="MiWoo Logo" style="width: 100%; max-height: 80px; object-fit: contain;" />
                  </a>
               </div>
            </div>
         </div>         
         <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
            <nav class="navigation navbar navbar-expand-md navbar-dark ">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarsExample04">
                  <ul class="navbar-nav mr-auto">
                     <li class="nav-item active">
                        <a class="nav-link" href="#home">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#room">Our room</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#why">Why</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#gallery">Gallery</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact Us</a>
                     </li>

                     @if (Route::has('login'))
                     @auth
                         <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                             </a>
                             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a>
                                <a class="dropdown-item" href="{{ url('ticket/' . session('booking_id')) }}">My Ticket</a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                   @csrf
                                   <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                             </div>
                          </li>
                     @else
                         <li class="nav-item" style="padding-right:10px">
                             <a class="btn btn-success" href="{{ url('login') }}">Login</a>
                         </li>
                 
                         @if (Route::has('register'))
                             <li class="nav-item">
                                 <a class="btn btn-primary" href="{{ url('register') }}">Register</a>
                             </li>
                         @endif
                     @endauth
                     @endif
                 

                  </ul>
               </div>
            </nav>
         </div>
      </div>
   </div>
</div>