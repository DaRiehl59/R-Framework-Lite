function dump(obj) {
    var out = '';
    for (var i in obj) {
        out += i + ": " + obj[i] + "\n";
    }

    alert(out);

    // or, if you wanted to avoid alerts...

    var pre = document.createElement('pre');
    pre.innerHTML = out;
    document.body.appendChild(pre);
}

function toggle(source, name, id, begin, end) {
    //checkboxes = document.getElementsByName(name);
    
    for (var index=begin; index<=end; index++)
    {
        checkbox_name = name + '[' + id + '][' + index + ']';
        myCheckboxes = document.getElementsByName(checkbox_name);
        if (myCheckboxes.length)
        {
//            console.log(index);
//            console.log(myCheckboxes);
            myCheckboxes[0].checked = source.checked;
        }
    }
}

function checkForm(form)
{
    var result = true;
    re = /^\w+$/;
    if(!re.test(form.identifiant.value)) {
        alert("Erreur : L'identifiant doit contenir uniquement des lettres (a-zA-Z), des caractères numériques (0-9) ou des tirets bas (_).");
        form.identifiant.focus();
        result = false;
    }
    else
    {
        if(form.motdepasse.value == form.motdepasse2.value) {
            if(form.motdepasse.value.length < 8) {
                alert("Erreur: Le mot de passe doit contenir au moins 8 caractères.");
                form.motdepasse.focus();
                result = false;
            }
            if(form.motdepasse.value == form.identifiant.value) {
                alert("Erreur: Le mot de passe doit être différent de l'identifiant.");
                form.pwd1.focus();
                result = false;
            }
            re = /[0-9]/;
            if(!re.test(form.motdepasse.value)) {
                alert("Erreur: Le mot de passe doit contenir au moins un caractère numérique (0-9).");
                form.pwd1.focus();
                result = false;
            }
            re = /[a-z]/;
            if(!re.test(form.motdepasse.value)) {
                alert("Erreur: Le mot de passe doit contenir au moins une lettre minuscule (a-z)!");
                form.pwd1.focus();
                result = false;
            }
            re = /[A-Z]/;
            if(!re.test(form.motdepasse.value)) {
                alert("Erreur: Le mot de passe doit contenir au moins une lettre majuscule (A-Z)!");
                form.pwd1.focus();
                result = false;
            }
        } else {
            alert("Erreur: Le mot de passe et la confirmation sont différents.");
            form.motdepasse.focus();
            result = false;
        }
    }
    return result;
}
