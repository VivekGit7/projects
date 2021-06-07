function Merge_sort() {
    c_delay = 0;

    merge_partition(0, array_size - 1);

    enable_buttons();
}

function merge_partition(start, end) {
    if (start < end) {
        var mid = Math.floor((start + end) / 2);
        update_div(divs[mid], div_sizes[mid], "#ffbc36");//yellow

        merge_partition(start, mid);
        merge_partition(mid + 1, end);

        merge(start, mid, end);
    }
}

function merge(start, mid, end) {
    var p = start, q = mid + 1;

    var Arr = [], k = 0;

    for (var i = start; i <= end; i++) {
        if (p > mid) {
            Arr[k++] = div_sizes[q++];
            update_div(divs[q - 1], div_sizes[q - 1], "#ff3636");//red
        }
        else if (q > end) {
            Arr[k++] = div_sizes[p++];
            update_div(divs[p - 1], div_sizes[p - 1], "#ff3636");//red
        }
        else if (div_sizes[p] < div_sizes[q]) {
            Arr[k++] = div_sizes[p++];
            update_div(divs[p - 1], div_sizes[p - 1], "#ff3636");//red
        }
        else {
            Arr[k++] = div_sizes[q++];
            update_div(divs[q - 1], div_sizes[q - 1], "#ff3636");//red
        }
    }

    for (var t = 0; t < k; t++) {
        div_sizes[start++] = Arr[t];
        update_div(divs[start - 1], div_sizes[start - 1], "#15c415");//green
    }
}
