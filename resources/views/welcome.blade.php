<html>
	<head>
		<title>Proyecto Río Torres</title>
		
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B7A6A6;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 96px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 24px;
			}
			.title a{
				text-decoration: none;	
				color: #B7A6A6;		
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="title col-lg-12"><a href="/home">Proyecto Río Torres</a></div>
				<div class="quote">{{ Inspiring::quote() }}</div>
			</div>
		</div>
	</body>
</html>
