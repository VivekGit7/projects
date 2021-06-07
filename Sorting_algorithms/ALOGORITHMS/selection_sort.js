function Selection_sort() {
    c_delay = 0;

    for (var i = 0; i < array_size - 1; i++) {
        update_div(divs[i], div_sizes[i], "#ff3636"); // red
        var min = i;
        for (var j = i + 1; j < array_size; j++) {
            update_div(divs[j], div_sizes[j], "#ffbc36"); // yellow
            if (div_sizes[j] < div_sizes[min]) {
                if (min != i) {
                    update_div(divs[min], div_sizes[min], "#144c96");//blue
                }
                min = j;
                update_div(divs[min], div_sizes[min], "#ff3636"); //red
            }
            else {
                update_div(divs[j], div_sizes[j], "#144c96"); // blue
            }
        }
        if (min != i) {
            var temp = div_sizes[min];
            div_sizes[min] = div_sizes[i];
            div_sizes[i] = temp;
            update_div(divs[min], div_sizes[min], "#ff3636"); // red
            update_div(divs[i], div_sizes[i], "#ff3636"); //red
            update_div(divs[min], div_sizes[min], "#144c96"); // blue
        }
        update_div(divs[i], div_sizes[i], "#15c415"); // green

    }
    update_div(divs[i], div_sizes[i], "#15c415"); //green

    enable_buttons();
}


//logic

// class SelectionSort
// {
//     void sort(int arr[])
//     {
//         int n = arr.length;

//         // One by one move boundary of unsorted subarray
//         for (int i = 0; i < n-1; i++)
//         {
//             // Find the minimum element in unsorted array
//             int min_idx = i;
//             for (int j = i+1; j < n; j++)
//                 if (arr[j] < arr[min_idx])
//                     min_idx = j;

//             // Swap the found minimum element with the first
//             // element
//             int temp = arr[min_idx];
//             arr[min_idx] = arr[i];
//             arr[i] = temp;
//         }
//     }