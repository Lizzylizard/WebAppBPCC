function bmi(){
    var size = parseInt(document.getElementById("size").value) / 100.0;
    var weight = parseInt(document.getElementById("weight").value);
    var name = document.getElementById("fname").value.toString();
    console.log(name);
    // gewicht / groesse ^ 2 = bmi
    var bmi = (weight / (size * size)).toFixed(2);

    var res = "";
    if (bmi < 19) {
        res = "too low.";
    } else if(bmi >=19 && bmi < 25) {
        res = "normal.";
    } else {
        res = "too high.";
    }

    document.getElementById("res").innerHTML = bmi;
    document.getElementById("name").innerHTML = "Hello " + name + ", your BMI is:";
    document.getElementById("bewertung").innerHTML = "Your bmi is " + res;

}