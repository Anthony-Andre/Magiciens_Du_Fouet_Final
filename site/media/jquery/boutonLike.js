  /****************** Ajout d'un like: ******************/ 

  function ajoutLike(){

    $.ajax({
      type: "POST",
      url: "media/jquery/ajax.php",
      data: "data",
      dataType: "json",
      success: function (response) {
        console.log(response);
      }
    });
  
  
  
  }
  