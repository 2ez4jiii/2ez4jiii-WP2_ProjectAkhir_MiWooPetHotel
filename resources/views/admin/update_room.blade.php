<!DOCTYPE html>
<html>
  <head> 
<base href="/public">
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

                        <h1 style="font-size:30px; font-weight:bold;">Update Room</h1>
                        <form action="{{ url('edit_room',$data->id) }}" method="Post" enctype="multipart/form-data">

                            @csrf

                            <div class="div_deg">
                                <label>Room Tittle</label>
                                <input type="text" name="tittle" value="{{ $data->room_tittle }}">
                            </div>

                            <div class="div_deg">
                                <label>Room Description</label>
                                
                                <textarea name="description" id="">
                                    {{ $data->description }}
                                </textarea>

                            </div>

                            <div class="div_deg">
                                <label>Price</label>
                                <input type="number" name="price" value="{{ $data->price }}">
                            </div>

                            <div class="div_deg">
                                <label>Room Type</label>
                                <select name="type" id="">

                                    <option value="{{ $data->room_type }}">{{ $data->room_type }}</option>
                                    
                                    <option value="cat">Cat</option>
                                    <option value="dog">Dog</option>
                                </select>
                            </div>

                            <div class="div_deg">
                                <label>Free Feeding</label>
                                <select name="wifi" id="">

                                    <option value="{{ $data->wifi }}">{{ $data->wifi }}</option>

                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>

                            <div class="div_deg">
                                <label">Current Image</label>
                                <img style="margin:auto;" width="100" src="/room/{{ $data->image }}" alt="">
                            </div>

                            <div class="div_deg">
                                <label">Upload Image</label>
                                <input type="file" name="image">
                            </div>

                            <div class="div_deg">
                                <input class="btn btn-primary" type="submit" value="Update Room">
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>      
        @include('admin.footer')

  </body>
</html>