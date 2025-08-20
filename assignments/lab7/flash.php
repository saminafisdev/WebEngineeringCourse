<?php
function setFlash($type, $message)
{
  $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

function showFlash()
{
  if (!empty($_SESSION['flash'])) {
    $flash = $_SESSION['flash'];
    $class = ($flash['type'] == 'success') ? 'is-success' : 'is-danger';

    echo "<div class='notification $class'>
                <button class='delete' onclick=\"this.parentElement.style.display='none'\"></button>
                {$flash['message']}
              </div>";
    unset($_SESSION['flash']); // remove after showing
  }
}
