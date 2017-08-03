<head>
<link rel='stylesheet' href='../css/global.css'>
<link rel='stylesheet' href='../css/shop.css'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/global.js"></script>
<title>vidbids</title>
</head>
<body>
	<div class='grad'>
		<div class='header'>
			<img src='../images/topbar.svg'>
			<div class='info'>
				<div class='left-info'>
					<p id='coins'>95 Bidcoins</p>
					<p id='buy-coins'>BUY MORE</p>
				</div>
				<div class='right-info'>
					<p id='name'>BRANDINO420</p>
					<p id='logout'>LOGOUT</p>
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='col-2'>
				<input type='text' placeholder='search'>
				<div class='button-container'>
					<div class='button' id="home"><p>HOME</p></div>
					<div class='clicker'><p>clicker</p></div>
				</div>
				<div class='button-container'>
					<div class='button' id="ps4"><p>PS4</p></div>
					<div class='clicker'><p>clicker</p></div>
				</div>
				<div class='button-container'>
					<div class='button' id="xbox"><p>XBOX ONE</p></div>
					<div class='clicker'><p>clicker</p></div>
				</div>
				<div class='button-container'>
					<div class='button' id="nintendo"><p>NINTENDO</p></div>
					<div class='clicker'><p>clic</p></div>
				</div>
				<div class='button-container'>
					<div class='button' id="pc"><p>PC</p></div>
					<div class='clicker'><p>clicker</p></div>
				</div>
				<div class='button-container clicked'>
					<div class='button' id="shop"><p>SHOP</p></div>
					<div class='clicker'><p>clicker</p></div>
				</div>
				<div class='button-container'>
					<div class='button' id="history"><p>HISTORY</p></div>
					<div class='clicker'><p>clicker</p></div>
				</div>
				<div class='button-container'>
					<div class='button' id="help"><p>HELP</p></div>
					<div class='clicker'><p>clicker</p></div>
				</div>
			</div>
			
			<div class='col-8' id="contain">
				<img src='../images/shop-topbar.svg'>
				<div class='buy-container'>
					<img src='../images/bidcoin.svg'>
					<p class='amount'>1365 Bidcoins</p>
					<p class='cost'>$4.99</p>
					<button class='buy-button'><p>BUY BIDS</p></button>
				</div>
				<div class='buy-container'>
					<img src='../images/bidcoin.svg'>
					<p class='amount'>4060 Bidcoins</p>
					<p class='cost'>$15.99</p>
					<button class='buy-button'><p>BUY BIDS</p></button>
				</div>
				<div class='buy-container'>
					<img src='../images/bidcoin.svg'>
					<p class='amount'>7180 Bidcoins</p>
					<p class='cost'>$25.99</p>
					<button class='buy-button'><p>BUY BIDS</p></button>
				</div>
				<div class='discount'>
				</div>
				<div class='discount'>
				</div>
				<div class='discount'>
					<p>10% DISCOUNT</p>
				</div>
				<div class='c_b'></div>
				<div class='desc'><p class='orange'>Auctions each have their own "Bid Price": the number of Bidcoins needed to bid. </p><p>Please check the details of each auction for further information on the amount required. Bidcoins are not refundable or transferable.</p></div>
			</div>
			<div id="notifications">
				<div id="noti_container">
					<div class="notify lose">
						<h1>OUTBID</h1>
						<p id="product">Horizon Zero Dawn</p>
						<p id="time">5 Seconds left!</p>
					</div>

					<div class="notify win">
						<h1>WINNER</h1>
						<p id="product">Battle Toads</p>
						<p id="time">CONGRATULATIONS</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>