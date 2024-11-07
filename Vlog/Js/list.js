const form = document.getElementById('modal_form');
const modal = document.querySelector('.modal');
const nonSecret = document.querySelectorAll('.read_check');
const secret = document.querySelectorAll('.lock_check');
const close = document.querySelector('.close');

nonSecret.forEach(function(item) {
    item.addEventListener('click', function() {
        var action_url = this.getAttribute("data-action");
        location.href = action_url;
    });
});

secret.forEach(function(item) {
    item.addEventListener('click', function() {
        modal.classList.add("show");
        var action_url = form.getAttribute("action") + this.getAttribute("data-idx");
        form.setAttribute('action', action_url);
    });
});

close.addEventListener('click', function() {
    modal.classList.remove("show");
});