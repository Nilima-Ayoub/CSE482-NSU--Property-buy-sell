<!--cookie-->
<div class="cookie-consent-modal">
        <div class="content">
            <h1>Allow Cookies</h1>
            <p>This site can store cookies on your website and disclose information in accordance with our cookie policy</p>
            <div class="btns">
                <button class="btn cancel">cancel</button>
                <button class="btn accept">accept</button>
            </div>
        </div>
    </div>

<script>
let cookieModal = document.querySelector(".cookie-consent-modal")
let cancelCookieBtn = document.querySelector(".btn.cancel")
let acceptCookieBtn = document.querySelector(".btn.accept")

cancelCookieBtn.addEventListener("click", function (){
    cookieModal.classList.remove("active")
})

acceptCookieBtn.addEventListener("click", function (){
    cookieModal.classList.remove("active")
   localStorage.setItem("cookieAccepted", "yes")
   <?php if(isset($_SESSION['username'])){?>
    document.cookie = "username=<?php echo $_SESSION['username'];?>";
<?php  } ?>

   })

setTimeout(function (){
    let cookieAccepted = localStorage.getItem("cookieAccepted")
    if (cookieAccepted != "yes"){
        cookieModal.classList.add("active")
    }
},1000)

function logout(){
        if(localStorage.getItem("cookieAccepted")=="yes"){
  localStorage.clear();

 }
    }
</script>
