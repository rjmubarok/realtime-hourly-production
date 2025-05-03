@extends('master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table id="example" class="table table-striped datatable table-bordered">
                <thead>
                    <tr style="background-color:#4a0218;color:white;font-size:18px;font-weight:bold;">
                        <th scope="col">Floor</th>
                        <th scope="col">Line</th>
                        <th scope="col">Click Name to Call</th>
                        <th scope="col">Call PM</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                        <td>Rose</td>
                        <td>RS1</td>
                        <td>

    <div style="display: flex; gap: 5px; align-items: center;">
    <!-- WhatsApp Button -->
    <a href="https://wa.link/txw6zu" 
       style="display: inline-flex; align-items: center; padding: 2px 4px; background-color: #275701; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">
        <i class="fab fa-whatsapp" style="font-size: 20px; margin-right: 10px;"></i>
        Azaharul_IE
        <img src="{{ asset('dist/img/rs1ie-removebg-preview.png') }}" 
             alt="Photo" 
             style="width: 30px; height: 30px; border-radius: 50%; margin-left: 10px;">
    </a>
    
    <!-- Offline Call Button -->
    <a href="tel:01867514670" 
       style="display: inline-flex; align-items: center; padding: 2px 4px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">
        <i class="fas fa-phone" style="margin-right: 8px;"></i>Offline_Call
    </a>
</div><br>


<div style="display: flex; gap: 5px; align-items: center;">
    <!-- WhatsApp Button -->
    <a href="https://wa.link/mcuqz7" 
       style="display: inline-flex; align-items: center; padding: 2px 4px; background-color: #275701; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">
        <i class="fab fa-whatsapp" style="font-size: 20px; margin-right: 10px;"></i>
        Rajib_LC
    </a>
    
    <!-- Offline Call Button -->
    <a href="tel:01409740060" 
       style="display: inline-flex; align-items: center; padding: 2px 4px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">
        <i class="fas fa-phone" style="margin-right: 8px;"></i>Offline_Call
    </a>
</div><br>

<div style="display: flex; gap: 5px; align-items: center;">
    <!-- WhatsApp Button -->
    <a href="https://wa.link/ag0rid" 
       style="display: inline-flex; align-items: center; padding: 2px 4px; background-color: #275701; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">
        <i class="fab fa-whatsapp" style="font-size: 20px; margin-right: 10px;"></i>
        Sariful_SV
    </a>
    
    <!-- Offline Call Button -->
    <a href="tel:01920510269" 
       style="display: inline-flex; align-items: center; padding: 2px 4px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">
        <i class="fas fa-phone" style="margin-right: 8px;"></i>Offline_Call
    </a>
</div>

                            </h5>
                        </td>

                        <td style="position: relative; text-align: left;">
    <!-- Flex Container to Position Image and Buttons -->
    <div class="flex-container">
        <!-- Image on the Left Side -->
        <img src="{{ asset('dist/img/avatar5.png') }}" alt="Photo" class="avatar">

        <!-- Buttons on the Right Side -->
        <div class="button-group">
            <!-- WhatsApp Call PM Button with Beep Animation -->
            <h5 class="beep button">
                <a href="https://wa.link/dku491" class="call-link">
                    <i class="fab fa-whatsapp" style="margin-right: 8px;"></i>PM(Rakib)
                </a>
            </h5>

            <!-- Call Offline Button Styled Like Call PM but Without Beep -->
            <h5 class="button">
                <a href="tel:01743989740" class="call-link">
                    <i class="fas fa-phone" style="margin-right: 8px;"></i>Offline_Call
                </a>
            </h5>
        </div>
    </div>
</td>

<style>
    /* Flex Container for Layout */
    .flex-container {
        display: flex;               /* Enables flexbox layout */
        align-items: center;         /* Vertically centers content */
        gap: 20px;                   /* Space between image and buttons */
    }

    /* Avatar Image Styling */
    .avatar {
        width: 100px;                /* Set image width */
        height: auto;                /* Maintain aspect ratio */
    }

    /* Common Button Styling */
    .button {
        position: relative;
        color: white;
        background-color: #009e3d;
        padding: 5px 12px;
        border-radius: 8px;
        display: inline-block;
        margin: 5px 0;               /* Space between buttons */
    }

    /* Call Link Styling */
    .call-link {
        color: white !important;          /* Ensures text remains white */
        text-decoration: none !important; /* Removes underline */
        display: flex;                    /* Aligns icon and text */
        align-items: center;
    }

    .call-link:hover, 
    .call-link:focus, 
    .call-link:active {
        text-decoration: none !important; /* Ensures underline is removed on hover, focus, and click */
        outline: none;                    /* Removes outline when focused */
    }

    /* Beep Animation for Call PM Button */
    @keyframes beep {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.5;
        }
    }

    .beep {
        animation: beep 1s infinite;  /* Apply beep animation only to .beep class */
    }
</style>
                    </tr>
                </tbody>
                <tbody>
                    <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                        <td></td>
                        <td>RS2</td>
                        <td>
                            <h5> 
                                <a href="https://wa.link/5ahudg">Call Mr.Y(IE)</a>
                            </h5>
                            <h5>
                                <a href="https://wa.link/30w40h">Call Line Chief (name)</a>
                            </h5>
                            <h5>
                                <a href="https://wa.link/30w40h">Call Supervisor (name)</a>
                            </h5>
                        </td>


         <td style="position: relative; text-align: left;">
    <!-- Flex Container to Position Image and Buttons -->
    <div class="flex-container">
        <!-- Image on the Left Side -->
        <img src="{{ asset('dist/img/avatar5.png') }}" alt="Photo" class="avatar">

        <!-- Buttons on the Right Side -->
        <div class="button-group">
            <!-- WhatsApp Call PM Button with Beep Animation -->
            <h5 class="beep button">
            <a href="https://wa.link/dku491" class="call-link">
                    <i class="fab fa-whatsapp" style="margin-right: 8px;"></i>PM(Rakib)
                </a>
            </h5>

            <!-- Call Offline Button Styled Like Call PM but Without Beep -->
            <h5 class="button">
                <a href="tel:01743989740" class="call-link">
                    <i class="fas fa-phone" style="margin-right: 8px;"></i>Offline_Call
                </a>
            </h5>
        </div>
    </div>
</td>

<style>
    /* Flex Container for Layout */
    .flex-container {
        display: flex;               /* Enables flexbox layout */
        align-items: center;         /* Vertically centers content */
        gap: 20px;                   /* Space between image and buttons */
    }

    /* Avatar Image Styling */
    .avatar {
        width: 100px;                /* Set image width */
        height: auto;                /* Maintain aspect ratio */
    }

    /* Common Button Styling */
    .button {
        position: relative;
        color: white;
        background-color: #009e3d;
        padding: 5px 12px;
        border-radius: 8px;
        display: inline-block;
        margin: 5px 0;               /* Space between buttons */
    }

    /* Call Link Styling */
    .call-link {
        color: white !important;          /* Ensures text remains white */
        text-decoration: none !important; /* Removes underline */
        display: flex;                    /* Aligns icon and text */
        align-items: center;
    }

    .call-link:hover, 
    .call-link:focus, 
    .call-link:active {
        text-decoration: none !important; /* Ensures underline is removed on hover, focus, and click */
        outline: none;                    /* Removes outline when focused */
    }

    /* Beep Animation for Call PM Button */
    @keyframes beep {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.5;
        }
    }

    .beep {
        animation: beep 1s infinite;  /* Apply beep animation only to .beep class */
    }
</style>

</td>
                        
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
