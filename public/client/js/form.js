function $(select) {
    var elements = document.querySelectorAll(select);
    return elements.length == 1 ? elements[0] : elements;
}

// Hàm đệ quy check định dạng email
var filterEmail =
    /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

var register = $('#register-click');
var formRegister = $('.wrap_form-bg');
var formLogin = $('.wrap_form-login');
var login = $('#login-click');
var name = $('#name');



//  Đổi form
register.addEventListener('click', (e) => {
    e.preventDefault();

    formLogin.style.display = 'none';
    formRegister.style.display = 'block';
});

login.addEventListener('click', (e) => {
    e.preventDefault();

    formRegister.style.display = 'none';
    formLogin.style.display = 'block';
});

// vadidate form