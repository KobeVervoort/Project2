<?php



?>

<nav>


    <a class="placeOffer" href="<?php echo BASE_URL . 'placeOffer.php'?>">
        <?php if($page == "placeOffer"):?>
            <img src="<?php echo BASE_URL . 'Bazaar/img/offerActive.png'; ?> " alt="Home Link">
            <p class="red">plaatsen</p>
        <?php else: ?>
            <img src="<?php echo BASE_URL . 'Bazaar/img/offerInactive.png'; ?>" alt="Home Link">
            <p>plaatsen</p>
        <?php endif;?>
    </a>

    <a class="manageOffers" href="<?php echo BASE_URL . 'Bazaar/manageOffers.php'?>">
        <?php if($page == "manageOffers"):?>
            <img src="<?php echo BASE_URL . 'Bazaar/img/manageActive.png'; ?>" alt="Tribune link">
            <p class="red">beheren</p>
        <?php else: ?>
            <img src="<?php echo BASE_URL . 'Bazaar/img/manageInactive.png'; ?>" alt="Tribune link">
            <p>beheren</p>
        <?php endif;?>

    </a>
    <a class="profileLink" href="<?php echo BASE_URL . 'Bazaar/profileH.php'?>">
        <?php if($page == "profiel"):?>
            <img src="<?php echo BASE_URL . 'Bazaar/img/profileActive.png'; ?>" alt="Profiel link">
            <p class="red">profiel</p>
        <?php else: ?>
            <img src="<?php echo BASE_URL . 'Bazaar/img/profileInactive.png'; ?>" alt="Profiel link">
            <p>profiel</p>
        <?php endif;?>

    </a>
    <a class="offers" href="<?php echo BASE_URL . 'Bazaar/offers.php'?>">
        <?php if($page == "wallet"):?>
            <img src="<?php echo BASE_URL . 'Bazaar/img/offersActive.png'; ?>" alt="wallet link">
            <p class="red">overzicht</p>
        <?php else: ?>
            <img src="<?php echo BASE_URL . 'Bazaar/img/offersInactive.png'; ?>" alt="wallet link">
            <p>overzicht</p>
        <?php endif;?>
    </a>

</nav>