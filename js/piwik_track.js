
try {
	var piwikTracker = Piwik.getTracker("/piwik/piwik.php", 1);
	piwikTracker.trackPageView();
	piwikTracker.enableLinkTracking();
} catch( err ) {}