<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LaravelWebmaker</title>
    <!-- css cdn -->
        <link href="{{ asset('css/app.css') }}" 
              rel="stylesheet" 
              type="text/css" >    
    <!-- bootstrap cdnfor css -->
        <link rel="stylesheet" 
              href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
              crossorigin="anonymous">
    <!-- bootstrap cdnfor js -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
                crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" 
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" 
                crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" 
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- nav -->
        <section class="container-fluid">
            <div class="container">
                <div class="row mt-1">
                    <div class="col-md-10">
                        <h3 class="logo">WebMaker</h3>
                    </div>

                    <div class="col-md-2 btns-reg-log">
                        <a href="{{ url('register') }}">
                            <button class="btn btn-success">
                                Register		
                            </button>
                        </a>
                        <a href="{{ url('login') }}">
                            <button class="btn btn-success">
                                Login		
                            </button>
                        </a>
                    </div>				
                </div>
            </div>		
        </section>


    <!-- head -->
        <section class="container-fluid pl-4 pr-4 mt-2 back">
            <!-- <div class="container"> -->
                <div class="row">
                    <div class="col-md-7 welcome-greeting">
                        <h4 class="greeting-text">
                            Welcome to WebMaker, <br> we will help you to increase your knowledge in programming. <br> Our managers will help you to develop yourself as a programmer. <br> Just keep working hard and never give up. <br> What are you waiting for?
                        </h4>
                    </div>	

                    <div class="col-md-5"></div>
                </div>
            <!-- </div>		 -->
        </section>

        <section class="container">
            <div class="row">
               <div class="col-md-12">

                    <div class="row mt-4 mb-4">
                        <div class="col-md-6 classesweb">
        {{-- pic --}}
                            <img src="{{URL::asset('/welcomeLearningPictures/learning.jpg')}}" 
                                 alt="learnWeb"
                                 class="img-fluid"
                            >
                        </div>
        {{-- Links --}}
                        <div class="col-md-6 classesweb">

                            <h4 class="mb-5 mt-4 ">Gain or improve your knowledge here</h4>

                            <h6>Languages for Web programming</h6>
                            <div class="row mt-3">
                                <div class="col-md-12 classesweb">
                                    <a href="{{ url('https://www.w3schools.com/js/default.asp') }}" target="_blank">
                                        <button class="btn btn-success">
                                            Js
                                        </button>
                                    </a>
                                    
                                    <a href="{{ url('https://www.w3schools.com/php/default.asp') }}" target="_blank">
                                        <button class="btn btn-success">
                                            Php	
                                        </button>
                                    </a>

                                    <a href="{{ url('https://www.w3schools.com/sql/default.asp') }}" target="_blank">
                                        <button class="btn btn-success">
                                            Sql	
                                        </button>
                                    </a>

                                    <a href="{{ url('https://laravel.com/docs/9.x') }}" target="_blank">
                                        <button class="btn btn-success">
                                        Laravel	
                                        </button>
                                    </a>
                                </div>
                            </div>

                            <h6 class="mt-5">Languages for Gaming/Ai/Microcontrollers</h6>
                            <div class="row mt-3">
                                <div class="col-md-12 classesweb">
                                    <a href="{{ url('https://www.w3schools.com/java/default.asp') }}" target="_blank">
                                        <button class="btn btn-success">
                                            Java
                                        </button>
                                    </a>

                                    <a href="{{ url('https://www.w3schools.com/python/default.asp') }}" target="_blank">
                                        <button class="btn btn-success">
                                            Python	
                                        </button>
                                    </a>
                                    
                                    <a href="{{ url('https://docs.microsoft.com/en-us/cpp/cpp/?view=msvc-170') }}" target="_blank">
                                        <button class="btn btn-success">
                                            C/C++
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

               </div>
            </div>
        </section>

        <section class="container-fluid">
            <div class="row mt-5">
                <div class="col-md-12">
                    <hr class="lineCopyright">
                    <p class="copyright">© 2022 WebMaker, LLC, a programming teaching company.</p>    
                </div>                
            </div>
        </section>
    </body>
</html>
