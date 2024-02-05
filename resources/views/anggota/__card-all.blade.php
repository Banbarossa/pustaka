<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<style>
		body {
			background-color: transparent;
			font-family:'verdana';
		}
		.id-card-holder {
			width: 225px;
			/* height: 425px; */
			/* padding: 4px; */
			margin: 0 auto;
			/* background-color: #1f1f1f; */
			/* border: 2px solid gray; */
			border-radius: 5px;
			/* position: relative; */
			display: inline-block;
			/* margin-right: 10px;
			margin-bottom: 10px; */
			/* background-color: burlywood; */
			float: left;
		}
		.id-card {
			
			background-color: #fff;
			border: 2px solid gray;
			padding: 10px;
			border-radius: 10px;
			text-align: center;
			box-shadow: 0 0 1.5px 0px #b9b9b9;
		}
		.id-card img {
			margin: 0 auto;
		}
		.header img {
			width: 100px;
			margin-top: 15px;
		}
		.photo img {
			width: 80px;
			margin-top: 15px;
		}
		h2 {
			font-size: 15px;
			margin: 5px 0;
		}
		h3 {
			font-size: 12px;
			margin: 2.5px 0;
			font-weight: 300;
		}

		.qr-code{
			text-align: center
		}
		.qr-code div {
			margin: 0 auto;
		}


		p {
			font-size: 5px;
			margin: 2px;
		}

		.id-card-tag {
			width: 0;
			height: 0;
			border-left: 100px solid transparent;
			border-right: 100px solid transparent;
			border-top: 100px solid #d9300f;
			margin: -10px auto -30px auto;

		}
		.id-card-tag:after {
			content: '';
			display: block;
			width: 0;
			height: 0;
			border-left: 50px solid transparent;
			border-right: 50px solid transparent;
			border-top: 100px solid white;
			margin: -10px auto -30px auto;
			position: relative;
			top: -130px;
			left: -50px;
		}
		.d-flex{
			display: flex;
			justify-content: center;
		}

		.text-2xl{
			font-size: 12px;
		}

		.mb-5{
			margin-bottom: 20px;
		}
		.btn-ouline{
			border: 1px solid gray;
			padding: 3px 16px;
			display: inline-block;
			margin: 20px 0px;
			border-radius: 30%
		}
		.pemisah{
			height: 2px;
			background-color: grey;
			margin: 10px 0;
		}
		.page-break {
			page-break-after: always;
		}
		
	</style>
    <title>card</title>
</head>
<body>

	@foreach ($data as $model)
	<div class="id-card-holder">
		<div class="id-card">
			<div class="header mb-5">
				<img src="{{asset('assets/images/logo atas.png')}}">
			</div>
			<div class="photo">
				<div class="qr-code">
					<div>{!! DNS2D::getBarcodeHTML("$model->nisn", 'QRCODE',2,2,'maroon', true) !!}</div>
				</div>
			</div>
			<h2 class="btn-ouline">{{strtoupper($model->name)}}</h2>

			<div class="d-flex">
				<div class="qr-code">
					<div class="">{!! DNS1D::getBarcodeHTML("$model->nisn", 'C128',1,33,'black') !!}</h3>
					<p class='text-2xl'>{{$model->nisn}}</p>
				</div>
			</div>
			<hr>
			<p><strong>Pesantren Imam Syafi'i</strong> Lr. Masjid Tuha Gampong Reuhat Tuha<p>
			<p>Kec. Sukamakmur Kab. Aceh Besar <strong>23361</strong></p>
			<p>www.pis.sch.id</p>

		</div>
	</div>
	<div class="pemisah page-break"></div>
	@endforeach

	

    
</body>
</html>




