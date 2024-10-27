// when Level Student dropdown changes
$('#niveau').change(function() {
    var niveau = $(this).val();
    var filiere = $("#filiere").val();

    $.ajax({
        type: "GET",
        success: function(res) {

            if (niveau == 'سنة أولى إجازة' || niveau == 'سنة ثانية إجازة' ) {
                $("#filiere").empty();
                $("#filiere").append('<option value="" selected disabled>إختر الشعبة</option>');
                $("#filiere").append('<option value="Électronique, Électrotechnique et Automatique">' +
                    'Électronique, Électrotechnique et Automatique</option>');
                $("#filiere").append('<option value="Génie Mécanique">' +
                    'Génie Mécanique</option>');
                $("#filiere").append('<option value="Ingénierie des systèmes informatiques">' +
                    'Ingénierie des systèmes informatiques</option>');
                $("#filiere").append('<option value="Télécommunications">' +
                    'Télécommunications</option>');
            } else if (niveau == 'سنة ثالثة إجازة') {
                $("#filiere").empty();
                $("#filiere").append('<option value="" selected disabled>إختر الشعبة</option>');
                $("#filiere").append('<option value="Systèmes électriques">' +
                    'Systèmes électriques</option>');
                $("#filiere").append('<option value="Mécaniques Auto">' +
                    'Mécaniques Auto</option>');
                $("#filiere").append('<option value="Mécaniques des engins">' +
                    'Mécaniques des engins</option>');
                $("#filiere").append('<option value="Systèmes embarqués">' +
                    'Systèmes embarqués</option>');
                $("#filiere").append('<option value="Réseaux informatiques">' +
                    'Réseaux informatiques</option>');
                $("#filiere").append('<option value="Télécommunications">' +
                    'Télécommunications</option>');
            } else if (niveau == 'سنة أولى ماجستير مهني' || niveau == 'سنة ثانية ماجستير مهني') {
                $("#filiere").empty();
                $("#filiere").append('<option value="" selected disabled>إختر الشعبة</option>');
                $("#filiere").append('<option value="Systèmes embarqués">' +
                    'Systèmes embarqués</option>');
                $("#filiere").append('<option value="Experts Cyber Sécurité">' +
                    'Experts Cyber Sécurité</option>');
                $("#filiere").append('<option value="Sciences des données">' +
                    'Sciences des données</option>');
                $("#filiere").append('<option value="Management de la maintenance industrielle">' +
                    'Management de la maintenance industrielle</option>');
            }else if (niveau == 'سنة أولى ماجستير بحث' || niveau == 'سنة ثانية ماجستير بحث') {
                $("#filiere").empty();
                $("#filiere").append('<option value="" selected disabled>إختر الشعبة</option>');
                $("#filiere").append('<option value="Mécanique énergétique">' +
                    'Mécanique énergétique</option>');
            } else {
                $("#filiere").empty();
            }
        }
    });

});
//----------------------------------------------------------------------------------
// when nationality dropdown changes
// $('#nationalite').change(function() {
//     var nationalite = $(this).val();
//     var identity = $("#identity").val();

//     $.ajax({
//         type: "GET",
//         success: function(res) {
//             if (nationalite == 'تونسية') {
//                 $("b").empty();
//                 $("b").append('<label class="labelright">رقم بطاقة التعريف الوطنية</label><br>');
//                 $("b").append('<input type="number" id="cin" class="form-control" name="cin" placeholder="" oninput="this.className = ``">');

//             } else if (nationalite == 'أجنببية') {
//                 $("b").empty();
//                 $("b").append('<label class="labelright">Numéro passport / رقم جواز سفر</label>');
//                 $("b").append('<input type="text" id="passport" class="form-control" name="passport">');

//             } else {
//                 $("b").empty();
//             }
//         }
//     });

// });

//----------------------------------------------------------------------------------
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Envoyer";
        confirm("!تأكيد المعطيات");
    } else {
        document.getElementById("nextBtn").innerHTML = "Suivant";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
}

function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].querySelectorAll('input[type=text], input[type=number], input[type=date]');
    z = x[currentTab].getElementsByTagName('select');
    w = x[currentTab].getElementsByClassName('obligatoirefichier');
    //y = x[currentTab].querySelectorAll('input', 'select');
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false
            valid = false;
        }
    }
    for (i = 0; i < z.length; i++) {
        // If a field is empty...
        if (z[i].value == "") {
            // add an "invalid" class to the field:
            z[i].className += " invalid";
            // and set the current valid status to false
            valid = false;
        }
    }
    for (i = 0; i < w.length; i++) {
        // If a field is empty...
        if (w[i].value == "") {
            // add an "invalid" class to the field:
            w[i].className += " invalid";
            // and set the current valid status to false
            valid = false;
        }
    }

    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " Envoyer";
    }
    return valid; // return the valid status
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
}

