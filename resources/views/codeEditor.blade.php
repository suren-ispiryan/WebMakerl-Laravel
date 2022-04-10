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
                <div class="row mt-5">
    <!-- code -->
                    <div class="col-md-8 editor-containers">
                            <div class="row">		
                                <div class="col-md-12 editorHeading">
                                    <h4>WebMaker editor</h4>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md-12 runCodeBtn">						
                                    <select id="languages" class="languages mr-2" onchange="changeLanguage()">
                                        <option value="c">C</option>
                                        <option value="cpp">C++</option>
                                        <option value="php">PHP</option>
                                        <option value="python">PYTHON</option>
                                        <option value="node">NODE JS</option>
                                    </select>
    
                                    {{-- <button type="button" 
                                            id="clear" 
                                            class="btn btn-success mr-1" 
                                            onclick="clean()">Clean
                                    </button>
                                    
                                    <button type="button" 
                                            id="refresh" 
                                            class="btn btn-primary mr-1" 
                                            onclick="refresh()">Refresh
                                    </button> --}}
    
                                    <button type="button" 
                                            id="run" 
                                            class="btn btn-danger"
                                            onclick="run()">Run
                                    </button>
                                </div>
                            </div>
    
                            <hr>
                            
                            <div class="row p-4">
                                <div id="codeBox" class="code-box col-md-12"></div>
                            </div>
                        
                    </div>
    <!-- answer -->
                    <div class="col-md-4 editor-containers">
                        <div class="row">						
                            <div class="col-md-12 answerHead">							
                                <h4>Answer</h4>
                            </div>
                        </div>
    
                        <hr>
    
                        <div class="row">						
                            <div class="col-md-12">							
                                <p>Answer is: 
                                    <div id="result"></div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
    
    
        <script type="text/javascript" src="{{ URL::asset("ace-builds-master/src/ace.js") }}"></script>
        <script type="text/javascript" src="{{ URL::asset('ace-builds-master/src/theme-monokai.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

        <!-- code editor start -->
        <script type="text/javascript">
            let editor;
    
            window.onload = function() {
                editor = ace.edit("codeBox");
                editor.setTheme("ace/theme/monokai");
                editor.session.setMode("ace/mode/c_cpp");
            }
    
            function changeLanguage(){
                let language = $("#languages").val();
    
                if (language == 'c' || language == 'cpp') {
                    editor.session.setMode("ace/mode/c_cpp");		
                }else if(language == 'php'){
                    editor.session.setMode("ace/mode/php");
                }else if (language == 'node') {
                    editor.session.setMode("ace/mode/javascript");
                }else if (language == 'python') {
                    editor.session.setMode("ace/mode/python");
                }
            }
    
            function run() {
                axios.post("/codeEdit",{language: $("#languages").val(),code: editor.getSession().getValue()})
                     .then(response => {$("#result").text(response.data);})
                     .catch(error => {console.log("error, smth went wrong!!!");});
            }
    
        </script>
    <!-- code editor end -->
    </body>
</html>
