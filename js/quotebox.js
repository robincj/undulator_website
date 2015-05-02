// Define quoteTimeouts globally.  We will store setTimeout refs in here
// so that they can be cleared if the quoteBox is started by another part of the page.
if (typeof quoteTimeouts === 'undefined') {
	var quoteTimeouts = [];
}

/**
 * QuoteBox() object constructor (Class)
 * 
 * 
 * Example:
 * 
 * <div id="quotebox"> <div id="quote"></div> <div id="quote_author"></div>
 * </div>
 * 
 *  <script> var quotes = [{ quote: "Gidday", author: "Earnest Shakleton" }, {
 * quote: "Hi", author: "Bob" }];
 * 
 * var qBox = new QuoteBox(quotes);
 * 
 * qBox.randomStart();
 * </script>
 */
function QuoteBox(quotes) {
	this.quotes = quotes;
	this.quoteCssId = "quote";
	this.authorCssId = "quote_author";
	this.minDelay = 4000;
	var startAt = 0;

	this.start = function(quotes, qnum) {
		// prevent problems with many timeouts being set if this is displayed
		// more
		// than once on a page (ajax) by cleaning up current ones
		this.clearQuoteTimeouts();
		this.displayQuote(this.quotes[this.startAt]);
		$("#" + this.quoteCssId + ", #" + this.authorCssId).fadeIn("slow");
		this.doSetTimeout();
	}

	this.randomStart = function() {
		this.startAt = this.getRandomInt(0, quotes.length - 1);
		this.start();
	}

	this.doSetTimeout = function() {
		var current_q = this.quotes[this.startAt];
		// calculate next interval.
		// This is the delay until the next quote is displayed, so should be
		// based
		// on the size of the previous quote
		var delay = Math.round((current_q.quote.length / 15) * 1000);
		// set newinterval to a minimum of 4s
		if (delay < this.minDelay) {
			delay = this.minDelay;
		}
		// Get the details of the next quote
		var q = this.quotes[++this.startAt];
		var self = this;
		quoteTimeouts[quoteTimeouts.length] = setTimeout(function() {
			if (q != undefined) {
				$("#" + self.quoteCssId + ", #" + self.authorCssId).fadeOut(
						"slow", function() {
							self.displayQuote(q)
						}).delay(200).fadeIn("slow");
			}
			if (self.startAt >= self.quotes.length - 1) {
				self.startAt = 0;
			}

			self.doSetTimeout()
		}, delay);
	}

	this.displayQuote = function(q) {
		document.getElementById(this.quoteCssId).innerHTML = q.quote;
		document.getElementById(this.authorCssId).innerHTML = q
				.hasOwnProperty("author") ? q.author : "Anon.";
	}

	this.getRandomInt = function(min, max) {
		return Math.floor(Math.random() * (max - min + 1)) + min;
	}

	this.clearQuoteTimeouts = function() {
		for (tkey in quoteTimeouts) {
			clearTimeout(quoteTimeouts[tkey])
		}
	}
}
