//array holding all guest names and number of times they visited
var name_list = [{firstName:"Elisabeth", count: 1},
                 {firstName:"David", count: 12},
                 {firstName:"Axel", count: 4},
                 {firstName:"Sebastian", count: 2}];

function addName(){
    //Form input
    var new_name = document.getElementById("fname").value.toString();
    //console.log("New name = " + new_name);
    
    //index of array entry if name already in list
    // -1 if not in list yet
    var list_flag = isInList(new_name);
    
    //if already in list, increase counter
    //else add to list
    if (list_flag != (-1)) {
        //console.log("Is already in list");
        name_list[list_flag].count += 1;
    } else {
        //console.log("New name");    
        var new_object = {firstName: new_name, count: 1}
        name_list.push(new_object);        
    }    
    // print all guests to web page
    printToPage();
}

// check if name is already in list 
// if yes, return index of array entry
// else return -1
function isInList(name) {
    for(var i = 0; i < name_list.length; i++){
        if (name_list[i].firstName == name){
            return i;
        }
    }
    return -1;
}

// print list to web page 
function printToPage(){
    var all_names = "";
    for(var i = 0; i < name_list.length; i++){
        if(i == 0){
            all_names = name_list[i].firstName + " has visited " + name_list[i].count.toString() + " times.";
        } else {
            all_names = all_names + "<br>" + name_list[i].firstName + " has visited " + name_list[i].count.toString() + " times.";
        }        
        //console.log(all_names);
        document.getElementById("guests").innerHTML = all_names;
    }
}