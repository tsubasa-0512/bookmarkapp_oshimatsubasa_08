const pwdfield = document.querySelector('.pass-show-hide input[type="password"]');
toggleBtn = document.querySelector('.pass-show-hide .field i');

toggleBtn.onclick = () => {
    if(pwdfield.type == 'password'){
        pwdfield.type = 'text';
        toggleBtn.classList.add('active');
    }else {
        pwdfield.type = 'password';
        toggleBtn.classList.remove('active');
    }
}