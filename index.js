
document.addEventListener('DOMContentLoaded', function() {
    const reserve = document.getElementById("button-reserve");
    const submit = document.getElementById("submit")
    const cancel = document.getElementById("cancel")


    reserve.addEventListener('click', () => {
        const form = document.getElementById("book");
        form.style.display = "flex";
        reserve.style.visibility = 'hidden';
    });

    submit.addEventListener('click', () => {
        const form = document.getElementById("book");
        form.style.display = 'none';
        reserve.style.visibility = 'visible';
    });

    cancel.addEventListener('click', () => {
        const form = document.getElementById("book");
        form.style.display = 'none';
        reserve.style.visibility = 'visible';
    });
});
