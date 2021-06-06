//animation speed

var speed = 100;

in_speed.addEventListener("input", Animation_speed);

var delay_time = 10000 / (Math.floor(array_size / 10) * speed);

var c_delay = 0;

var stop_btn = document.getElementById('Stop');

function Animation_speed() {
    var selected_speed = in_speed.value;
    switch (parseInt(selected_speed)) {
        case 1: speed = 1;
            break;
        case 2: speed = 10;
            break;
        case 3: speed = 100;
            break;
        case 4: speed = 700;
            break;
        case 5: speed = 5000;
            break;
        case 6: speed = 10000;
            break;
    }
    delay_time = 10000 / (Math.floor(array_size / 10) * speed);
}

//enable buttons

function enable_buttons() {
    window.setTimeout(function () {
        for (var i = 0; i < algo_btns.length; i++) {
            algo_btns[i].classList.remove("selected_btn");
            algo_btns[i].disabled = false;
            in_range.disabled = false;
            in_speed.disabled = false;
            in_generate.disabled = false;
        }
    }, c_delay += delay_time);
}

//stop animation

stop_btn.addEventListener("click", stop_Animation);

function stop_Animation() {
    c_delay = 0;
    enable_buttons();
    update_array_size();
    stop_btn.classList.remove("showstop");
}


// function enable_buttons() {
//     for (var i = 0; i < algo_btns.length; i++) {
//         algo_btns[i].classList.add("unlock_btn");
//         algo_btns[i].disabled = false;
//         in_range.disabled = false;
//         in_speed.disabled = false;
//         in_generate.disabled = false;
//     }
// }

//Update the div size according to sorting algorithm

function update_div(c_div, height, colour) {
    window.setTimeout(function () {
        c_div.style = " margin:0% " + margin_size + "%; border-radius: 5px; width:" + (100 / array_size - (2 * margin_size)) + "%; height:" + height + "%; background-color:" + colour + ";";
    }, c_delay += delay_time);
}

