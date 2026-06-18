<?php
/** Section: Mobile sticky bar + FAB — defaults from design; overridden via widget fields. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$v = isset( $vars ) && is_array( $vars ) ? $vars : array();
?>
<!-- ═══════════════ Mobile sticky bar + FAB ═══════════════ -->
<nav class="mbar">
  <a href="https://wa.me/971586634710" class="m-wa"><i class="fab fa-whatsapp"></i> واتساب</a>
  <a href="tel:+971586634710" class="m-call"><i class="fas fa-phone"></i> اتصال</a>
  <a href="#contact" class="m-quote"><i class="fas fa-file-invoice-dollar"></i> طلب خدمة</a>
</nav>
<a href="https://wa.me/971586634710" class="fab" id="fab" aria-label="واتساب"><i class="fab fa-whatsapp"></i></a>
