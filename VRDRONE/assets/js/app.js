// // Navbar Scroll
const navbar = document.querySelector('.navbar');
const navbarHeightPx = 300; // Adjust this value as needed

function addClassOnScroll() {
    navbar.classList.add('fixed-top');
}

function removeClassOnScroll() {
    navbar.classList.remove('fixed-top');
}

window.addEventListener('scroll', () => {
    if (window.scrollY > navbarHeightPx) {
        navbar.style.backgroundColor = '#192647';
        addClassOnScroll();
    } else {
        navbar.style.backgroundColor = 'transparent';
        removeClassOnScroll();
    }
});

$('.banner-slick').slick({
    lazyLoad: 'ondemand',
    infinite: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    arrows: true
});

$('.video-slick').slick({
    lazyLoad: 'ondemand',
    infinite: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    arrows: true
});

// Contact add / remove js
$(document).ready(function () {
    $('#add-input').click(function () {
        var inputField = $('<input type="text">');
        var removeButton = $('<button class="remove-input">Remove Input</button>');

        // Append the input field and remove button to the container
        $('#input-container').append(inputField).append(removeButton);

        // Change the button text and add a class
        $(this).text('Remove Input').addClass('remove-input');

        // Remove the event listener from the "Add Input" button
        $(this).off('click');

        // Call the function to handle the remove input functionality
        handleRemoveInput();
    });
});


function handleRemoveInput() {
    $('.remove-input').click(function () {
        // Get the parent container of the remove button
        var container = $(this).parent();

        // Remove the input field and the remove button from the container
        container.find('input').remove();
        container.find('.remove-input').remove();

        // Change the button text back to "Add Input" and remove the class
        $('#add-input').text('Add Input').removeClass('remove-input');

        // Call the function to handle the add input functionality
        $(document).ready(function () {
            $('#add-input').click(function () {
                // Add the code to create a new input field here
            });
        });
    });
}


//wpcf7 input 
// $(document).ready(function () {
//     // Add input field when the "Add Input" button is clicked
//     $('#add-input').click(function () {
//         var inputField = $('<input type="text">');
//         var removeButton = $('<button class="remove-input">Remove Input</button>');

//         // Append the input field and remove button to the container
//         $('#input-container').append(inputField).append(removeButton);
//     });

//     // Remove input field when the "Remove Input" button is clicked
//     $('#input-container').on('click', '.remove-input', function () {
//         $(this).prev('input').remove();
//         $(this).remove();
//     });
// });

//function.php

// add_action('wpcf7_init', 'custom_add_form_tag_input');
// function custom_add_form_tag_input() {
//     wpcf7_add_form_tag('dynamic-input', 'custom_dynamic_input_form_tag_handler');
// }

// function custom_dynamic_input_form_tag_handler($tag) {
//     // Generate the HTML for the dynamic input field
//     $html = '<input type="text" name="'.$tag -> name. '" value="'.$tag -> get_default_option(). '" />';

//     return $html;
// }


//Shortcode
// [dynamic-input]