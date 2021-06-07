function Quick_sort() {
    c_delay = 0;

    quick(0, array_size - 1);

    enable_buttons();
}

function quick(start, end) {
    if (start < end) {
        //stores the position of pivot element
        var piv_pos = quick_partition(start, end);
        quick(start, piv_pos - 1);//sorts the left side of pivot.
        quick(piv_pos + 1, end);//sorts the right side of pivot.
    }
}

function quick_partition(start, end) {
    var i = start + 1;
    var piv = div_sizes[start];//make the first element as pivot element.
    update_div(divs[start], div_sizes[start], "y#ffbc36");//yellow

    for (var j = start + 1; j <= end; j++) {
        //re-arrange the array by putting elements which are less than pivot on one side and which are greater that on other.
        if (div_sizes[j] < piv) {
            update_div(divs[j], div_sizes[j], "#ffbc36");//yellow

            update_div(divs[i], div_sizes[i], "#ff3636");//red
            update_div(divs[j], div_sizes[j], "#ff3636");//red

            var temp = div_sizes[i];
            div_sizes[i] = div_sizes[j];
            div_sizes[j] = temp;

            update_div(divs[i], div_sizes[i], "#ff3636");//red
            update_div(divs[j], div_sizes[j], "#ff3636");//red

            update_div(divs[i], div_sizes[i], "#144c96");//blue
            update_div(divs[j], div_sizes[j], "#144c96");//blue

            i += 1;
        }
    }
    update_div(divs[start], div_sizes[start], "#ff3636");//red
    update_div(divs[i - 1], div_sizes[i - 1], "#ff3636");//red

    var temp = div_sizes[start];//put the pivot element in its proper place.
    div_sizes[start] = div_sizes[i - 1];
    div_sizes[i - 1] = temp;

    update_div(divs[start], div_sizes[start], "#ff3636");//red
    update_div(divs[i - 1], div_sizes[i - 1], "#ff3636");//red

    for (var t = start; t <= i; t++) {
        update_div(divs[t], div_sizes[t], "#15c415");//green
    }

    return i - 1;//return the position of the pivot
}