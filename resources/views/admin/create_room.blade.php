<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

<style type="text/css">

    label
    {
        display: inline-block;
        width: 200px;
    }

    .div_deg
    {
        padding-top: 30px;
    }

    .div_center
    {
        text-align:center;
        padding-top: 40px;
    }

</style>

  </head>
  <body>
    @include('admin.header')

      @include('admin.sidebar')
      
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">

                    <div class="div_center">

                        <h1 style="font-size:30px; font-weight:bold;">Add Rooms</h1>
                        <form action="{{ url('add_room') }}" method="Post" enctype="multipart/form-data">

                            @csrf

                            <div class="div_deg">
                                <label>Room Tittle</label>
                                <input type="text" name="tittle" id="">
                            </div>

                            <div class="div_deg">
                                <label>Room Description</label>
                                
                                <textarea name="description" id=""></textarea>

                            </div>

                            <div class="div_deg">
                                <label>Price</label>
                                <input type="number" name="price" id="">
                            </div>

                            <div class="div_deg">
                                <label>Room Type</label>
                                <select name="type" id="">
                                    <option value="cat">Cat</option>
                                    <option value="dog">Dog</option>
                                </select>
                            </div>

                            <div class="div_deg">
                                <label>Free Feeding</label>
                                <select name="wifi" id="">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>

                            <div class="div_deg">
                                <label">Upload Image</label>
                                <input type="file" name="image">
                            </div>

                            <div class="div_deg">
                                <input class="btn btn-primary" type="submit" value="Add Room">
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>      
        @include('admin.footer')

  </body>
</html>