<header class="container">
    <?php if (! isset($_header['usuario'])): ?>
    	<a href="<?=base_url()?>usuario/login">LOGIN</a>
    <?php else: ?>
        <?= $_header['usuario']->nombre ?> / 
        <a href="<?=base_url()?>usuario/logout">LOGOUT</a>
    <?php endif; ?>
</header>
