function dump(obj) {
    var out = '';
    for (var i in obj) {
        out += i + ": " + obj[i] + "\n";
    }

    alert(out);

    // or, if you wanted to avoid alerts...

    var pre = document.createElement('pre');
    pre.innerHTML = out;
    document.body.appendChild(pre)
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