
<?php include ("php/header.php"); ?>


<div class = leftbar>
  <div id=lagg>
    <h3>Lägg till en film</h3>
    <p>Titelt:</p> 
    <p><input id=formFilmTitle type=text class="required"></p>

    <p>Betyg:</p>
    <p><select id="formFilmRank">
    <option value="0">Valj betyg här...</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
  </select></p>

  <p>Länk till imdb:</p>
  <p><input id=formFilmIMDB type=text class="required"></p>

  <p>Länk till bild:</p> 
  <p><input id=formFilmBild type=text class="required"></p>

  <p>Filmens handling:</p> 
  <p><input id=formFilmHandling type=text class="required"></p>



  <p><input type="button" id="btnSubmit" Value=" Spara film "></p>
</div>

<hr>
<h3>Sortera filmer</h3>
<p><input type="button" id="btnHighest" Value=" Högst Betyg"></p>
<p><input type="button" id="btnLowest" Value=" Lägst Betyg "></p>


</div>

<div class="floatingbox" >
<div class="filmer">
  <h2>Filmer</h2>
  

    <ul id="menulist">
    </ul>
    </div>
    </div>







  <?php include ("php/footer.php"); ?>

