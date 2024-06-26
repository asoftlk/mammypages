
      <style>
        .main-footer {
            background: linear-gradient(90deg, #c45791 30%, #6e48bf 100%);
            text-align: center;
        }

        .main-footer .link-part {
            padding-top: 1.5rem;
            padding-bottom: 0.5rem;
        }
        
        .link-text, .link-text:hover{
          color: #fff;
          text-decoration: none;
          margin-left: 30px;
          margin-bottom: 10px;
          font-size: 15px;
      }
</style>
<script>
    function fetch_cat(lang){
	//var lang = $('#language option:selected').val();
    //make the ajax call
    $.ajax({
        url: "ajax/language",
        data: {lang : lang},
		type: "POST",
        success: function(data) {
			//debugger;
            var json = $.parseJSON(data);
			for (var i=0;i<json.length;++i)
			{
				if(lang=='tam'){
				$('#articlecat, #articlecatm').append('<div class="text-center"  style="padding:0.3rem 0.8rem;"><form action="category" method="post"><input type="submit" href="#" class="text-ceter catinput" style="font-family: \'Mukta Malar\', sans-serif;text-decoration:none; border:none; background:none; font-size:14px; font-weight:600;  color:#747474;" value="'+json[i]+'" name="category"></form></div>');
				}
				else{
				$('#articlecat, #articlecatm').append('<div class="text-center"  style="padding:0.3rem 0.8rem;"><form action="category" method="post"><input type="submit" href="#" class="text-ceter catinput" style="text-decoration:none; border:none; background:none; font-size:14px; font-weight:600;  color:#747474;" value="'+json[i]+'" name="category"></form></div>');
				}
				$(document).on('mouseover', '.catinput', function(e) {
					$(this).css("color","#68cf68");
					// code from mouseover hover function goes here
				});

				$(document).on('mouseout', '.catinput', function(e) {
					$(this).css("color","#747474");
					 // code from mouseout hover function goes here
				});
			} 
			//console.log(data);
        },
		error: function(data) {
			console.log(data);
		}
    });
}

$("#language, #languagem").on('change', function() {
	var selectedid = "#"+$(this).attr('id');
	$('#articlecatm').slick('unslick'); 
	$('#articlecat, #articlecatm').children().remove();
	var lang = $(selectedid+' option:selected').val();
	localStorage.setItem('lang', lang);
	var newlang = localStorage.getItem('lang');
    fetch_cat(lang);
});
$(window).on('load', function() {
    $('#articlecat').children().remove();
	var newlang = localStorage.getItem('lang');
	if(newlang != null){
		//debugger
		$("#language option[value='"+newlang+"']").attr("selected","selected");
		$("#languagem option[value='"+newlang+"']").attr("selected","selected");
		fetch_cat(newlang);
	}
	else{
		var lang = $('#language option:selected').val();
		fetch_cat(lang);
	}
});
</script>
		<footer  class="main-footer" style="bottom:0; margin-top:1rem; width:100%">
			<div  class="link-part">
                <div style="margin-bottom:20px;text-decoration:none">
				<a class="link-text" href="About" target="_blank">About</a>
                <a class="link-text" href="#">Advertise</a>
                <a class="link-text" href="#">Disclaimer</a>
                <a class="link-text" href="#">Posting Rules</a>
                <a class="link-text" href="privacy-policy" target="_blank">Privacy & Cookies</a>
                <a class="link-text" href="#">Get In Touch</a>
                <a class="link-text" href="terms-conditions" target="_blank">T&nbsp;&&nbsp;C's</a>
                </div>
                <div><p class="link-text">Copyright © <span id="currentYear"></span> mammypages.com. All Rights Reserved</p></div>
                
			</div>
      </footer>	
      <script>
          document.getElementById("currentYear").innerHTML = new Date().getFullYear();
      </script>
