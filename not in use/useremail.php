<script>
		function add(){

			//get info
			var c_name = document.getElementById('c_name').value;
			var c_title = document.getElementById('c_title').value;
			var c_date = document.getElementById('c_date').value;
			var c_desc = document.getElementById('c_desc').value;
			var userEmail = document.getElementById('userEmail').value;

			//construct POST string with name value pair
			var str = "c_name = " + c_name + "c_title = " + c_title + "c_date = " + c_date + "c_desc = " + c_desc + "userEmail = " + userEmail;

			//establish XMLHTTP object
			var req = getXMLHTTP();

			if(req){

				req.onreadystatechange = function(){
					if (req.readyState == 4) {
						// only if "OK"
						if (req.status == 200) {                        
							document.getElementById('addNewExp').innerHTML = req.responseText;    


						} else {
							alert("There was a problem while using XMLHTTP:\n" + req.statusText);
						}
					}
				}
			}
			req.open("post", "add.php", true);
			req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			req.send(str);
		}
		</script>
		
		
		 onclick="add()"
		 
		 
		 $c_name = $_POST['c_name'];
	$userEmail = $_GET['userEmail'];
	$c_title = $_GET['c_title'];
	$c_date = $_GET['c_date'];
	$c_desc = $_GET['c_desc'];