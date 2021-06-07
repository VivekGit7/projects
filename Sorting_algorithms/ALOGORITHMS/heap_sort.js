
function Heap_sort() {
    c_delay = 0;

    heap();

    enable_buttons();
}

function heap() {
    for (var i = Math.floor(array_size / 2) - 1; i >= 0; i--) {
        max_heapify(array_size, i);
    }

    for (var i = array_size - 1; i > 0; i--) {
        swap(0, i);
        update_div(divs[i], div_sizes[i], "#15c415");//green
        update_div(divs[i], div_sizes[i], "#ffbc36");//yellow

        max_heapify(i, 0);

        update_div(divs[i], div_sizes[i], "#144c96");//blue
        update_div(divs[i], div_sizes[i], "#15c415");//green
    }
    update_div(divs[i], div_sizes[i], "#15c415");//green
}

function max_heapify(n, i) {
    var largest = i;
    var l = 2 * i + 1;
    var r = 2 * i + 2;

    if (l < n && div_sizes[l] > div_sizes[largest]) {
        if (largest != i) {
            update_div(divs[largest], div_sizes[largest], "#144c96");//blue
        }

        largest = l;

        update_div(divs[largest], div_sizes[largest], "#ff3636");//red
    }

    if (r < n && div_sizes[r] > div_sizes[largest]) {
        if (largest != i) {
            update_div(divs[largest], div_sizes[largest], "#144c96");//blue
        }

        largest = r;

        update_div(divs[largest], div_sizes[largest], "#ff3636");//red
    }

    if (largest != i) {
        swap(i, largest);

        max_heapify(n, largest);
    }
}

function swap(i, j) {
    update_div(divs[i], div_sizes[i], "#ff3636");//red
    update_div(divs[j], div_sizes[j], "#ff3636");//red

    var temp = div_sizes[i];
    div_sizes[i] = div_sizes[j];
    div_sizes[j] = temp;

    update_div(divs[i], div_sizes[i], "#ff3636");//blue
    update_div(divs[j], div_sizes[j], "#ff3636");//blue

    update_div(divs[i], div_sizes[i], "#144c96");//blue
    update_div(divs[j], div_sizes[j], "#144c96");//blue
}

