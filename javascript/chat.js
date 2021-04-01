const form = document.querySelector(".typing-area");
const input = form.querySelector(".input-area");
const sendBtn = form.querySelector("button");
const chatbox = document.querySelector(".chat-box");

form.onsubmit = (e) => {
  e.preventDefault();
}

sendBtn.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/insert-chat.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200) {
        input.value = "";
        scrollBottom();
      }
    }
  }
  let formData = new FormData(form);
  xhr.send(formData);
}

chatbox.onmouseenter = ()=> {
  chatbox.classList.add("active");
}

chatbox.onmouseleave = ()=> {
  chatbox.classList.remove("active");
}

setInterval(()=> {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/get-chat.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200) {
        let data = xhr.response;
        chatbox.innerHTML = data;
        if(!chatbox.classList.contains("active")){
          scrollBottom();
        }
      }
    }
  }
  let formData = new FormData(form);
  xhr.send(formData);
}, 500);

function scrollBottom() {
  chatbox.scrollTop = chatbox.scrollHeight;
}

