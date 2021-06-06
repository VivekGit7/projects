// class InsertionSort {
//     /*Function to sort array using insertion sort*/
//     void sort(int arr[])
//     {
//         int n = arr.length;
//         for (int i = 1; i < n; ++i) {
//             int key = arr[i];
//             int j = i - 1;

//             /* Move elements of arr[0..i-1], that are
//                greater than key, to one position ahead
//                of their current position */
//             while (j >= 0 && arr[j] > key) {
//                 arr[j + 1] = arr[j];
//                 j = j - 1;
//             }
//             arr[j + 1] = key;
//         }
//     }



function Insertion_sort() {
    c_delay = 0;

    for (var i = 1; i < array_size; i++) {
        update_div(divs[j], div_sizes[j], "#ffbc36"); // yellow

        var key = div_sizes[i];
        var j = i - 1;

        while (j >= 0 && key < div_sizes[j]) {
            update_div(divs[j], div_sizes[j], "#ff3636"); // red
            update_div(divs[j + 1], div_sizes[j + 1], "#ff3636"); //red

            div_sizes[j + 1] = div_sizes[j];

            update_div(divs[j], div_sizes[j], "#ff3636"); // red
            update_div(divs[j + 1], div_sizes[j + 1], "#ff3636"); //red

            if (j == (i - 1)) {
                update_div(divs[j + 1], div_sizes[j + 1], "#ffbc36"); // yellow
            } else {
                update_div(divs[j + 1], div_sizes[j + 1], "#144c96"); // blue
            }

            j -= 1
        }
        div_sizes[j + 1] = key;
        for (var k = 0; k < i; k++) {
            update_div(divs[k], div_sizes[k], "#15c415"); //green
        }
    }
    update_div(divs[i - 1], div_sizes[i - 1], "#15c415"); //green

    enable_buttons();
}