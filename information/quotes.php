<?php include 'piwik_track.php'?>
<style>
/* @import url(http://fonts.googleapis.com/css?family=Handlee);
*/
.quotebox {
	min-height: 6em;
}

#quote {
	font-family: 'Handlee', cursive;
	display: none;
}

#quote_author {
	text-align: right;
	font-family: jockey one, sans-serif;
	display: none;
}
</style>


<div class="bordered-box quotebox">
	<div id="quote"></div>
	<div id="quote_author"></div>
</div>

<script src="js/quotebox.js"></script>

<script>
var qq = '"';
var q="'";
var quotes = [{ quote: "We had seen God in His splendors, heard the text that Nature renders. We had reached the naked soul of man.", author: "Earnest Shakleton" },
{ quote: "You have to go look for happiness in life, find it in the things that make you feel alive. Life is not something to be preserved or protected, it is to explored and lived to the full.", author: "Kilian Jornet"},
{ quote: "Impossible is just a word that makes me try harder" },
{ quote: "The only one who can tell you "+qq+"You can't"+qq+" is you, and you don't have to listen.<br>Unless it's your wife." },
{ quote: "Strong is what you have left when you have used up all your weak." },
{ quote: "Don't trust the grown ups! You need courage. You have to be a rebel." },
{ quote: "Why does one do these things? It's definitely a powerful experience. In some ways it's a very pointless but at one time, not so long ago there was enough risk in life that you did not want to go out pursuing these things for fun whereas now everything is so safe and sanitised and boring that there are some people myself included who feel the need to experience the danger , the apprehension, the sensations, the power, the decision makingâ€¦you know.  With your seat belt on and your central heating turned up you need to get away from all that .............to get back to something a little more fundamental.", author: "Leo Holding" },
{ quote: "Most people would be better off with more pain in their lives" },
{ quote: "The only distance you need to conquer in this race is 5 inches....The five inches between your ears." },
{ quote: "You are a middle aged man with a heart of a lion." },
{ quote: "The thing you didn't plan for is coming right your way" },
{ quote: "It's easy to be average, that's why it's so popular" },
{ quote: "When something seems hard it's time to do something harder" },
{ quote: "Something is bound to go wrong, what's important is how you deal with it, accept it - solve it - forget it" },
{ quote: "LOVE THE PAIN, FEEL THE PAIN, EMBRACE THE PAIN, BE THE PAIN...." },
{ quote: "If you can't take the pain. take the bus.", author: "C Swallow" },
{ quote: "You can't be bored when you are in pain." },
{ quote: "Slow runners make fast runners look good." },
{ quote: "So many things cost these days. Pain doesn't.    With this race  you have an all you can eat pain buffet voucher." },
{ quote: "tell your partners...I am going out for a while. I may be some time." },
{ quote: "You only know how strong you are when strong is the only option." },
{ quote: "Don't wish it was easier, wish you were stronger." },
{ quote: "The mountains will always win, the least you can do is compete." },
{ quote: "Pain has made a pact with you.... 'At the top of this hill i'll leave you alone'" },
{ quote: "Life is a pain sandwich. You need to ask yourself what sauces would you like with your sandwich" },
{ quote: "Make friends with pain and you will never be lonely again", author: "Joss Naylor" },
{ quote: "You paid to do this." },
{ quote: "This undulation insulted your mother." },
{quote: "A day in the mountains beats any day inside."},
{ quote: "If your brain is saying it hurts tell your brain it feels nice" },
{ quote: "Is the bach near the sea?", author: "Mr. T. Crumpton" },
{ quote: "You can do it.", author: "Soren Haubrock" },
{ quote: "If someone kicks you in the b*lls Think at least they didn't kick me in the b*lls twice (aka glass half full theory)", author: "Swallow" },
{ quote: "Think flat and the undulation IS  flat", author: "D Kettles" },
{ quote: "Alley of Thorns - No crying out or you will be booed. Weakness is not tolerated" },
{ quote: "I don't stop when I am tired. I stop when I am done.  " },
{ quote: "Old chinese proverb says shū shì suí shí xié dài de huā yuán" },
{ quote: "If one should ask me what 'use' there was in climbing, or attempting to climb the world's highest peak, I would be compelled to answer 'none.' There is no scientific end to be served; simply the gratification of the impulse of achievement, the indomitable desire to see what lies beyond the heart of man.", author: "George Mallory" },
{ quote: "So, if you cannot understand that there is something in man which responds to the challenge of this mountain and goes out to meet it, that the struggle is the struggle of life itself upward and forever upward, then you won't see why we go. What we get from this adventure is just sheer joy. And joy is, after all, the end of life. We do not live to eat and make money. We eat and make money to be able to enjoy life. That is what life means and what life is for.", author: "George M" },
{ quote: "If you exercise your body you also look after your mind." },
{ quote: "The 'Comfort Zone' is the problem in life. Imagine you wake on a rainy morning. The rain bangs on your windows. It's easier to stay in your nice bed than go for a walk in the rain. But in the evening you think 'what a boring day.<br/>If you do it, if you get out of bed and walk in the rain then you will look back on the day and think 'what a wonderful day." },
{ quote: "Comfort really is a bad thing. We are striving for comfort all the time. But it kills you." },
{quote: "Mountains are made to look down from, not up at â€“ so get on with it", author: "Sherman" },
{quote: "Try to be a rainbow in someone's cloud."},
{quote: "You came here to eat your gel and kick ass....<br/>......And you just finished your gel"},
{quote: "You have the key to the hurt locker.<br/>Open it."},
{quote: "A few people live the dream but the some of us just snatch glimpses of it.", author: "A Shelton"},
{quote: "Most people convince themselves are all grown up but deep down they are not.", author: "A Shelton"},
{quote: "It's a terrible thing, I think, in life to wait until you're ready. I have this feeling now that actually no one is ever ready to do anything. There is almost no such thing as ready. There is only now. And you may as well do it now. Generally speaking, now is as good a time as any.", author: "Hugh Laurie"},
]
;

var qBox = new QuoteBox(quotes);
qBox.randomStart();

//randomStartQuoteBox(quotes);
</script>
