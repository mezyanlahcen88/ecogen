/*
Template Name: Velzon - Admin & Dashboard Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Form Advanced Js File
*/
$('.multiselect').multi();


var multiSelectBasic = document.getElementById("multiselect-basic");
if (multiSelectBasic) {
    multi(multiSelectBasic, {
        enable_search: false
    });
}

// var multiSelectHeader = document.getElementById("multiselect-header");
// if (multiSelectHeader) {
//     multi(multiSelectHeader, {
//     });
// }

var multiSelectOptGroup = document.getElementById("multiselect-optiongroup");
if (multiSelectOptGroup) {
    multi(multiSelectOptGroup, {
        enable_search: true,
    });
}



