// Define quoteTimeouts globally.  We will store setTimeout refs in here
// so that they can be cleared if the quoteBox is started by another part of the page.
if (typeof quoteTimeouts === 'undefined') {
	var quoteTimeouts = [];
}

function doSetTimeout(quotes, qkey) {
	var current_q = quotes[qkey];
	// calculate next interval.  
	// This is the delay until the next quote is displayed, so should be based on the size of the previous quote
	var delay = Math.round((current_q.quote.length / 15) * 1000);
	// set newinterval to a minimum of 4s
	if (delay < 4000) {
		delay = 4000;
	}
	// Get the details of the next quote
	var q = quotes[++qkey];
	quoteTimeouts[quoteTimeouts.length] = setTimeout(
			function() {
				if (q != undefined) {
					$("#quote, #quote_author").fadeOut("slow", function() {
						displayQuote(q)
					}).delay(200).fadeIn("slow");
				}
				if (qkey >= quotes.length - 1) {
					qkey = 0;
				}

				doSetTimeout(quotes, qkey)
			}, delay);
}

function displayQuote(q) {
	document.getElementById("quote").innerHTML = q.quote;
	document.getElementById("quote_author").innerHTML = q
			.hasOwnProperty("author") ? q.author : "Anon.";	
}

function startQuoteBox(quotes, qnum) {
	// prevent problems with many timeouts being set if this is displayed more
	// than once on a page (ajax) by cleaning up current ones
	clearQuoteTimeouts();
	displayQuote(quotes[qnum]);
	$("#quote, #quote_author").fadeIn("slow");
	doSetTimeout(quotes, qnum);
}

function randomStartQuoteBox(quotes) {
	startQuoteBox(quotes, getRandomInt(0, quotes.length - 1));
}

function getRandomInt(min, max) {
	return Math.floor(Math.random() * (max - min + 1)) + min;
}

function clearQuoteTimeouts() {
	for (tkey in quoteTimeouts) {
		clearTimeout(quoteTimeouts[tkey])
	}
}