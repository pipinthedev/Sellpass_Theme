
<style>
.sticky_buttons {
   position:fixed;
   right:20px;
   z-index:999;
   bottom:35px;
}

.sticky_buttons > a {
  display: block;
  width: 50px;
  height: 50px;
  border-radius: 100%;
  margin-top: 20px;
  background-size: 27px 27px;
  background-repeat: no-repeat;
  background-position: center center;
}

.telegram_button {
  background-color:#28a8ea;
  background-image:url(images/telegram.png);	
}

.discord_button {
  background-color:#7289DA;
  background-image:url('support.png');	
}

</style>
<script src="https://embed.sellpass.io/embed.js"></script>    



<!--   
<span class="sticky_buttons">
 <a href="https://discord.gg/aBFQYzKDMV" target="_blank" class="discord_button"></a>
</span> -->

<script>
const navButton = document.getElementById('nav_button');
const nav = document.getElementById('nav');

navButton.addEventListener('click', function() {
  nav.classList.toggle('navigation_visible');
});
</script>

</body>

</html>

