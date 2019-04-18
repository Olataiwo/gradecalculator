	
	var btn = document.getElementById('submit');

	btn.addEventListener('click', function(){
		var showText = document.getElementById('show');

		showText.style.display = "block";
	});


	function checkPasssed(selectora, selectorb){

		if(document.querySelector(selectora).value >= 50) {

			document.querySelector(selectorb).value = 20;
		} else {
            
            document.querySelector(selectorb).value = 0;
		}
	}

		function checkPasssedDis(selectora, selectorb){

			if(document.querySelector(selectora).value >= 50) {

				document.querySelector(selectorb).value = 60;
			} else {
	            
	            document.querySelector(selectorb).value = 0;
			}
		}



     function IsInputNumber(evt){
     	var ch = String.fromCharCode(evt.which);

     	if(!(/[0-9]/.test(ch))){

			evt.preventDefault();

		}
     }


	function change(selector){

		document.querySelector(selector).readOnly = false;

		
	}