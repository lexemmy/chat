<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>Chat</title>
    
    <link rel="stylesheet" href="style.css" type="text/css" />
    
   
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="chat.js"></script>
    <script type="text/javascript">
    
        // ask user for name with popup prompt    
        var name = prompt("Hi, what is your name?", "");
        
        // default name is 'Guest'
    	if (!name || name === ' ') {
    	   name = "Guest";	
    	}
    	
    	// strip tags
    	name = name.replace(/(<([^>]+)>)/ig,"");
    	
    	// display name on page
    	$("#name-area").html("You are: <span>" + name + "</span>");
    	
    	// kick off chat
        var chat =  new Chat();
    	$(function() {
    	
    		 chat.getState(); 
    		 
    		 // watch textarea for key presses
             $("#sendie").keydown(function(event) {  
             
                 var key = event.which;  
           
                 //all keys including return.  
                 if (key >= 33) {
                   
                     var maxLength = $(this).attr("maxlength");  
                     var length = this.value.length;  
                     
                     // don't allow new content if length is maxed out
                     if (length >= maxLength) {  
                         event.preventDefault();  
                     }  
                  }  
    		 																																																});
    		 // watch textarea for release of key press
    		 $('#sendie').keypress(function(e) {	
    		 	var keyCode = (event.keyCode ? event.keyCode : event.which);
    			  if (keyCode == 13) { 

    			  
                    var text = $(this).val();
                  

                    if (text == 1){
                         var reply = "we have 19808 confirmed cases in nigeria";
                     } else if (text == 2){
                         var reply = "fever, dry cough, tiredness, sore throat, headache";
                     } else if (text ==3) {
                         var reply = "stay at home <br> <br> always wash your hands <br> <br> social distancing";
                     } else if (text ==4) {
                         var reply = "There are 8704 confirmed cases in lagos";
                     } else if (text ==5) {
                         var reply = "corona virus is a deadly virus that attacks the respiratory <br> <br> system and symptoms shows after 2 weeks";
                     }
                      else {
                         var reply = "hello " +name+ " i can give you info on convid-19 <br> <br> press 1 for corona virus update <br> <br> press 2 for corona virus symptoms <br> <br> press 3 for safety tips <br> <br> press 4 for lagos update <br> <br> press 5 to know more about corona virus";
                     }
                   
                    var bot = "hng bot";
    				var maxLength = $(this).attr("maxlength");  
                    var length = text.length; 
                     
                    // send 
                    if (length <= maxLength + 1) { 
                     
    			        chat.send(text, name);	
                        chat.send(reply, bot); 
    			        $(this).val("");

    			        
                    } else {
                    
    					$(this).val(text.substring(0, maxLength));
    					
    				}	
    				
    				
    			  }
             });
            
    	});
    </script>

</head>

<body onload="setInterval('chat.update()', 1000)">

    <div id="page-wrap">
    
        <h3>Covid-19 Chat Bot</h3>
        <p style="color: #fff;">By @lexemmy</p>
        
        <p id="name-area"></p>
        
        <div id="chat-wrap"><div id="chat-area"></div></div>
        
        <form id="send-message-area">
            <p>Your message: </p>
            <textarea id="sendie" maxlength = '100' placeholder="type something... press enter to send" ></textarea>
        </form>
    
    </div>

</body>

</html>
