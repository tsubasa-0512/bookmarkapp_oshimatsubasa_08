const form = document.querySelector("#signup");
const sendBtn = form.querySelector(".button input");
const errorMSG = form.querySelector(".error-msg");

form.onsubmit = (e)=> {
  e.preventDefault();
}

sendBtn.onclick = ()=> {

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/sign_result.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200) {
          let data = xhr.response;
          if(data == "登録成功"){
            location.href = "users.php";
          }else {
            errorMSG.style.display = "block";
            errorMSG.textContent = data;
          }
        }
      }

    }
    let formData = new FormData(form);
    xhr.send(formData);
};