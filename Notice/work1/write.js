const id = document.getElementById('name');
const tel = document.getElementById('tel');
const born = document.getElementById('born');
const submitBtn = document.getElementById('submit');

submitBtn.addEventListener('click', function(event) {
    if (id.value === "" || tel.value === "" || born.value === "") {

        if (id.value === "" && tel.value !== "" && born.value !=="") {
            alert("성명을 입력해 주세요.");
            id.focus();
        } else if (tel.value === "" && id.value !== "" && born.value !=="") {
            alert("전화번호을 입력해 주세요.");
            tel.focus();
        } else if (born.value === "" && tel.value !== "" && id.value !=="") {
            alert("생년월일을 입력해 주세요.");
            born.focus();
        } else {
            alert("필수 입력창에 값을 입력해 주세요.");
        }
        
        event.preventDefault();
        return false;
    }
});