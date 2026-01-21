const checkAllBox = document.querySelector("#checkAllBox");
const permissions = document.querySelectorAll(".permission-item");
const clearButton = document.querySelector("#clearCheckBox");

checkAllBox.addEventListener("change", function (e) {
    permissions.forEach((permission) => {
        permission.checked = true;
    });

    if (e.target.checked) {
        if (clearButton.hidden) {
            clearButton.hidden = false;
            return;
        }
    }
});

clearButton.addEventListener("click", function () {
    permissions.forEach((permission) => {
        permission.checked = false;
    });
    checkAllBox.checked = false;
    clearButton.hidden = true;
});

permissions.forEach((permission) => {
    permission.addEventListener("change", function () {
        const allChecked = Array.from(permissions).every(
            (i) => i.checked == true,
        );
        const someChecked = Array.from(permissions).some(
            (i) => i.checked == true,
        );

        if (allChecked) {
            checkAllBox.checked = true;
            checkAllBox.indeterminate = false;
        } else if (someChecked) {
            checkAllBox.checked = false;
            checkAllBox.indeterminate = true;
        } else {
            checkAllBox.checked = false;
            checkAllBox.indeterminate = false;
            clearButton.hidden = true;
        }
    });
});
