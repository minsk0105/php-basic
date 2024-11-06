document.querySelector('.reset > span').addEventListener('click', function() {
    const inputValue = this.parentNode.parentNode;

    inputValue.id.value = "";
    inputValue.pass.value = "";
    inputValue.pass_check.value = "";
    inputValue.name.value = "";
    inputValue.phone.value = "";
    inputValue.email.value = "";
});

const submitBtn = document.querySelector('.submit_btn');

submitBtn.addEventListener('click', function(event) {
    const pushForm = this.parentNode;

    if (pushForm.pass.value !== pushForm.pass_check.value) {
        alert ("비밀번호가 일치하지 않습니다.");
        event.preventDefault();
        return false;
    }
});