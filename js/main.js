var search = document.getElementById('search');
var location = document.getElementById('location');
var yelpResults = document.getElementById('results');

var submit = document.getElementById('submit')
submit.addEventListener('click', showYelpResults, false);

function showYelpResults(e){
    // yelpResults.innerHTML = '';
    e.preventDefault();
    var myRequest = new XMLHttpRequest;
    myRequest.onreadystatechange = function(){
        console.log(myRequest.readyState);
    	if(myRequest.readyState === 4){
    		var results = JSON.parse(myRequest.responseText);
    		for(var i=0; i<results.length; i++){
    			var newPTag = document.createElement('p');
    			var textNode = document.createTextNode(results[i].name);
    			newPTag.appendChild(textNode);
                yelpResults.appendChild(newPTag);
    		}
    	}
    }
    myRequest.open('GET', 'yelp-api-process.php', true);
    myRequest.send(null);
}
