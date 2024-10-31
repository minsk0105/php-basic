document.querySelector('.read_check').addEventListener('click', function() {
    var action_url = this.getAttribute("data-action");
    location.href = action_url;
});