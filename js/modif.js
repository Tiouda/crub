function openForm() {
    document.getElementById("myForm").style.display = "block";
    $(".nom_" + e.target.id + ""); // Puis activation des inputs
    $(".prenom_" + e.target.id + "");
    $(".mail_" + e.target.id + "");
    $(".tel_" + e.target.id + "");
    $(".role_" + e.target.id + "");
  }
  
  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }
