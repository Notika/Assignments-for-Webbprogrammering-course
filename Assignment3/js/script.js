
// creates the array of films to sort them later
var filmer = new Array;

function initArray()
{
  var numInternalArrays = 2;
  for (var i = 0; i < numInternalArrays; i++) {
   filmer[i] = [];
 }
}

// load list of films from file
$(document).ready(function() {

   if ($('.filmer').length > 0){
    $.get("https://ddwap.mah.se/AC9496/Lab3/php/FileReadTitles.php", { title: this.id}, function(data)
    {
      var lineByLine = data.split('\n');
      for (var i = 0, len = lineByLine.length; i < len; i++) {
  
	var oneLine = lineByLine[i].split(';'); 

	if(oneLine.length == 5)
	{
	        filmer[i] = oneLine;
	        $("#menulist").append("<li class=\"menuitem\" id=\"" + filmer[i][0] + "\">" + filmer[i][0] + "<span class=\"rating star" + filmer[i][1] + "\"</span></li>");
	} 
     }
    });
  }

    $('#btnSubmit').click(function(e) {
      var isValid = true;

      $('input[type="text"].required').each(function() {
        if ($.trim($(this).val()) == '') {
          isValid = false;
          $(this).css({
            "border": "1px solid red",
            "background": "red"
          });
        }
        else {
          $(this).css({
            "border": "",
            "background": ""
          });
        }
      });

      var rank = $('#formFilmRank').val();
      if (rank == '0') {
        isValid = false;
        $('#formFilmRank').css('background-color', 'red');
      }
      else {
        $('#formFilmRank').css('background-color', 'white');
      }

      if (isValid == false) 
        {e.preventDefault();}
      else
      { 

        var titleValue = document.getElementById("formFilmTitle").value;
        var rank = document.getElementById("formFilmRank").value;
        var rankValue = "rating star" + rank;
        var IMDBlink = document.getElementById("formFilmIMDB").value;
        var bildLink = document.getElementById("formFilmBild").value;
        var filmensHandling = document.getElementById("formFilmHandling").value;
        var el = new Array;

        var sendAllData = titleValue + ';' + rank + ';' + IMDBlink + ';' + bildLink + ';' + filmensHandling + "\n";

            //send txt to the server
            //notice the function at the end. this gets called after the data has been sent
            $.post('https://ddwap.mah.se/AC9496/Lab3/php/FileReadWrite.php', { value: sendAllData } , function(data){
                            //now data is an object, so put the message in the div
                            $('#response').text(data.message);
                          }, 'json');

            el.push(titleValue, rank, IMDBlink, bildLink, filmensHandling);
            filmer.push(el);

            $("#menulist").append("<li class=\"menuitem\" id=\"" + titleValue + "\">" + titleValue + "<span class=\"rating star" + rank + "\"</span></li>");

            $('#formFilmRank').css('background-color', '');
            console.log(filmer); 

            $('#formFilmRank').prop('selectedIndex', 0);
            $('input[type="text"], formFilmTitle').val('');
          }
        });

    $("#menulist").on("click", "li.menuitem", function () {
      $(".floatingbox").empty();
      console.log(this.id);
      $.get("https://ddwap.mah.se/AC9496/Lab3/php/FileRead.php", {title: this.id}, function(data)
      {
       console.log(data);
       var arr = data.split(';');
       $(".floatingbox").html("<h2>"+ arr[0] + "</h2>" +"</br>"+ 
         "<p>"+arr[4] +"</p>" +
         "<p>Länk till IMDB: " + arr[2] + "</p>" +
         "<p>Betyg:<span class=\"rating star" + arr[1] + "\"</span>" + "</p>");

				// Load image
				var img = $("<img />").attr('src', arr[3]).on('load', function() {
         if (!this.complete || typeof this.naturalWidth == "undefined" || this.naturalWidth == 0) {
           alert('broken image!');
         } else {
           $(".floatingbox").append(img);
         }
       });
      });
    });

    $("#btnLowest").click(function(){
     filmer.sort(function(a, b) {
       var a0= a[1], b0= b[1];
       return a0 - b0;
     });

     $("#menulist").empty();
     for (var i = 0, len = filmer.length; i < len; i++) {
      $("#menulist").append("<li class=\"menuitem\" id=\"" + filmer[i][0] + "\">" + filmer[i][0] + "<span class=\"rating star" + filmer[i][1] + "\"</span></li>");
    }

  }); 

    $("#btnHighest").click(function(){
     filmer.sort(function(a, b) {
       var a0= a[1], b0= b[1];
       return b0 - a0;
     });

     $("#menulist").empty();
     for (var i = 0, len = filmer.length; i < len; i++) {
      $("#menulist").append("<li class=\"menuitem\" id=\"" + filmer[i][0] + "\">" + filmer[i][0] + "<span class=\"rating star" + filmer[i][1] + "\"</span></li>");
    }
  }); 

  });

$(function(){
    // this will get the full URL at the address bar
    var url = window.location.href; 

    // passes on every "a" tag 
    $("#navmenu a").each(function() {
            // checks if its the same on the address bar
            if(url == (this.href)) { 
              $(this).closest("li").addClass("active");
            }
          });
  });
