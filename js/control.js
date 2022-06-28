/**AJAX query handler */
//submit the form on contact page

function cookieSetter(cname,cvalue,exdays){
    let d =  new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    let cookieValue = encodeURIComponent(cvalue);
    document.cookie = `${cname}=${cookieValue}; SameSite=None; Secure; ${expires}; path=/;`;
}
jQuery(document).ready(function(){
   
     jQuery("#newsletter-form").submit(function(e){
         e.preventDefault();
 jQuery("#subBtn").html("Please wait..");
          let email = jQuery("#email_id").val();
       //  jQuery('.modal-container').css('display','block');
      jQuery.ajax({
          type:'post',
          url:localize._ajax_url,
          //dataType:'json',
          data:{action:'save_newsletter_subscriber',email:email}
          
      }).done((resp)=>{
          cookieSetter('isSubscriber','false',360);
    //success response
   // console.log(resp);
   jQuery("#newsletter").css('display','none');
alert('Thanks for subscribing to our newsletter');
      }).fail((res)=>{
          //fial response
     });
      
      });
 
 });
