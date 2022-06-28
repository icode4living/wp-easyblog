
//mobile nav control
let navBtn = document.querySelector(".mobile-menu");
//menu close button
let closeBtn = document.querySelector('.close-btn');
//open menu drawer when the menu button is clicked
navBtn.addEventListener('click', ()=>{
    document.querySelector('.active-menu').style.display = 'block';
    document.querySelector('.close-btn').style.display = 'block';

    document.getElementById('menu-panel').classList.add('m-nav-link');

    document.getElementById('menu-panel').classList.remove('menu-panel');

});
//close the menu when the close button is clicked
closeBtn.addEventListener('click', ()=>{
    document.querySelector('.active-menu').style.display = 'none';
    document.querySelector('.close-btn').style.display = 'none';
    document.getElementById('menu-panel').classList.remove('m-nav-link');

    document.getElementById('menu-panel').classList.add('menu-panel');


});
/**Setting tab control */
document.querySelector(".option-control")
.addEventListener('click',()=>{
  document.querySelector('.active-menu').style.display = 'block';
  document.querySelector('.setting-tab').style.display = 'block';

});

/**Setting tab control  for mobile*/
try{

document.querySelector(".setting-btn")
.addEventListener('click',()=>{
  document.querySelector('.active-menu').style.display = 'block';
  document.querySelector('.setting-tab').style.display = 'block';
  
});
}catch(e){

}
//close the setting when the close button is clicked
try{
document.querySelector('.close-setting').addEventListener('click', ()=>{
    document.querySelector('.active-menu').style.display = 'none';
    document.querySelector('.setting-tab').style.display = 'none';


});
}
catch(e){
  
}
/***search form ocontrol */
//open search form when clicked
document.querySelector('.search-btn').addEventListener('click', ()=>{
  document.querySelector('.active-menu').style.display = 'block';
  document.querySelector('.search-tab').style.display = 'block';


});

//close search tab when clicked
try{
document.querySelector('.close-search').addEventListener('click', ()=>{
  document.querySelector('.active-menu').style.display = 'none';
  document.querySelector('.search-tab').style.display = 'none';


});
//open mobile search form when clicked
document.querySelector('.search-btn-mobile').addEventListener('click', ()=>{
  document.querySelector('.active-menu').style.display = 'block';
  document.querySelector('.search-tab').style.display = 'block';


});
}
catch(TypeError){
}
try{
let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("slide-item");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
   for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  }

  //automatic slide
showSlide();

function showSlide() {
  let i;
  let slides = document.getElementsByClassName("slide-item");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlide, 2000); // Change image every 2 seconds

} 
}catch(undefined){
  
}



/**This script handles user data with cookies
 * *@theme @comment_name @comment_email @isSubscriber
/**This function handles the cookies*/

//Get cookie value

/**@setCookie accepts a cookie name and a value and expire day*/
const setCookie = ((cname, cvalue, exdays )=>{
  let d =  new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires="+ d.toUTCString();
  let cookieValue = encodeURIComponent(cvalue);
  document.cookie = `${cname}=${cookieValue}; SameSite=None; Secure; ${expires}; path=/;`;
})
/**@deleteCookie  delete a cookie by accepting it cookie name*/
const deleteCookie =((cname)=>{
  if(document.cookie.split(';').some((item)=>
item.trim().startsWith(`${cname}=`))){
  document.cookie = `${cname}=$; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`
}
})
/**@getCookie gets a cookie with the cookie name */

const getCookie = ((cname)=>{
try{
 const cookieValue = document.cookie.split('; ').find(row => row.startsWith(`${cname}=`)).split('=')[1];
 return decodeURIComponent(cookieValue);
 //console.log(cookieValue)
}
catch(undefined){
 /* const cookieValue = document.cookie.split('; ').find(row => row.startsWith(`${cname}=`)).split('=')[1];
 return decodeURIComponent(cookieValue);*/
 setCookie('theme-color','dark-theme',360);

}
})



/**@checkIfCookieExist check if cookie exist and returns true or false**/
const checkIfCookieExist = ((cname,cvalue)=>{

  if (document.cookie.split(';')
  .some((item) => item.includes(`${cname}=${encodeURIComponent(cvalue)}`))) {
  
      return true;
  }
  else{
      return false;
  }
})
/*comment form Name field
try{
let myName = document.querySelector('[aria-label="name"]').value;
let email = document.querySelector('[aria-label="email"]').value;
let comment = document.querySelector('[aria-label="comment"]').value;
//check box to save data
let saveFormData = document.querySelector('#save-form-data')
}
catch(e){

}
try{
document.getElementById('my-comment').addEventListener('submit',(e)=>{
  e.preventDefault();
  /**user name & email will be saved in the browser 
   * if user check the checkbox on the comment form 
  if(saveFormData.checked){
      setCookie('comment_name', myName,360);
      setCookie('comment_email',email,360);
    }
})

}catch(e){
//console.error(e);
}*/
//**Toggle between light and darkmode*/
//Dark mode button
let themeModeBtn = document.querySelector('#theme-toggle');
//Listen for a click on the theme mode toggle button
////console.log('welcome');
/*
**this section is removed to set the theme color by the server
try{
  if( getCookie('theme-color') ==="dark-theme"){
   
    themeModeBtn.checked = true;
    document.querySelector('[name=theme-color]').setAttribute('content', '#121212');


   }
}
catch(undefined){
  setCookie('theme-color','none',360);

}*/
themeModeBtn.addEventListener('change',()=>{

  if(!this.checked){
    try{
      //remove dark-theme mode if the page is in dark-theme
      //console.log(getCookie('theme-color'))

    if( getCookie('theme-color') ==="dark-theme"){
        
  
    deleteCookie('theme-color');
    document.body.classList.remove('dark-theme');
    //uncheck theme mode button
    document.querySelector('[name=theme-color]').setAttribute('content', '#CB0101');

  themeModeBtn.checked = false;
     }
//if the theme is not in dark mode switch to dark mode
     else{
      document.body.classList.toggle('dark-theme');
      setCookie('theme-color','dark-theme',360);
      document.querySelector('[name=theme-color]').setAttribute('content', '#121212');

     }

  }//if their is no theme-color in the cookie set it and switch to dartheme
  catch(undefined){
    document.body.classList.toggle('dark-theme');
    setCookie('theme-color','dark-theme',360);
    themeModeBtn.checked = true;
    document.querySelector('[name=theme-color]').setAttribute('content', '#121212');


  }
}
})

try{
  if(prefersDarkScheme.matches){
    //check if page has 
   
      document.body.classList.toggle('dark-theme');
      document.querySelector('[name=theme-color]').setAttribute('content', '#121212');
     // setCookie('theme-color','dark-theme',360);
      themeModeBtn.checked = true;


  }
 
}
  catch(e){
     
  }

  
/**check if user is a subscriber */
//console.log(getCookie('isSubscriber'))
try{
if( Boolean(getCookie('isSubscriber'))==true){
document.querySelector('.newsletter').style.display ='none';
}
else{
  setCookie('isSubscriber','false',360);

}
}catch(undefined){
  setCookie('isSubscriber','false',360);

}
//copy link to clip board

function copTextLink(textValue){
  /*const copyLink = document.querySelector('#copy-link');
  copyLink.value = document.querySelector('[data-link]');
  //copyLink.select();
 // document.execCommand('copy');
  
//copyLink.setSelectionRange(0,99999);*/
navigator.clipboard.writeText(textValue);

}
  
