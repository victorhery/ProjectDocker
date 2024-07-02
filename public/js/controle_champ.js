// traduction des nombre saisie en majuscul
function controlnom(str) 
    {
        var test = str.value;
        var nb = test.length;

        if (nb >= 1) {
            var maj = test.toUpperCase();
            str.value = maj;
        } else {
            document.getElementById("nom").focus();
        }
    }
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
        //AFFICHER LA MOT DE PASSE
        "use strict";
        function togglePwd(id) {
            var x=document.getElementById(id);
            x.type=(x.type ==="password")? "text" : "password";
            
        }
        if (x.type ==="password") {
                x.type="text";
            }
            else{
                x.type="password";
            }