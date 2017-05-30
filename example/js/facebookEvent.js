// for asynchronous calls. Just use this piece of javascript

var request = new XMLHttpRequest();
var url = "yourProjectNameHere/FacebookEvents.php"; // change this according to your project name
request.open("POST", url, true);
request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');

request.onreadystatechange = function() {
    if(request.readyState == 4 && request.status == 200) {
      var div = document.getElementById('fb-news'); // some html element in your template
      div.innerHTML = div.innerHTML + request.responseText;
    }
}
request.send();