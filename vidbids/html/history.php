<head>
<link rel='stylesheet' href='../css/global.css'>
<link rel='stylesheet' href='../css/auction-page.css'>
<link rel='stylesheet' href='../css/history.css'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/history.js"></script>
	<script type="text/javascript" src="../js/global.js"></script>
<title>vidbids</title>
</head>
<body>
	<div class='grad'>
		<div class='header'>
			<img src='../images/topbar.svg'>
			<div class='info'>
				<div class='left-info'>
					<p id='coins'>95 bidcoins</p>
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
				<div class='button-container'>
					<div class='button' id="shop"><p>SHOP</p></div>
					<div class='clicker'><p>clicker</p></div>
				</div>
				<div class='button-container clicked'>
					<div class='button' id="history"><p>HISTORY</p></div>
					<div class='clicker'><p>clicker</p></div>
				</div>
				<div class='button-container'>
					<div class='button'><p>HELP</p></div>
					<div class='clicker'><p>clicker</p></div>
				</div>
			</div>
			
			<div class='col-8' id="contain">
				<img class='history-title' src='../images/auction-topbar.svg'>
				<h1 class='title-1'>AUCTIONS WON:</h1>
				<div id='auctions-won'>
					<div class='col-4 auction-container complete-auction'>
						<div class='title-container'>
							<p>Nintendo Switch</p>
						</div>
						<div class='info-container'>
							<p id='current_price'>103.29</p>
							<p class='cur-bid'>Final Bid</p>
							<p class='pay-now'>Pay Now</p>
						</div>
					</div>
					<div class='col-4 auction-container complete-auction'>
						<div class='title-container'>
							<p>Nintendo Switch</p>
						</div>
						<div class='info-container'>
							<p id='current_price'>103.29</p>
							<p class='cur-bid'>Final Bid</p>
							<p class='pay-now'>Pay Now</p>
						</div>
					</div>
					<div class='col-4 auction-container complete-auction'>
						<div class='title-container'>
							<p>Nintendo Switch</p>
						</div>
						<div class='info-container'>
							<p id='current_price'>103.29</p>
							<p class='cur-bid'>Final Bid</p>
							<p class='pay-now'>Pay Now</p>
						</div>
					</div>
					<div class='col-4 auction-container complete-auction'>
						<div class='title-container'>
							<p>Nintendo Switch</p>
						</div>
						<div class='info-container'>
							<p id='current_price'>103.29</p>
							<p class='cur-bid'>Final Bid</p>
							<p class='pay-now'>Pay Now</p>
						</div>
					</div>
					<div class='col-4 auction-container complete-auction'>
						<div class='title-container'>
							<p>Nintendo Switch</p>
						</div>
						<div class='info-container'>
							<p id='current_price'>103.29</p>
							<p class='cur-bid'>Final Bid</p>
							<p class='pay-now'>Pay Now</p>
						</div>
					</div>
					<div class='col-4 auction-container complete-auction'>
						<div class='title-container'>
							<p>Nintendo Switch</p>
						</div>
						<div class='info-container'>
							<p id='current_price'>103.29</p>
							<p class='cur-bid'>Final Bid</p>
							<p class='pay-now'>Pay Now</p>
						</div>
					</div>
					<div class='col-4 auction-container complete-auction'>
						<div class='title-container'>
							<p>Nintendo Switch</p>
						</div>
						<div class='info-container'>
							<p id='current_price'>103.29</p>
							<p class='cur-bid'>Final Bid</p>
							<p class='pay-now'>Pay Now</p>
						</div>
					</div>
					<div class='col-4 auction-container complete-auction'>
						<div class='title-container'>
							<p>Nintendo Switch</p>
						</div>
						<div class='info-container'>
							<p id='current_price'>103.29</p>
							<p class='cur-bid'>Final Bid</p>
							<p class='pay-now'>Pay Now</p>
						</div>
					</div>
				</div>
				<h1 class='title-2'>ACTIVE AUCTIONS:</h1>
				<div id='active-auctions'>
					<div class='auction-group'>
						<div class='auction-container active-auction'>
							<div class='title-container'>
								<p>Zelda: Breath of the Wild</p>
							</div>
							<div class='info-container'>
								<p id='current_price'>20.49</p>
								<p class='cur-bid'>Current Bid</p>
								<p class='time_left'>Time Left: 9 sec</p>
							</div>
						</div>
						<button class='orange_button'><p>BID NOW</p></button>
						<p class='bid-cost'>92 bidcoins to bid</p>
					</div>
					<div class='auction-group'>
						<div class='auction-container active-auction'>
							<div class='title-container'>
								<p>Horizon: Zero Dawn</p>
							</div>
							<div class='info-container'>
								<p id='current_price'>15.30</p>
								<p class='cur-bid'>Current Bid</p>
								<p class='time_left'>Time Left: 3 sec</p>
							</div>
						</div>
						<button class='orange_button'><p>BID NOW</p></button>
						<p class='bid-cost'>92 bidcoins to bid</p>
					</div>
					<div class='auction-group'>
						<div class='auction-container active-auction'>
							<div class='title-container'>
								<p>Horizon: Zero Dawn</p>
							</div>
							<div class='info-container'>
								<p id='current_price'>15.30</p>
								<p class='cur-bid'>Current Bid</p>
								<p class='time_left'>Time Left: 3 sec</p>
							</div>
						</div>
						<button class='orange_button'><p>BID NOW</p></button>
						<p class='bid-cost'>92 bidcoins to bid</p>
					</div>
					<div class='auction-group'>
						<div class='auction-container active-auction'>
							<div class='title-container'>
								<p>Horizon: Zero Dawn</p>
							</div>
							<div class='info-container'>
								<p id='current_price'>15.30</p>
								<p class='cur-bid'>Current Bid</p>
								<p class='time_left'>Time Left: 3 sec</p>
							</div>
						</div>
						<button class='orange_button'><p>BID NOW</p></button>
						<p class='bid-cost'>92 bidcoins to bid</p>
					</div>
					<div class='auction-group'>
						<div class='auction-container active-auction'>
							<div class='title-container'>
								<p>Horizon: Zero Dawn</p>
							</div>
							<div class='info-container'>
								<p id='current_price'>15.30</p>
								<p class='cur-bid'>Current Bid</p>
								<p class='time_left'>Time Left: 3 sec</p>
							</div>
						</div>
						<button class='orange_button'><p>BID NOW</p></button>
						<p class='bid-cost'>92 bidcoins to bid</p>
					</div>
					<div style='clear:both;'></div>
				</div>
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