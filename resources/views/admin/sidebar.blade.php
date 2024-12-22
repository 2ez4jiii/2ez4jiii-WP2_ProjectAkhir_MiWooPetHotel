<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="img/newjeans-haerin.gif" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
          <h1 class="h5">Atmint</h1>
          <p>MiWoo Pet Hotel</p>
        </div>
      </div>
      <!-- Sidebar Navidation Menus-->
      <span class="heading">Main</span>
      <ul class="list-unstyled">
        <li class="active"><a href="{{ url('/home') }}"> <i class="icon-home"></i>Home</a></li>
          
        <li>
          <a href="{{ url('create_room') }}"> <i class="icon-home"></i>Add Rooms</a>
        </li>

        <li>
          <a href="{{ url('view_room') }}"> <i class="icon-home"></i>View Rooms</a>
        </li>

        <li>
          <a href="{{ url('bookings') }}"> <i class="icon-home"></i>Bookings</a>
        </li>

        <li>
          <a href="{{ url('all_messages') }}"> <i class="icon-home"></i>Message</a>
        </li>
          
      </ul>
    </nav>