

//Bubble sort logic 

// void bubbleSort(int arr[])
//     {
//         int n = arr.length;
//         for (int i = 0; i < n-1; i++)
//             for (int j = 0; j < n-i-1; j++)
//                 if (arr[j] > arr[j+1])
//                 {
//                     // swap arr[j+1] and arr[j]
//                     int temp = arr[j];
//                     arr[j] = arr[j+1];
//                     arr[j+1] = temp;
//                 }
//     }


//blue = #144c96

//green = #33ff4e , #15c415

//red =  #ff3636

//yellow = #ffbc36


function Bubble_sort() {
    c_delay = 0;

    for (var i = 0; i < array_size; i++) {
        for (var j = 0; j < array_size - i - 1; j++) {
            update_div(divs[j], div_sizes[j], "#ffbc36"); // yellow

            if (div_sizes[j] > div_sizes[j + 1]) {
                update_div(divs[j], div_sizes[j], "#ff3636"); // red
                update_div(divs[j + 1], div_sizes[j + 1], "#ff3636"); //red

                var temp = div_sizes[j];
                div_sizes[j] = div_sizes[j + 1];
                div_sizes[j + 1] = temp;

                update_div(divs[j], div_sizes[j], "#ff3636"); // red
                update_div(divs[j + 1], div_sizes[j + 1], "##ff3636"); //red 
            }
            update_div(divs[j], div_sizes[j], "#144c96"); // blue
        }
        update_div(divs[j], div_sizes[j], "#15c415"); // green
    }
    update_div(divs[0], div_sizes[0], "#15c415"); //green

    enable_buttons();

}


