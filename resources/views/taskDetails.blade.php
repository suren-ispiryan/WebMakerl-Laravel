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

			<div class="row m-5">
				<div class="col-md-12">
					<h3>
						Task id  {{ $choosenTask->id }}
					</h3>
				</div>
			</div>


<!-- tasklist -->
			<div class="row	">
				<div class="col-md-3 detail-names">
					<h5>Task name</h5>
				</div>

				<div class="col-md-9 detail-descriptions">
					<h5>
                        {{ $choosenTask->name }}
					 </h5>
				</div>
			</div>
			<hr>

			<div class="row">
				<div class="col-md-3 detail-names">
					<h5>Task description</h5>
				</div>

				<div class="col-md-9 detail-descriptions">
					<h5>
                        {{ $choosenTask->description }}
					</h5>
				</div>
			</div>
			<hr>

			<div class="row">
				<div class="col-md-3 detail-names">
					<h5>Task created by</h5>
				</div>

				<div class="col-md-9 detail-descriptions">
					<h5>
						{{ $choosenTask->createdBy }}
					</h5>
				</div>
			</div>
			<hr>

			<div class="row">
				<div class="col-md-10"></div>

				<div class="col-md-2 detail-descriptions">
                    <a href= {{ url("/codeEditor") }} target="_blank">
						<button class="btn btn-warning m-1 update">editor</button>
					</a>

					<a href= {{ url("/userUpdateTask/".$choosenTask->id) }}>
						<button class="btn btn-primary"> answer </button>
					</a>
				</div>
			</div>
		</div>		
	</section>
    </body>
</html>
