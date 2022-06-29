let themeModeBtn = document.querySelector('#theme-toggle');
//add event listener to toggle button
themeModeBtn.addEventListener('change',()=>{
  try{
if(!this.checked){
  document.querySelector('[name=theme-color]').setAttribute('content', '#CB0101');
 // themeModeBtn.checked = false;
 jQuery.ajax({
  type:'post',
  contentType: "text/plain",
    xhrFields: {
         withCredentials: true
    },
    crossDomain: true,
  url:localize._object_url,
  //dataType:'json',
  data:{action:'set_dark_theme'}
  
}).done((resp)=>{
console.log(resp)
})
//console.log(this.checked);

}
//console.log(this.checked);
  }
  catch(e){

  }
})