// Hamburger Menu
var hamburgerMenu = document.querySelector(".hamburger__menu");
var closeBtn = document.querySelector(".close-btn");
var rightSidebar = document.querySelector(".right-sidebar");

hamburgerMenu.addEventListener("click", () => {
    rightSidebar.classList.add("change");
});

closeBtn.addEventListener("click", () => {
    rightSidebar.classList.remove("change");
});


// Login Registration Form
function loginRegistrationForm() {
    const signinBtn = document.querySelector('.signinBtn');
    const signupBtn = document.querySelector('.signupBtn');
    const formBx = document.querySelector('.login__container__formBx');
    const login = document.querySelector('.login');

    if(signupBtn) {
        signupBtn.addEventListener("click", () => {
            formBx.classList.add('active');
            login.classList.add('active');
        });
    }

    if(signinBtn) {
        signinBtn.addEventListener("click", () => {
            formBx.classList.remove('active');
            login.classList.remove('active');
        });
    }
}
loginRegistrationForm();

function productImage()
{
    const mainImg = document.getElementById('mainImg');
    const smallImg = document.getElementsByClassName('small-img');

    if(mainImg) {
        smallImg[0].onclick = function() {
            mainImg.src = smallImg[0].src;
        }

        smallImg[1].onclick = function() {
            mainImg.src = smallImg[1].src;
        }

        smallImg[2].onclick = function() {
            mainImg.src = smallImg[2].src;
        }
    }
}
productImage();
