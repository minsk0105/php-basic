const submitBtn = document.querySelector('.submit_btn');

submitBtn.addEventListener('click', function(event) {
    const inputValue = this.parentNode;

    if (!inputValue.id.value) {
        alert ("아이디를 입력해 주세요.");
        inputValue.id.focus();
        event.preventDefault;
        return false;
    }

    if (!inputValue.pass.value) {
        alert ("비밀번호를 입력해 주세요.");
        inputValue.pass.focus();
        event.preventDefault;
        return false;
    }
});