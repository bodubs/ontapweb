<?php

// Include top
include 'top.php';

?>
<div id="home-upper-section">
	

	<img src="find-your-spot.png" id="find-your-spot"/><br>
	<img src="ontap-saying-text.png" id="saying-text"/>

	<!-- image for smaller browsers -->
	<img src="ontap-saying-text-small-browser.png" id="saying-text-small-browser"/>


	<div id="home-page-app-download">
		<!--<h4>Download Our Mobile App!</h4>-->
		<!-- <img src="ontap-app-icon.png" alt="OnTap App Icon" id="ontap-app-icon"><br> -->
		<img src="download-on-the-app-store-apple.svg" alt="apple-app-store-download" class="app-store-download">
	</div>

</div>
<!-- <div id="description">
	<ul id="desc-list">
		<li>Ease your decision of where to go out</li>
		<li>See how packed bars are</li>
		<li>Get need to know information easily</li>
	</ul>
</div> -->
<div id="features">
	<div id="features-left">
		<div id="home-features-desc-1">
			<h3 class="desc-title">Live Cam</h3>
            <p class="admin-features-desc">See the capacity of a bar!</p>
		<!--<p class="features-desc" id="home-feat-desc-1">Easily Find Information<br>like when your favorite bars are open!</p>-->
			<!--<p class="features-desc" id="home-feat-desc-3">Know what events are coming up!</p>-->
		</div>
	</div>
	<div id="features-center">
		<img src="ontap-features-title.png" alt="OnTap Features Title" class="info-titles"/>
		<img src="ontap-bar-ui-view.png" alt="OnTap Bar Camera" class="user-view" id="home-bar-cam-img"/>
		<img src="ontap-bar-info-ui-view.png" alt="OnTap Bar Info" class="user-view" id="home-bar-info-img"/>
	

		<!-- FOR SMALL BROWSERS -->
		<div id="feat-small-browser-list-div">
			<ul id="feat-desc-list-small-browser">
				<li>Live Bar Cam</li>
				<li>Easy Readability</li>
				<li>Find specials and events</li>
			</ul>
		</div>
		
	</div>
	<div id="features-right">
		<!--<p class="features-desc" id="home-feat-desc-2">See what specials are happening today!</p>-->
		<div id="home-features-desc-2">
			<h3 class="desc-title">Easily Find Info</h3>
            <p class="admin-features-desc">Need to know information like hours, specials, and events at your favorite bars, all in one place!</p>
	</div>
</div>
<div id="features-2">
	<div id="feat-2-left">
		<img src="ontap-mytap-ui-view.png" alt="OnTap MyTap View" class="user-view"/>
	</div>
	<div id="feat-2-right">
		<h1>MyTap</h1>
		<h3>Add your favorite bars to your MyTap list for easy access!</h3>
	</div>
</div>
<div id="features-3">
	<div id="feat-3-left">
		<h1>Get Direct Notifications</h1>
        <h3>Stay up to date on specials and events happening near you!</h3>
        <h3>Never miss a happy hour again!</h3>
	</div>
	<div id="feat-3-right">
		<img src="push-notification.png" alt="Push Notification Example" class="user-view" id="admin-push-noti"/>
	</div>
</div>


<?php

// ********** INCLUDE FOOTER ********** //
include 'footer.php';

?>
