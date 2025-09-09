</div>
<div id="footer">
  <div style="text-align:center; padding:10px;">
  
<?php

echo '&copy; 2001-'.date('Y').' <a href="http://www.die-ewigen.com" target="_new">DIE EWIGEN</a>';

?>
  </div>
  </div>
</div>

<script>
// Burger Menu Toggle Function
function toggleMenu() {
    const burger = document.querySelector('.burger-menu');
    const nav = document.querySelector('#sci-fi-nav');
    
    burger.classList.toggle('active');
    nav.classList.toggle('active');
}

// Close menu when clicking outside
document.addEventListener('click', function(event) {
    const burger = document.querySelector('.burger-menu');
    const nav = document.querySelector('#sci-fi-nav');
    
    if (!burger.contains(event.target) && !nav.contains(event.target)) {
        burger.classList.remove('active');
        nav.classList.remove('active');
    }
});

// Close menu when pressing Escape
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        const burger = document.querySelector('.burger-menu');
        const nav = document.querySelector('#sci-fi-nav');
        
        burger.classList.remove('active');
        nav.classList.remove('active');
    }
});

// Add sci-fi effects
document.addEventListener('DOMContentLoaded', function() {
    // Add hover sound effect (optional)
    const menuItems = document.querySelectorAll('#sci-fi-nav a');
    
    menuItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            // Optional: Add subtle animation or sound
            this.style.textShadow = '0 0 10px #4EC9FF';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.textShadow = 'none';
        });
    });
});
</script>

</body>
</html>