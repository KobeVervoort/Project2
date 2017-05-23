<?php



?>

<nav>


    <a class="homeLink" href="<?php echo BASE_URL . 'index.php'?>">
        <?php if($page == "tribune"):?>
            <img src="<?php echo BASE_URL . 'Bazaar/img/homeActive.png'; ?> " alt="Home Link">
            <p class="red">tribune</p>
        <?php else: ?>
            <img src="<?php echo BASE_URL . 'Bazaar/img/homeInactive.png'; ?>" alt="Home Link">
            <p>tribune</p>
        <?php endif;?>
    </a>

    <a class="offerLink" href="<?php echo BASE_URL . 'Bazaar/offers.php'?>">
        <?php if($page == "offer"):?>
            <img src="<?php echo BASE_URL . 'Bazaar/img/offerActive.png'; ?>" alt="Tribune link">
            <p class="red">aanbiedingen</p>
        <?php else: ?>
            <img src="<?php echo BASE_URL . 'Bazaar/img/offerInactive.png'; ?>" alt="Tribune link">
            <p>aanbiedingen</p>
        <?php endif;?>

    </a>
    <a class="profileLink" href="<?php echo BASE_URL . 'Bazaar/profile.php'?>">
        <?php if($page == "profiel"):?>
            <img src="<?php echo BASE_URL . 'Bazaar/img/profileActive.png'; ?>" alt="Profiel link">
            <p class="red">profiel</p>
        <?php else: ?>
            <img src="<?php echo BASE_URL . 'Bazaar/img/profileInactive.png'; ?>" alt="Profiel link">
            <p>profiel</p>
        <?php endif;?>

    </a>
    <a class="walletLink" href="<?php echo BASE_URL . 'Bazaar/wallet.php'?>">
        <?php if($page == "wallet"):?>
            <img src="<?php echo BASE_URL . 'Bazaar/img/walletActive.png'; ?>" alt="wallet link">
            <p class="red">wallet</p>
        <?php else: ?>
            <img src="<?php echo BASE_URL . 'Bazaar/img/walletInactive.png'; ?>" alt="wallet link">
            <p>wallet</p>
        <?php endif;?>
    </a>

</nav>
