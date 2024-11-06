const submitBtn = document.querySelector('.submit_btn');

submitBtn.addEventListener('click', function(event) {
    const inputValue = this.parentNode;

    if (!inputValue.id.value) {
        alert ("아이디를 입력해 주세요.");
        inputValue.id.focus();
        event.preventDefault();
        return false;
    }

    if (!inputValue.pass.value) {
        alert ("비밀번호를 입력해 주세요.");
        inputValue.pass.focus();
        event.preventDefault();
        return false;
    }

    if (!inputValue.pass_check.value) {
        alert ("비밀번호 확인을 입력해 주세요.");
        inputValue.pass_check.focus();
        event.preventDefault();
        return false;
    }

    if (!inputValue.name.value) {
        alert ("이름을 입력해 주세요.");
        inputValue.name.focus();
        event.preventDefault();
        return false;
    }

    if (!inputValue.phone.value) {
        alert ("전화번호를 입력해 주세요.");
        inputValue.phone.focus();
        event.preventDefault();
        return false;
    }

    if (!inputValue.email.value) {
        alert ("이메일을 입력해 주세요.");
        inputValue.email.focus();
        event.preventDefault();
        return false;
    }

    var pass = inputValue.pass.value;
    var pass_check = inputValue.pass_check.value;

    if (pass !== pass_check) {
        alert ("비밀번호가 일치하지 않습니다.");
        inputValue.pass_check.focus();
        event.preventDefault();
        return false;
    }
});

document.querySelector('.reset').addEventListener('click', function() {
    const inputValue = this.parentNode;
    
    inputValue.id.value = "";
    inputValue.pass.value = "";
    inputValue.pass_check.value = "";
    inputValue.name.value = "";
    inputValue.phone.value = "";
    inputValue.email.value = "";
});

document.querySelector('.non_members').addEventListener('click', function() {
    location.href = "register.php";
});