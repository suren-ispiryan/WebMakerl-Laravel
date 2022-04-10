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
        <section class="container-fluid">
            <div class="container">
    
                <div class="row mt-3">

                    <div class="col-md-4 greeting-manaer">			
                        <h4 class="taskHeading">Welcome back {{ Auth::user()->name }}</h4>
                    </div>

                    <div class="col-md-6">			
                        
                    </div>

                    <div class="col-md-2 out-btn-prog">			
                        <form action="/logout" method="GET">
                            <button class="btn btn-danger">log out</button>
                        </form>
                    </div>
                </div>
    
                
                <div class="row mt-5">
                    <div class="col-md-4"></div>
                    
                    <div class="col-md-4">
                        <h2 class="taskHeading">Task list</h2>
                    </div>

                    <div class="col-md-4 create-btn">
                        <form action="managerCreate" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-primary">Create task</button>
                        </form>
                    </div>
                </div>
    
    <!-- Tasks heading -->
                <div class="row mt-2">
                    <div class="col-md-1 columns">
                        <h4>Name</h4>
                    </div>
    
                    <div class="col-md-4 columns">
                         <h4>Description</h4>
                    </div>
    
                    <div class="col-md-3 columns">
                        <h4>Assigned to</h4>
                    </div>
    
                    <div class="col-md-2 columns">
                        <h4>Status</h4>
                    </div>
    
                    <div class="col-md-2 columns">
                        <h4>Modefy</h4>
                    </div>
                </div>
    
    <!-- Tasks list -->
                @isset($taskList)
                    @foreach ($taskList as $task)    
                        <div class="row mt-2">
                            <div class="col-md-1 columns name">
                                {{ $task->name }}
                            </div>
        
                            <div class="col-md-4 columns description">
                                {{ $task->description }}
                            </div>
                                    
                            <div class="col-md-3 columns assignedTo">
                                {{ $task->assignedTo }}
                            </div> 	
        
                            <div class="col-md-2 columns">
                                {{ $task->status }}
                            </div>
        
                            <div class="col-md-2 columns">
                                    <div class="row">
                                        <div class="col-md-12 btns">
                                            <a href= {{ url("adminUpdate/".$task->id) }}>
                                                <button class="btn btn-warning m-1 update">Change</button>
                                            </a>
                                            <a href= {{ url("adminDelete/".$task->id) }}>
                                                <button class="btn btn-danger m-1 delete">Delete</button>
                                            </a>
                                        </div>
                                    </div>
                            </div>
                        </div> 
                    @endforeach         
                @endisset
            </div>		
        </section>
    </body>
</html>
