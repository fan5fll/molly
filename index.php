<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="css/base-min.css">
      <link rel="stylesheet" href="css/pure-min.css">
      <link rel="stylesheet" href="css/base.css">
      <link rel="stylesheet" href="css/jack.css">
      <link rel="stylesheet" href="inputs/main.css">
      <link rel="stylesheet" href="css/widescreen.css" disabled id="wsCss">
      <link rel="stylesheet" href="css/smallscreen.css" disabled id="ssCss">
      <script src="js/jquery.js"></script>
      <script>getWidth()</script>
   </head>
   <body class="dk">
      <h1 class="h1">
         <string style="color:#25231e;-webkit-text-stroke: .5px #ffc700;">Find Your</string>
         Images
      </h1>
      <div class="group">      
         <input type="text" class="input" id="searchB" required>
         <span class="highlight"></span>
         <span class="bar" class="span"></span>
         <label class="label">Name</label>
      </div>
      <button class="themagicbutton" id="">Search</button><button class="themagicbutton" id="myBtn">Upload Images</button>
      <button class="themagicbutton" id="myBtn">Upload Videos</button>
      <!-- MODAL -->
      <div id="myModal" class="modal">
         <!-- Modal content -->
         <div class="modal-content">
            <span class="close">&times;</span>
            <form class="pure-form pure-form-aligned" action="upload.php" method="POST" post_max_size="800000000M" enctype="multipart/form-data">
               <fieldset>
                  <div class="jack-ride-left" style="width:60%">
                     <div class="pure-control-group">
                        <label for="fileToUpload">Upload an image</label>
                        <input onchange="onFileSelected(event)" type="file" id="fileToUpload" name="fileToUpload" id="fileToUpload" required="true" accept=".jpg,.png,.jpeg,.gif,.mp4,.mov"><br>
                     </div>
                     <div class="pure-control-group">
                        <label for="1input">Tags</label>
                        <input id="1input" type="text" placeholder="Enter a tag" required="true" style="color:black"> <span style="color:grey;">NOTE: 1 tag is required. <br></span>
                     </div>
                     <div id="more-tags-yay" style="color:black">
                     </div>
                     <a href="javascript:showIdeas()" style="margin-left:11em">What should I put as a tag?</a><br><br>
                     <button type="button" class="pure-button pure-button-primary" onclick="createTag()" style="margin-left:11em">Add another tag</button><br><br>
                     <div style="margin-left:11em" id="tagsIdeas" hidden>
                        What should I put as a tag?<br>
                        <ul>
                           <li>People</li>
                           <li>Places</li>
                           <li>Memory-joggers</li>
                           <li>Things</li>
                           <li>Firsts</li>
                        </ul>
                     </div>
                     <br>
                     <input hidden type="text" id="tagsF" name="classes">
                     <button type="button" class="pure-button pure-button-primary" onclick="allFuncts()" style="margin-left:11em">Prepare for submission</button>
                     <div class="pure-controls">
                        <div class="tooltip">
                           <button type="submit" id="submit" name="submit" class="pure-button pure-button-primary" disabled>Submit</button>
                           <span id="tooltip" class="tooltiptext">Before submitting, please press "prepare for submission"</span>
                        </div>
                     </div>
                  </div>
                  <div class="jack-ride-right" style="width:40%;font-family: 'Source Code Pro', monospace;" id="imageE">
                     Image Preview<br>
                     <img id="myimage" style="width:90%">
                     <div id="vidParent">
                        <video id="myvid" autoplay controls style="width:90%" hidden></video>
                     </div>
                  </div>
               </fieldset>
            </form>
         </div>
      </div>
      <div class="imagesContainer">
      	<?php
      		echo file_get_contents("uploads/data")
      	?>
      </div>
      </div>
      <div hidden id="dumpingGround" style="border-style:solid;border-width:2px;border-color:black;"></div>
      <div id="fileInfo" hidden></div>
      <script>
         // Get the modal
         var modal = document.getElementById('myModal');
         
         // Get the button that opens the modal
         var btn = document.getElementById("myBtn");
         
         // Get the <span> element that closes the modal
         var span = document.getElementsByClassName("close")[0];
         
         // When the user clicks on the button, open the modal 
         btn.onclick = function() {
           modal.style.display = "block";
         }
         
         // When the user clicks on <span> (x), close the modal
         span.onclick = function() {
           modal.style.display = "none";
         }
         
         // When the user clicks anywhere outside of the modal, close it
         window.onclick = function(event) {
           if (event.target == modal) {
             modal.style.display = "none";
           }
         }
         
         
         function onFileSelected(event) {
         var filename = document.getElementById("fileToUpload").value
         var ext = filename.substring(filename.lastIndexOf('.')+1, filename.length) || filename;
         ext = ext.toLowerCase()
         console.log(ext)
         
         var selectedFile = event.target.files[0];
         var reader = new FileReader();
         
         if(ext == "mp4") {
         document.getElementById("myimage").src = ""
         document.getElementById("myvid").hidden = false
         var vidtag = document.getElementById("myvid");
         vidtag.title = selectedFile.name;
         
         reader.onload = function(event) {
         vidtag.src = event.target.result;
         };
         reader.readAsDataURL(selectedFile);
         
         
         } else {
         document.getElementById("myvid").hidden = true
         var imgtag = document.getElementById("myimage");
         
         reader.onload = function(event) {
         imgtag.src = event.target.result;
         };
         reader.readAsDataURL(selectedFile);
         }
         }
      </script>
   </body>
   <script src="js/base.js"></script>
</html>
