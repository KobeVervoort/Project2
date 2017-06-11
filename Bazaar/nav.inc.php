<nav>

    <?php if(isset($_SESSION['companyID'])):?>

        <a class="controlPanelLink" href="<?php echo BASE_URL . 'Bazaar/company.php'?>">
            <?php if($page == "controlPanel"):?>
                <img src="<?php echo BASE_URL . 'Bazaar/img/homeActive.png'; ?> " alt="Home Link">
                <p class="red">home</p>
            <?php else: ?>
                <img src="<?php echo BASE_URL . 'Bazaar/img/homeInactive.png'; ?>" alt="Home Link">
                <p>home</p>
            <?php endif;?>
        </a>

        <a class="placeLink" href="<?php echo BASE_URL . 'Bazaar/place_offer_step1.php'?>">
            <?php if($page == "placeOffer"):?>
                <img src="<?php echo BASE_URL . 'Bazaar/img/offerActive.png'; ?> " alt="Place Link">
                <p class="red">plaatsen</p>
            <?php else: ?>
                <img src="<?php echo BASE_URL . 'Bazaar/img/offerInactive.png'; ?>" alt="Place Link">
                <p>plaatsen</p>
            <?php endif;?>
        </a>

        <a class="editLink" href="<?php echo BASE_URL . 'Bazaar/administration.php'?>">
            <?php if($page == "administration"):?>
                <img src="<?php echo BASE_URL . 'Bazaar/img/editActive.png'; ?> " alt="Edit Link">
                <p class="red">beheren</p>
            <?php else: ?>
                <img src="<?php echo BASE_URL . 'Bazaar/img/editInactive.png'; ?>" alt="Edit Link">
                <p>beheren</p>
            <?php endif;?>
        </a>

        <a class="companyProfileLink" href="<?php echo BASE_URL . 'Bazaar/company_profile.php'?>">
            <?php if($page == "companyProfile"):?>
                <img src="<?php echo BASE_URL . 'Bazaar/img/profileActive.png'; ?> " alt="Profile Link">
                <p class="red">profiel</p>
            <?php else: ?>
                <img src="<?php echo BASE_URL . 'Bazaar/img/profileInactive.png'; ?>" alt="Profile Link">
                <p>profiel</p>
            <?php endif;?>
        </a>

        <a class="overviewLink" href="<?php echo BASE_URL . 'Bazaar/overview.php'?>">
            <?php if($page == "overview"):?>
                <img src="<?php echo BASE_URL . 'Bazaar/img/overviewActive.png'; ?> " alt="Overview Link">
                <p class="red">overzicht</p>
            <?php else: ?>
                <img src="<?php echo BASE_URL . 'Bazaar/img/overviewInactive.png'; ?>" alt="Overview Link">
                <p>overzicht</p>
            <?php endif;?>
        </a>

    <?php else:?>

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

    <?php endif;?>

</nav>
