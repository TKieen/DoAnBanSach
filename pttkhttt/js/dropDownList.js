function myFunction() {
    document.getElementById("dropDownList").classList.toggle("show");
}

window.onclick = function(event) {
    if (!event.target.matches('.container-top-book-catalogue-content-left')) {
        var dropdowns = document.getElementsByClassName("dropDownContent");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}
