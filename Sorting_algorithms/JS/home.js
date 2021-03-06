//Variables from index file 
// from slider

var in_range = document.getElementById('range'), array_size = in_range.value;
var in_speed = document.getElementById('speed');
var in_generate = document.getElementById('generate');


//Select all id's in class buttons 

var algo_btns = document.querySelectorAll(".buttons button");


//Array div varables...

var div_sizes = [];
var divs = [];
var margin_size;
var container = document.getElementById("array_box");
container.style = "flex-direction:row";

//Array generation and updation.

in_generate.addEventListener("click", array_geterate);
in_range.addEventListener("input", update_array_size);

// Generate array function


function array_geterate() {
    container.innerHTML = "";

    if (array_size < 25) {
        for (var i = 0; i < array_size; i++) {
            div_sizes[i] = Math.floor(Math.random() * 0.7 * (in_range.max - in_range.min + 10)) + 5;
            divs[i] = document.createElement("div");
            container.appendChild(divs[i]);
            margin_size = 0.1;
            divs[i].style = " margin:0% " + margin_size + "%; text-align:center; transform: rotate(180deg) scaleX(-1); background-color: #144c96; border-radius: 5px; width:" + (100 / array_size - (2 * margin_size)) + "%; height:" + (1.2 * div_sizes[i]) + "%;";
            divs[i].innerHTML = "<span style='font-size:100%;'>" + div_sizes[i] + "</span>";
        }
    } else {
        for (var i = 0; i < array_size; i++) {
            div_sizes[i] = Math.floor(Math.random() * 0.7 * (in_range.max - in_range.min + 10)) + 5;
            divs[i] = document.createElement("div");
            container.appendChild(divs[i]);
            margin_size = 0.1;
            divs[i].style = " margin:0% " + margin_size + "%; background-color: #144c96; border-radius: 5px; width:" + (100 / array_size - (2 * margin_size)) + "%; height:" + (1.2 * div_sizes[i]) + "%;";
        }
    }
}

function update_array_size() {
    array_size = in_range.value;
    array_geterate();
}

window.onload = update_array_size();

//Choose algorithm from button selected

for (var i = 0; i < algo_btns.length; i++) {
    algo_btns[i].addEventListener("click", executeAlogrithm);
}

function disable_buttons() {
    for (var i = 0; i < algo_btns.length; i++) {

        algo_btns[i].disabled = true;
        in_range.disabled = true;
        in_speed.disabled = true;
        in_generate.disabled = true;
    }
}

function executeAlogrithm() {

    disable_buttons();

    this.classList.add("selected_btn");
    stop_btn.classList.add("showstop");
    in_generate.classList.add("genbtn");

    console.log(this.innerHTML);

    switch (this.innerHTML) {
        case "Bubble Sort": Bubble_sort();
            enable_buttons();
            break;
        case "Insertion Sort": Insertion_sort();
            enable_buttons();
            break;
        case "Heap Sort": Heap_sort();
            enable_buttons();
            break;
        case "Merge Sort": Merge_sort();
            enable_buttons();
            break;
        case "Quick Sort": Quick_sort();
            enable_buttons();
            break;
        case "Selection Sort": Selection_sort();
            enable_buttons();
            break;
    }


}