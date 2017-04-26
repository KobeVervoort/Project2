<?php

?>

<nav>


    <a class="homeLink" href="index.php">
        <?php if($page == "tribune"):?>
            <img src="img/homeActive.png" alt="Home Link">
            <p class="red">tribune</p>
        <?php else: ?>
            <img src="img/homeInactive.png" alt="Home Link">
            <p>tribune</p>
        <?php endif;?>
    </a>

    <a class="offerLink" href="offers.php">
        <?php if($page == "aanbiedingen"):?>
            <img src="img/offerActive.png" alt="Tribune link">
            <p class="red">aanbiedingen</p>
        <?php else: ?>
            <img src="img/offerInactive.png" alt="Tribune link">
            <p>aanbiedingen</p>
        <?php endif;?>

    </a>
    <a class="profileLink" href="profile.php">
        <?php if($page == "profiel"):?>
            <img src="img/profileActive.png" alt="Profiel link">
            <p class="red">profiel</p>
        <?php else: ?>
            <img src="img/profileInactive.png" alt="Profiel link">
            <p>profiel</p>
        <?php endif;?>

    </a>
    <a class="walletLink" href="">
        <div>
            <img src="img/coins.png" alt="wallet link">
        </div>
    </a>

</nav>
