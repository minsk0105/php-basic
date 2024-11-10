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
        if (this.getAttribute("data-check") === 'ADMIN') {
            var action_url = this.getAttribute("data-action") + this.getAttribute("data-idx");
            location.href = action_url;
            return;
        }
        var action_url = form.getAttribute("action") + this.getAttribute("data-idx");
        modal.classList.add("show");
        form.setAttribute('action', action_url);
    });
});

close.addEventListener('click', function() {
    modal.classList.remove("show");
});