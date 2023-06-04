function a() {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
            });
        } else {
            swal("Your imaginary file is safe!");
        }
    });
}
// form search
let btnSearch = document.querySelector(".btn-search");
let inputSearch = document.querySelector(".input-search");
btnSearch.addEventListener("click", function (e) {
    // inputSearch.value = "";
});
