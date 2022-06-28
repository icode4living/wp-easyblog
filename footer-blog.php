<footer class="theme-footer">

  <div class="social-media">
    <a href="https://www.facebook.com/FlourishTimes/"><i class="fa-brands fa-facebook"></i></a>
    <a href="https://twitter.com/FlourishTimes?t=k_behgK07tob9KvmHAllFA&s=09"><i class="fa-brands fa-twitter"></i></a>
    <a href="https://www.instagram.com/official_flourishtimes?r=nametag"><i class="fa-brands fa-instagram"></i></a>
    <a href="https://www.linkedin.com/mwlite/in/flourish-komolafe-6790a669"><i class="fa-brands fa-linkedin"></i></a>

  </div>
  <div class="footer-link">
    <a href="#">About Us</a>
    <a href="#">Contact Us</a>
    <a href="#">Advertise with us</a>
    <a href="#">Privacy Policy</a>

  </div>
  <p id="copyright"> <small>Copyright &copy; <script>
var newDate = new Date();
document.write(newDate.getFullYear().toString());
  </script> Flourish Times All right reserved. The contents on flourishtimes.com.ng
  can not be rewritten, published or redistributed without prior written authority to Flourish Times  </small></p>
  
</footer>


<!--menu class-->
<script>
  /**comment form control */

//Comment tab
let commentFormTabControl = document.getElementById('comment-form');
//comment form
let commentFormTab =  document.querySelector('.comment-form');
//comment list tab control
let commentListTabControl = document.getElementById('comment-list');
let commentListTab = document.querySelector('.comment-list');

//display comment form and hide comment tab when clicked
commentFormTabControl.addEventListener('click',()=>{
  //hide comment tab
  commentListTab.style.display = 'none';
  commentListTabControl.classList.remove('active-comment-tab');

// show comment form
commentFormTab.style.display = 'block';
commentFormTabControl.classList.add('active-comment-tab');

//commentListTabControl.classList.remove('.active-comment-tab');
});

//display comment tab and hide comment form when clicked
commentListTabControl.addEventListener('click',()=>{
  // show comment tab
  commentListTabControl.classList.add('active-comment-tab');

  commentFormTabControl.classList.remove('active-comment-tab');

  commentListTab.style.display = 'block';

    //hide comment form
commentFormTab.style.display = 'none';

});
</script>
<?php wp_footer(); ?>

</body>
</html>